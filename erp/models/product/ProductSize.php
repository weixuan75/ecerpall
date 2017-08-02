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
            [['name', 'product_id', 'color_id'], 'required'],
            [['product_id', 'color_id', 'create_time'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['barcode'], 'string', 'max' => 100],
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
}
