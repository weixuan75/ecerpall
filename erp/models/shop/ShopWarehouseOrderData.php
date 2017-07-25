<?php

namespace app\erp\models\shop;

use Yii;

/**
 * This is the model class for table "{{%shop_warehouse_order_data}}".
 *
 * @property integer $id
 * @property string $order_num
 * @property integer $product_id
 * @property integer $num
 * @property string $price
 * @property string $time
 */
class ShopWarehouseOrderData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_warehouse_order_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_num'], 'required'],
            [['product_id', 'num', 'time'], 'integer'],
            [['price'], 'number'],
            [['order_num'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_num' => '订单号',
            'product_id' => '产品ID',
            'num' => '数量',
            'price' => '单价',
            'time' => '时间',
        ];
    }
}
