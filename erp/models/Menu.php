<?php

namespace app\erp\models;

use app\erp\util\SysConf;
use Yii;
use yii\helpers\ArrayHelper;

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
            [['menu_pid', 'state', 'create_time', 'update_time'], 'integer'],
            [['name', 'ename'], 'string', 'max' => 100],
            [['content', 'url'], 'string', 'max' => 500],
            [['admin_id', 'auth_code', 'key_code'], 'string', 'max' => 36],
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
            $this->auth_code = SysConf::uuid("auth-");
            $this->key_code= SysConf::uuid("key-");
            $this->create_time=$this->create_time=time();
            if($this->save()){
                return true;
            }
            return false;
        }
        return false;
    }

    public function getData()
    {
        $cates = self::find()->all();
        $cates = ArrayHelper::toArray($cates);
        return $cates;
    }
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

    public function getTreeList()
    {
        $data = $this->getData();
        $tree = $this->getTree($data);
        return $tree = $this->setPrefix($tree);
    }

    public static function getMenu()
    {
        $top = self::find()->where('menu_pid = :pid', [":pid" => 0])->limit(11)->orderby('create_time asc')->asArray()->all();
        $data = [];
        $stack = array();
        $current = $top;
        $i = 0;
        for(; $i < count($current);)
        {
            $k = self::find()->where("menu_pid=:pid", [":pid" => $current[$i]['id']])->orderby('create_time asc')->asArray()->all();
            //有子集菜单
            if ($k && count($k) > 0)
            {
                //---------------------------------
                $current['children'] = $k;
                //入栈
                $stack[count($stack)] = ['obj' => $current, 'index' => ($i + 1)];
                $current = $k;
                $i = 0;
            }
            else {
                $i++;
            }
            if($i >= count($current) && count($stack) > 0)
            {
                $current = $stack[count($stack)-1]['obj'];
                $i = $stack[count($stack)-1]['index'];
                $stack[count($stack)-1] = null;
            }
                //已经遍历完当前这一列的菜单数
                //         while(count($stack) > 0 && $i >= count($current))
                //        {
                //            $current = $stack[count($stack) - 1]['obj'];
                //            $i = $stack[count($stack) - 1]['index'];
                //出栈
                //            $stack[count($stack) - 1] = null;
                //       }
                //已经遍历完当前这一列的菜单数
//                while(count($stack) > 0 && $i >= count($current))
//                {
//                    $current = $stack[count($stack) - 1]['obj'];
//                    $i = $stack[count($stack) - 1]['index'];
//                    出栈
//                    $stack[count($stack) - 1] = null;
//                }
        }
        /*
        foreach((array)$top as $k=>$cate) {
            $cate['children'] = self::find()->where("menu_pid = :pid", [":pid" => $cate['id']])->limit(10)->asArray()->all();
            $data[$k] = $cate;
        }*/
        return $top;
    }
}
