<?php

namespace app\erp\models\shop;

use Yii;

/**
 * This is the model class for table "{{%shop_car}}".
 *
 * @property string $id
 * @property integer $shop_id
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $num
 * @property string $time
 */
class ShopCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_car}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'user_id', 'product_id', 'num', 'time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_id' => '店铺ID',
            'user_id' => '店员ID',
            'product_id' => '产品ID',
            'num' => 'Num',
            'time' => 'Time',
        ];
    }
}
