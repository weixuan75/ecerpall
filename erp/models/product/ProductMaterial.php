<?php

namespace app\erp\models\product;

use Yii;
use yii\helpers\ArrayHelper;

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
            [['name'], 'required'],
            [['create_time', 'update_time'], 'integer'],
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
            'name' => '名字',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }
    public function getData(){
        $cates = self::find()->all();
        $cates = ArrayHelper::toArray($cates);
        $arr=[];
        foreach ($cates as $cate) {
            $arr[$cate['id']] = $cate['name'];
        }
        return $arr;
    }
}
