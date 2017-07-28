<?php

namespace app\erp\models\shop;

use Yii;

/**
 * This is the model class for table "{{%shop_user}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $role_id
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
            [['shop_id', 'role_id', 'account', 'phone', 'password', 'email', 'dbname', 'key_code', 'auth_code'], 'required'],
            [['shop_id', 'role_id', 'phone', 'state', 'login_time', 'credate_time', 'update_time'], 'integer'],
            [['account', 'password', 'email', 'key_code', 'auth_code'], 'string', 'max' => 50],
            [['dbname', 'login_ip'], 'string', 'max' => 20],
            [['shop_id'], 'unique'],
            [['account'], 'unique'],
            [['phone'], 'unique'],
            [['email'], 'unique'],
            [['dbname'], 'unique'],
            [['auth_code'], 'unique'],
            [['key_code'], 'unique'],
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
            'role_id' => '角色ID',
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
}
