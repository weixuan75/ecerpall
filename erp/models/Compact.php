<?php

namespace app\erp\models;

use Yii;

/**
 * This is the model class for table "{{%compact}}".
 *
 * @property integer $id
 * @property string $compact_code
 * @property string $a
 * @property string $b
 * @property string $data
 */
class Compact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%compact}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data'], 'string'],
            [['compact_code', 'a', 'b'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'compact_code' => '合同编号',
            'a' => '甲方',
            'b' => '乙方',
            'data' => '复印件',
        ];
    }
}
