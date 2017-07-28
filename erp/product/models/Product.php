<?php

namespace app\erp\product\models;

use Yii;

/**
 * This is the model class for table "ec_product".
 *
 * @property integer $id
 * @property string $sn
 * @property string $name
 * @property string $create_time
 * @property string $product_image
 * @property string $price
 * @property string $texture
 * @property integer $user_id
 * @property integer $shop_id
 * @property integer $brand_id
 * @property integer $tag_id
 * @property integer $category_id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec_product';
    }

    public function loads($array){
        foreach($array as $key=>$val){
            if(strcmp($key, "_csrf") != 0)
                $this->$key = $val;
            //echo $key."=>".$val."<br />";
        }
    }
    public function insert_table_color(){

    }
    /**
     * @inheritdoc
     */
    public function rules()
    {

//        [['sn', 'name', 'create_time', 'user_id', 'shop_id', 'brand_id', 'tag_id', 'category_id'], 'required'],
//            [['user_id', 'shop_id', 'brand_id', 'tag_id', 'category_id'], 'integer'],
//            [['sn'], 'string', 'max' => 12],
//            [['name', 'image', 'texture'], 'string', 'max' => 64],
//            [['create_time', 'price'], 'string', 'max' => 32],
        return [
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
            'create_time' => '产品被创建的时间',
            'barcode'=>'条形码',
            'product' => '产品的图片名称（两个md5的合并）',
            'price' => '产品的价格，当产品不存在规格的时候，价格直接就是产品的价格',
            'texture' => '产品的材质',
            'user_id' => '用户id',
            'shop_id' => '厂家的id',
            'brand_id' => '产品的品牌的id',
            'tag_id' => '标签',
            'category_id' => '产品的分类id',
        ];
    }
}
