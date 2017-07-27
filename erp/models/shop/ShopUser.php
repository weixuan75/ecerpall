<?php

namespace app\erp\models\shop;

use Yii;

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
            [['shop_id', 'shop_num', 'account', 'phone', 'password', 'email', 'dbname', 'key_code', 'auth_code'], 'required'],
            [['shop_id', 'phone', 'state', 'login_time', 'credate_time', 'update_time'], 'integer'],
            [['shop_num', 'dbname', 'login_ip'], 'string', 'max' => 20],
            [['account', 'password'], 'string', 'max' => 255],
            [['email', 'key_code', 'auth_code'], 'string', 'max' => 50],
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
}
