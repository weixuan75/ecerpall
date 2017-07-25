<?php

namespace app\erp\models\shop;

use Yii;

/**
 * This is the model class for table "{{%shop_address}}".
 *
 * @property integer $id
 * @property string $shop_id
 * @property string $sheng
 * @property string $shi
 * @property string $qu
 * @property string $adress
 * @property string $map
 */
class ShopAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_address}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'sheng', 'shi', 'qu', 'adress', 'map'], 'string', 'max' => 255],
            [['shop_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_id' => 'Shop ID',
            'sheng' => '省',
            'shi' => '市',
            'qu' => '县/区/市',
            'adress' => '详细地址',
            'map' => '地图',
        ];
    }
}
