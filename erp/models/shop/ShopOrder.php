<?php

namespace app\erp\models\shop;

use Yii;

/**
 * This is the model class for table "{{%shop_order}}".
 *
 * @property integer $id
 * @property string $order_num
 * @property integer $shop_id
 * @property integer $user_id
 * @property integer $address_id
 * @property string $price
 * @property integer $state
 * @property string $onetime
 * @property string $twotime
 * @property string $threetime
 * @property string $fivetime
 */
class ShopOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_num', 'shop_id', 'user_id', 'price', 'state', 'onetime'], 'required'],
            [['shop_id', 'user_id', 'address_id', 'state', 'onetime', 'twotime', 'threetime', 'fivetime'], 'integer'],
            [['price'], 'number'],
            [['order_num'], 'string', 'max' => 20],
            [['order_num'], 'unique'],
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
            'shop_id' => 'Shop ID',
            'user_id' => 'User ID',
            'address_id' => 'Address ID',
            'price' => 'Price',
            'state' => '状态',
            'onetime' => '下单时间',
            'twotime' => '付款时间',
            'threetime' => '发货时间',
            'fivetime' => '确认收货',
        ];
    }
}
