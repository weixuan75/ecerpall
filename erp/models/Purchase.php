<?php

namespace app\erp\models;

use Yii;

/**
 * This is the model class for table "{{%purchase}}".
 *
 * @property string $id
 * @property string $code
 * @property integer $type
 * @property integer $supplier_id
 * @property integer $user_id
 * @property integer $state
 * @property string $price
 * @property string $uptime
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%purchase}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'supplier_id', 'user_id', 'state', 'uptime'], 'integer'],
            [['user_id'], 'required'],
            [['price'], 'number'],
            [['code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => '采购清单编号',
            'type' => '类型：0是流通货1是尾货',
            'supplier_id' => '供应商ID',
            'user_id' => '采购单操作员',
            'state' => '状态',
            'price' => '采购清单的价格',
            'uptime' => '时间',
        ];
    }
}
