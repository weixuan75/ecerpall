<?php

namespace app\erp\models\shop;

use Yii;

/**
 * This is the model class for table "{{%shop_warehouse_car}}".
 *
 * @property integer $id
 * @property string $shop_num
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $num
 * @property string $time
 */
class ShopWarehouseCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_warehouse_car}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'num', 'time'], 'integer'],
            [['shop_num'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_num' => 'Shop Num',
            'user_id' => 'User ID',
            'product_id' => '产品ID',
            'num' => '数量',
            'time' => '时间',
        ];
    }
}
