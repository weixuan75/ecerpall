<?php

namespace app\erp\models\shop;

use Yii;

/**
 * This is the model class for table "{{%shop_finance_log}}".
 *
 * @property integer $id
 * @property integer $shop_num
 * @property string $user_num
 * @property string $product_id
 * @property string $num
 * @property string $type
 * @property string $price
 * @property string $nowprice
 * @property string $time
 */
class ShopFinanceLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_finance_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_num', 'user_num', 'product_id', 'num', 'type', 'price', 'nowprice', 'time'], 'required'],
            [['shop_num', 'product_id'], 'integer'],
            [['nowprice'], 'number'],
            [['user_num', 'num'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
            [['price'], 'string', 'max' => 20],
            [['time'], 'string', 'max' => 40],
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
            'user_num' => '账号',
            'product_id' => '手机号',
            'num' => '数量',
            'type' => '计算类型：支出，收入',
            'price' => '价格',
            'nowprice' => '现资金总额',
            'time' => '授权码',
        ];
    }
}
