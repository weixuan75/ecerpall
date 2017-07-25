<?php

namespace app\erp\product\models;

use Yii;

/**
 * This is the model class for table "ec_product_color".
 *
 * @property integer $id
 * @property string $name
 * @property string $create_time
 */
class ProductColor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec_product_color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'create_time'], 'required'],
            [['name'], 'string', 'max' => 64],
            [['create_time'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '产品颜色',
            'create_time' => '颜色创建时间',
        ];
    }
}
