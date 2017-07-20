<?php

namespace app\erp\models;

use app\erp\util\LogUntils;
use app\erp\util\SysConf;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property integer $id
 * @property integer $menu_pid
 * @property string $name
 * @property string $ename
 * @property string $content
 * @property string $url
 * @property string $admin_id
 * @property string $auth_code
 * @property string $key_code
 * @property integer $state
 * @property string $create_time
 * @property string $update_time
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_pid', 'name', 'ename', 'content', 'url'], 'required'],
            [['sort','admin_id', 'menu_pid', 'state', 'create_time', 'update_time'], 'integer'],
            [['name', 'ename'], 'string', 'max' => 100],
            [['content', 'url'], 'string', 'max' => 500],
            [['auth_code', 'key_code'], 'string', 'max' => 45],
            [['name'], 'unique'],
            [['ename'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_pid' => '父级ID',
            'sort' => '排序',
            'name' => '名称',
            'ename' => '英文名称',
            'content' => '介绍',
            'url' => 'url',
            'admin_id' => '管理员',
            'auth_code' => '授权码',
            'key_code' => '认证码',
            'state' => '状态',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }

    /**
     * 创建
     * @param $data
     * @return bool
     */
    public function add($data){
        if($this->load($data)){
            $session = Yii::$app->session;
            $redis = Yii::$app->redis;
            $user_id = Json::decode($redis->get($session['userData']['user']['auth_code']))['user']['id'];
            $this->admin_id = $user_id;
            $this->auth_code = SysConf::uuid("auth-");
            $this->key_code= SysConf::uuid("key-");
            $this->create_time=$this->update_time=time();
            if($this->save()&&LogUntils::write(Json::encode($data['Menu']),$this->getPrimaryKey(),"add")){
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * 编辑
     * @param $data POST传来的值
     * @return bool
     */
    public function edit($data){
        if($this->load($data)){
            if($this->update()&&LogUntils::write(Json::encode($data['Menu']),$this->getPrimaryKey(),"edit")){
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getData()
    {
        $cates = self::find()->all();
        $cates = ArrayHelper::toArray($cates);
        return $cates;
    }

    /**
     * @param $cates
     * @param int $pid
     * @return array
     */
    public function getTree($cates, $pid = 0)
    {
        $tree = [];
        foreach($cates as $cate) {
            if ($cate['menu_pid'] == $pid) {
                $tree[] = $cate;
                $tree = array_merge($tree, $this->getTree($cates, $cate['id']));
            }
        }
        return $tree;
    }

    /**
     * @param $data
     * @param string $p
     * @return array
     */
    public function setPrefix($data, $p = "|-----")
    {
        $tree = [];
        $num = 1;
        $prefix = [0 => 1];
        while($val = current($data)) {
            $key = key($data);
            if ($key > 0) {
                if ($data[$key - 1]['menu_pid'] != $val['menu_pid']) {
                    $num ++;
                }
            }
            if (array_key_exists($val['menu_pid'], $prefix)) {
                $num = $prefix[$val['menu_pid']];
            }
            $val['name'] = str_repeat($p, $num).$val['name'];
            $prefix[$val['menu_pid']] = $num;
            $tree[] = $val;
            next($data);
        }
        return $tree;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        $data = $this->getData();
        $tree = $this->getTree($data);
        $tree = $this->setPrefix($tree);
        $options = ['添加顶级分类'];
        foreach($tree as $cate) {
            $options[$cate['id']] = $cate['name'];
        }
        return $options;
    }

    /**
     * @return array
     */
    public function getTreeList()
    {
        $data = $this->getData();
        $tree = $this->getTree($data);
        return $tree = $this->setPrefix($tree);
    }
    public static function getMenu($id)
    {
        $top = self::find()->where("menu_pid=:pid", [":pid"=>$id])->orderby("sort asc")->orderby("id asc")->asArray()->all();
        foreach($top as $key=>$val){
            $top[$key]['children'] = Menu::getMenu($val['id']);
        }
        return $top;
//        $top = self::find()->where('menu_pid = :pid', [":pid" => 0])->limit(11)->orderby('create_time asc')->asArray()->all();
//        $data = [];
//        $stack = array();
//        $current = $top;
//        $i = (int)0;
//        for(; $i < count($current);)
//        {
//            $k = self::find()->where("menu_pid=:pid", [":pid" => $current[$i]['id']])->orderby('create_time asc')->asArray()->all();
//            //有子集菜单
//            if ($k && count($k) > 0)
//            {
//                $current[$i]['children'] = $k;
//                //入栈
//                $stack[count($stack)] = ['obj' => $current, 'index' => ($i + 1)];
//                $current = $k;
//                $i = 0;
//            }
//            else {
//                $i++;
//            }
//            while($i >= count($current) && count($stack) > 0)
//            {
//                $current = $stack[count($stack)-1]['obj'];
//                $i = $stack[count($stack)-1]['index'];
//                unset($stack[count($stack)-1]);
//            }
//        }
//        foreach($current as $key=>$val){
//            if(isset($val['children']))
//            {
//                echo $val['name']."<br />";
//                 foreach($val['children'] as $k=>$v){
//                     if(isset($v['children']))
//                     {
//                         foreach($v['children'] as $kk=>$vv){
//                             echo "----".$vv['name'];
//                         }
//                     }
//                     else
//                        echo "--".$v['name']."<br />";
//                 }
//            }
//            else
//            {
//                echo $val['name']."<br />";
//            }
//        }
        /*
        foreach((array)$top as $k=>$cate) {
            $cate['children'] = self::find()->where("menu_pid = :pid", [":pid" => $cate['id']])->limit(10)->asArray()->all();
            $data[$k] = $cate;
        }*/
      //  return $current;
    }
}
