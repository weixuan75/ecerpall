<?php

namespace app\erp\shop\models;

use app\erp\util\LogUntils;
use app\erp\util\SysConf;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%shop_user}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $shop_num
 * @property string $account
 * @property string $phone
 * @property string $password
 * @property string $email
 * @property string $dbname
 * @property string $key_code
 * @property string $auth_code
 * @property integer $state
 * @property string $login_ip
 * @property string $login_time
 * @property string $credate_time
 * @property string $update_time
 */
class ShopUser extends \yii\db\ActiveRecord
{
    //验证码
    public $captcha;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id','shop_num', 'account', 'phone', 'password', 'email', 'dbname',], 'required','message' => '不能为空','on' => 'add'],
            [['password'], 'validateActivate', 'on' => 'login'],
            [['password'], 'validateBan', 'on' => 'login'],
            [['password'], 'validateDel', 'on' => 'login'],
            [['password'], 'validatePass', 'on' => 'login'],
            [['captcha'], 'validateCaptcha', 'on' => 'login'],
            [['captcha'], 'required','message' => '验证码不能为空', 'on' => 'login'],
            [['password'], 'required','message' => '密码不能为空','on' => 'login'],
            [['account'], 'required','message' => '账号不能为空','on' => ['login','add']],
            [['shop_id', 'shop_num', 'account', 'phone', 'email', 'dbname', 'key_code', 'auth_code'], 'unique', 'targetAttribute' => ['shop_id', 'shop_num', 'account', 'phone', 'email', 'dbname', 'key_code', 'auth_code'], 'message' => 'The combination of Shop ID, 店铺, 账号, 手机号, 电子邮箱, 数据库名称, 授权码 and 授权码 has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_id' => 'Shop ID',
            'shop_num' => '店铺',
            'account' => '账号',
            'phone' => '手机号',
            'password' => '密码',
            'email' => '电子邮箱',
            'dbname' => '数据库名称',
            'key_code' => '授权码',
            'auth_code' => '授权码',
            'state' => '状态',
            'login_ip' => '登陆IP',
            'login_time' => '登陆时间',
            'credate_time' => '时间',
            'update_time' => '修改时间',
        ];
    }
    /**
     * 密码是否正确
     */
    public function validatePass(){
        if (!$this->hasErrors()) {
            $data = self::find()->where(
                'account = :user and password = :pass',
                [":user" => $this->account, ":pass" => md5($this->password)]
            )->one();
            if (is_null($data)) {
                $this->addError("password", "用户名或者密码错误");
            }
        }
    }
    /**
     * 验证码是否正确
     */
    public function validateCaptcha(){
        if (!$this->hasErrors()) {
            $session = Yii::$app->session;
            if($this->captcha == $session['captchaCode']){
                return true;
            }else{
                $this->addError("captcha", "验证码错误");
            }
        }
    }
    /**
     * 账户激活问题
     */
    public function validateActivate(){
        if (!$this->hasErrors()) {
            $data = self::find()
                ->select(['state'])
                ->where(
                    'account = :user and password = :pass',
                    [":user" => $this->account, ":pass" => md5($this->password)]
                )->one();
            if ($data['state']==0) {
                $this->addError("password", "账户未激活，请联系管理员");
            }
        }
    }
    /**
     * 账户禁用问题
     */
    public function validateBan(){
        if (!$this->hasErrors()) {
            $data = self::find()
                ->select(['state'])
                ->where(
                    'account = :user and password = :pass',
                    [":user" => $this->account, ":pass" => md5($this->password)]
                )->one();
            if ($data['state']==2) {
                $this->addError("password", "账户被禁用，请联系管理员");
            }
        }
    }
    /**
     * 账户删除问题
     */
    public function validateDel(){
        if (!$this->hasErrors()) {
            $data = self::find()
                ->select(['state'])
                ->where(
                    'account = :user and password = :pass',
                    [":user" => $this->account, ":pass" => md5($this->password)]
                )->one();
            if ($data['state']==3) {
                $this->addError("password", "账户已删除，请联系管理员");
            }
        }
    }
    public function login($data){
        $this->scenario="login";
        if ($this->load($data) && $this->validate()) {
            $this->updateAll([
                'login_time' => time(),
                'login_ip' => ip2long(Yii::$app->request->userIP)
            ], 'account = :user', [':user' => $this->account]);

            $user = self::find()
                ->select([
                    'id',
                    'account',
                    'email',
                    'phone',
                    'state',
                    'auth_code',
                    'login_ip',
                    'login_time',
                    'sys_group_id',
                    'create_time',
                    'update_time',
                ])
                ->where('account=:account',[':account'=>$this->account])
                ->one()
                ->toArray();
            $userdate = Sysadmindate::find()
                ->where("sys_admin_id=:id",[':id'=>$user['id']])
                ->one()->toArray();
            $redis = Yii::$app->redis;
            $session = Yii::$app->session;
            $session["userData"] = [
                'user'=>$user,
                'data'=>$userdate
            ];
            $redis->set($user['auth_code'],Json::encode($session["userData"]));
            //删除验证码的数据
            $session->remove("captchaCode");
            return true;
        }
        return false;
    }
    public function add($data){
        $this->scenario="add";
        if ($this->load($data) && $this->validate()) {
            $this->auth_code = SysConf::uuid("shopUserAuth-");
            $this->key_code = SysConf::uuid("shopUserKey-");
            $this->credate_time = $this->update_time = time();
            $this->password=md5($this->password);
            if($this->save(false)&&LogUntils::write(Json::encode($data['ShopUser']),26,"add")){
                return true;
            }
            return false;
        }
        return false;
    }
    public function edit($data){
        if($this->load($data)){
            $this->update_time = time();
            if($this->update()&&LogUntils::write(Json::encode($data['ShopUser']),26,"edit")){
                return true;
            }
            return false;
        }
        return false;
    }
}
