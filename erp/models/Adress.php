<?php

namespace app\erp\models;

use Yii;

/**
 * This is the model class for table "{{%adress}}".
 *
 * @property integer $id
 * @property string $sheng
 * @property string $shi
 * @property string $qu
 * @property string $adress
 * @property string $map
 */
class Adress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adress}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sheng', 'shi', 'qu', 'adress', 'map'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sheng' => '省',
            'shi' => '市',
            'qu' => '县/区/市',
            'adress' => '详细地址',
            'map' => '地图',
        ];
    }
}
