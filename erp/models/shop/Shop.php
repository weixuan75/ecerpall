<?php

namespace app\erp\models\shop;

use app\erp\util\LogUntils;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%shop}}".
 *
 * @property integer $id
 * @property string $shop_num
 * @property string $name
 * @property string $img
 * @property string $imgs
 * @property string $start_time
 * @property string $end_time
 * @property string $compact_code
 * @property integer $master_id
 * @property string $service_user
 * @property string $service_user2
 * @property string $phone
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_num', 'name', 'compact_code', 'master_id', 'service_user', 'service_user2'], 'required'],
            [['start_time', 'end_time', 'master_id'], 'integer'],
            [['shop_num', 'service_user', 'service_user2'], 'string', 'max' => 20],
            [['name', 'img', 'imgs', 'compact_code', 'phone'], 'string', 'max' => 255],
            [['shop_num'], 'unique'],
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
            'shop_num' => '店铺编号',
            'name' => '名称',
            'img' => '门头',
            'imgs' => '店内图片',
            'start_time' => '开始时间',
            'end_time' => '过期时间',
            'compact_code' => '签署的合同编号',
            'master_id' => '负责人ID',
            'service_user' => '客服专员',
            'service_user2' => '招商经理',
            'phone' => '联系电话',
        ];
    }
    public function getData()
    {
        $cates = self::find()->all();
        $arr = null;
        foreach ($cates as $c){
            $arr[$c['id']] = $c['name'];
        }
        return $arr;
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
    public function getShopFinance(){
            return $this->hasOne(ShopFinance::className(),["id","shop_id"]);
    }
    public function getShopAddress(){
            return $this->hasOne(ShopAddress::className(),["id","shop_id"]);
    }
    public function getShopUser(){
            return $this->hasOne(ShopUser::className(),["id","shop_id"]);
    }
    public function getAuthPeople(){
            return $this->hasOne(AuthPeople::className(),["master_id","id"]);
    }
}