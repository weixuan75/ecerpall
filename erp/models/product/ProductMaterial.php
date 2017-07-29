<?php

namespace app\erp\models\product;

use Yii;

/**
 * This is the model class for table "{{%product_material}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $name
 * @property string $create_time
 * @property string $update_time
 */
class ProductMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_material}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'name'], 'required'],
            [['pid', 'create_time', 'update_time'], 'integer'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '父级材料',
            'name' => '名字',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }
}
