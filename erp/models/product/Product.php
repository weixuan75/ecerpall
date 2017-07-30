<?php

namespace app\erp\models\product;

use app\erp\util\LogUntils;
use app\erp\util\UserUtil;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $sn
 * @property string $name
 * @property string $image
 * @property string $material
 * @property string $price
 * @property integer $user_id
 * @property integer $brand_id
 * @property integer $tag
 * @property integer $category_id
 * @property string $create_time
 * @property string $update_time
 *
 * @property ProductColor[] $productColors
 * @property ProductSize[] $productSizes
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sn', 'name', 'user_id', 'brand_id'], 'required'],
            [['price'], 'number'],
            [['user_id', 'brand_id', 'tag', 'category_id', 'create_time', 'update_time'], 'integer'],
            [['sn'], 'string', 'max' => 20],
            [['name', 'material','image'], 'string', 'max' => 255],
            [['sn'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sn' => '产品的一个唯一的号码',
            'name' => '产品的名称(是可以重复的)',
            'image' => '产品的图片路径',
            'material' => '材质',
            'price' => '产品的价格，当产品不存在规格的时候，价格直接就是产品的价格',
            'user_id' => '操作人员ID',
            'brand_id' => '产品的品牌的id',
            'tag' => '标签',
            'category_id' => '产品分类',
            'create_time' => '创建的时间',
            'update_time' => '创建的时间',
        ];
    }

    public function add($data){
        if($this->load($data)){
            $this->create_time = $this->update_time = time();
            $this->user_id = UserUtil::UserId();
            if($this->save()&&LogUntils::write(Json::encode($data['Product']),28,"add")){
                return true;
            }
            return false;
        }
        return false;
    }
    public function edit($data){
        if($this->load($data)){
            $this->update_time = time();
            if($this->update()&&LogUntils::write(Json::encode($data['Product']),28,"edit")){
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductColors()
    {
        return $this->hasMany(ProductColor::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSizes()
    {
        return $this->hasMany(ProductSize::className(), ['product_id' => 'id']);
    }


}
