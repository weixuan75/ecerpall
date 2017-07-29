<?php

namespace app\erp\models\product;

use Yii;

/**
 * This is the model class for table "{{%product_size}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $product_id
 * @property integer $color_id
 * @property string $barcode
 * @property string $create_time
 *
 * @property ProductColor $color
 * @property Product $product
 */
class ProductSize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_size}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'product_id', 'color_id', 'barcode', 'create_time'], 'required'],
            [['product_id', 'color_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['barcode'], 'string', 'max' => 100],
            [['create_time'], 'string', 'max' => 32],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductColor::className(), 'targetAttribute' => ['color_id' => 'id']],
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
            'name' => '产品的尺寸',
            'product_id' => '产品的id',
            'color_id' => '颜色的id',
            'barcode' => '产品条码',
            'create_time' => '创建时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(ProductColor::className(), ['id' => 'color_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
