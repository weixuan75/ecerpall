<?php

namespace app\erp\models;

use Yii;

/**
 * This is the model class for table "{{%supplier}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $user_id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $bank_account
 * @property string $bank_name
 * @property string $banktitle
 * @property string $time
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%supplier}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'user_id', 'name', 'phone', 'address'], 'required'],
            [['user_id', 'time'], 'integer'],
            [['title', 'name', 'phone', 'address', 'bank_account', 'bank_name', 'banktitle'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '供应商名称',
            'user_id' => '采购员ID',
            'name' => '联系人',
            'phone' => '联系电话',
            'address' => '地址',
            'bank_account' => '银行账号',
            'bank_name' => '收款账号',
            'banktitle' => '银行名称',
            'time' => '创建时间',
        ];
    }
}
