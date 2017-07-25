<?php

namespace app\erp\product\models;

use Yii;

/**
 * This is the model class for table "ec_product_brand".
 *
 * @property integer $id
 * @property string $name
 * @property string $create_time
 * @property string $update_time
 */
class ProductBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec_product_brand';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'create_time', 'update_time'], 'required'],
            [['name'], 'string', 'max' => 64],
            [['create_time', 'update_time'], 'string', 'max' => 32],
            [['name'], 'unique'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '品牌名',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }
}
