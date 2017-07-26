<?php

namespace app\erp\models\shop;

use app\erp\util\LogUntils;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%shop_car}}".
 *
 * @property string $id
 * @property integer $shop_id
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $num
 * @property string $time
 */
class ShopCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_car}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'user_id', 'product_id', 'num', 'time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_id' => '店铺ID',
            'user_id' => '店员ID',
            'product_id' => '产品ID',
            'num' => 'Num',
            'time' => 'Time',
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
