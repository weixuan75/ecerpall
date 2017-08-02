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
            [['product_id', 'create_time'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            [['product_id', 'name'], 'unique', 'targetAttribute' => ['product_id', 'name'], 'message' => 'The combination of 产品的id and 产品颜色 has already been taken.'],
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
}
