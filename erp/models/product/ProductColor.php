<?php

namespace app\erp\models\product;

use Yii;

/**
 * This is the model class for table "{{%product_color}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $name
 * @property string $image
 * @property string $create_time
 *
 * @property Product $product
 * @property ProductSize[] $productSizes
 */
class ProductColor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_color}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'name', 'image', 'create_time'], 'required'],
            [['product_id'], 'integer'],
            [['name', 'image'], 'string', 'max' => 64],
            [['create_time'], 'string', 'max' => 32],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => '产品的id',
            'name' => '产品颜色',
            'image' => '对应颜色的产品图片',
            'create_time' => '颜色创建时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSizes()
    {
        return $this->hasMany(ProductSize::className(), ['color_id' => 'id']);
    }
}
