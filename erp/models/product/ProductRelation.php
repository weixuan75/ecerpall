<?php

namespace app\erp\models\product;

use Yii;

/**
 * This is the model class for table "{{%product_relation}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $color_id
 * @property integer $size_id
 * @property integer $price_id
 */
class ProductRelation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_relation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'color_id', 'size_id', 'price_id'], 'required'],
            [['product_id', 'color_id', 'size_id', 'price_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => '产品id',
            'color_id' => '颜色id',
            'size_id' => '尺寸id',
            'price_id' => '价格id',
        ];
    }
}
