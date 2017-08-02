<?php

namespace app\erp\models\product;

use Yii;

/**
 * This is the model class for table "{{%warehouse_product_stock}}".
 *
 * @property string $id
 * @property string $product_id
 * @property string $product_relation_id
 * @property integer $num
 * @property string $type
 * @property integer $stockNum
 * @property integer $user_id
 * @property integer $state
 * @property string $content
 * @property string $create_time
 * @property string $update_time
 */
class WarehouseProductStock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%warehouse_product_stock}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_relation_id', 'user_id'], 'required'],
            [['product_id', 'product_relation_id', 'num', 'stockNum', 'user_id', 'state', 'create_time', 'update_time'], 'integer'],
            [['type'], 'string', 'max' => 2],
            [['content'], 'string', 'max' => 255],
            [['product_id', 'product_relation_id'], 'unique', 'targetAttribute' => ['product_id', 'product_relation_id'], 'message' => 'The combination of 产品ID and 产品综合ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => '产品ID',
            'product_relation_id' => '产品综合ID',
            'num' => '新增库存',
            'type' => 'Type',
            'stockNum' => '库存数量',
            'user_id' => '用户ID',
            'state' => '状态',
            'content' => '备注',
            'create_time' => '创建时间',
            'update_time' => '创建时间',
        ];
    }
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    public function getProductRelation()
    {
        return $this->hasOne(ProductRelation::className(), ['product_relation_id' => 'id']);
    }
    public function getProductSize(){
        return $this->hasOne(ProductSize::className(), ['id' => 'size_id'])
            ->viaTable('ec_product_relation', ['id' => 'product_relation_id']);
    }
    public function getProductColor(){
        return $this->hasOne(ProductColor::className(), ['id' => 'color_id'])
            ->viaTable('ec_product_relation', ['id' => 'product_relation_id']);
    }
}
