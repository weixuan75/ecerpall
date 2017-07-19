<?php

namespace app\erp\models;

use Yii;

/**
 * This is the model class for table "{{%platform_menu}}".
 *
 * @property integer $id
 * @property integer $menu_id
 * @property integer $platform_id
 */
class PlatformMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%platform_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'platform_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_id' => 'Menu ID',
            'platform_id' => 'Platform ID',
        ];
    }
}
