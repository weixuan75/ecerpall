<?php

namespace app\erp\models;

use Yii;

/**
 * This is the model class for table "{{%model_menu}}".
 *
 * @property integer $id
 * @property integer $menu_id
 * @property integer $model_id
 */
class ModelMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%model_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'model_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'menu_id' => '菜单ID',
            'model_id' => '模块ID',
        ];
    }
}
