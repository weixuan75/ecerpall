<?php

namespace app\erp\models\shop;

use app\erp\util\LogUntils;
use Yii;
use yii\helpers\Json;

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

    public function add($data){
        if($this->load($data)){
            if($this->save()&&LogUntils::write(Json::encode($data['Shop']),26,"add")){
                return true;
            }
            return false;
        }
        return false;
    }
    public function edit($data){
        if($this->load($data)){
            if($this->update()&&LogUntils::write(Json::encode($data['Shop']),26,"edit")){
                return true;
            }
            return false;
        }
        return false;
    }
}
