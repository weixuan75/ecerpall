<?php

namespace app\erp\models\shop;

use Yii;

/**
 * This is the model class for table "{{%shop_warehouse_stock}}".
 *
 * @property integer $id
 * @property string $warehose_num
 * @property integer $shop_num
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $num
 * @property integer $newnum
 */
class ShopWarehouseStock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_warehouse_stock}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_num', 'user_id', 'product_id', 'num', 'newnum'], 'integer'],
            [['warehose_num'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'warehose_num' => '入库单号',
            'shop_num' => '店铺编号',
            'user_id' => '店铺用户ID',
            'product_id' => '产品ID',
            'num' => '入库数量',
            'newnum' => '现库存数量',
        ];
    }
}
