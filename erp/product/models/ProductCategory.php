<?php

namespace app\erp\product\models;

use Yii;

/**
 * This is the model class for table "ec_product_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $create_time
 * @property string $update_time
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec_product_category';
    }
    public function loads($array){
        foreach($array as $key=>$val){
            if(strcmp($key, "_csrf") != 0)
                $this->$key = $val;
            //echo $key."=>".$val."<br />";
        }
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
            'name' => '产品类型名',
            'create_time' => '类型被创建的时间',
            'update_time' => '类型被修改的时间',
        ];
    }
}
