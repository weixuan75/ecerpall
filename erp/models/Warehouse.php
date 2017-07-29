<?php

namespace app\erp\models;

use Yii;

/**
 * This is the model class for table "{{%warehouse}}".
 *
 * @property integer $id
 * @property string $warehouse_num
 * @property string $name
 * @property string $img
 * @property string $imgs
 * @property integer $master_id
 * @property string $tel
 * @property string $phone
 * @property string $sheng
 * @property string $shi
 * @property string $qu
 * @property string $address
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%warehouse}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_num', 'name', 'master_id'], 'required'],
            [['master_id'], 'integer'],
            [['warehouse_num'], 'string', 'max' => 20],
            [['name', 'img', 'imgs', 'address'], 'string', 'max' => 255],
            [['tel', 'phone'], 'string', 'max' => 12],
            [['sheng', 'shi', 'qu'], 'string', 'max' => 40],
            [['warehouse_num'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'warehouse_num' => '店铺编号',
            'name' => '名称',
            'img' => '门头',
            'imgs' => '店内图片',
            'master_id' => '负责人ID',
            'tel' => '座机',
            'phone' => '联系电话',
            'sheng' => 'Sheng',
            'shi' => 'Shi',
            'qu' => 'Qu',
            'address' => 'Address',
        ];
    }
}
