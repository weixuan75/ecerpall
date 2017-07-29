<?php

namespace app\erp\models\product;

use app\erp\util\LogUntils;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%product_brand}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $create_time
 * @property string $update_time
 */
class ProductBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_brand}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'create_time', 'update_time'], 'required'],
            [['name'], 'string', 'max' => 64],
            [['create_time', 'update_time'], 'string', 'max' => 32],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '品牌名',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }

    public function add($data){
        if($this->load($data)){
            if($this->save()&&LogUntils::write(Json::encode($data['ProductBrand']),28,"add")){
                return true;
            }
            return false;
        }
        return false;
    }
    public function edit($data){
        if($this->load($data)){
            if($this->update()&&LogUntils::write(Json::encode($data['ProductBrand']),28,"edit")){
                return true;
            }
            return false;
        }
        return false;
    }
}
