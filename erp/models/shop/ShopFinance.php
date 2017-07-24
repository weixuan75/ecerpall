<?php

namespace app\erp\models\shop;

use Yii;

/**
 * This is the model class for table "{{%shop_finance}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $name
 * @property string $bank_name
 * @property string $back_acc
 * @property string $time
 */
class ShopFinance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_finance}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'name', 'bank_name', 'back_acc'], 'required'],
            [['shop_id', 'time'], 'integer'],
            [['name', 'bank_name', 'back_acc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'shop_id' => '店铺ID',
            'name' => '姓名',
            'bank_name' => '银行名称',
            'back_acc' => '银行账号',
            'time' => '时间',
        ];
    }
}
