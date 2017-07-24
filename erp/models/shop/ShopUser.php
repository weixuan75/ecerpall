<?php

namespace app\erp\models\shop;

use Yii;

/**
 * This is the model class for table "{{%shop_user}}".
 *
 * @property integer $id
 * @property integer $shop_num
 * @property string $access
 * @property string $phone
 * @property string $password
 * @property string $email
 * @property string $dbname
 * @property string $auth_code
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
            [['shop_num', 'access', 'phone', 'password', 'email', 'dbname', 'auth_code'], 'required'],
            [['shop_num', 'phone'], 'integer'],
            [['access', 'password'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 50],
            [['dbname'], 'string', 'max' => 20],
            [['auth_code'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_num' => '店铺',
            'access' => '账号',
            'phone' => '手机号',
            'password' => '密码',
            'email' => '电子邮箱',
            'dbname' => '数据库名称',
            'auth_code' => '授权码',
        ];
    }
}
