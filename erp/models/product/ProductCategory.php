<?php

namespace app\erp\models\product;

use app\erp\util\LogUntils;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%product_category}}".
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
        return '{{%product_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'create_time', 'update_time'], 'required'],
            [['create_time', 'update_time'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique',"message"=>"已经存在"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '产品分类名称',
            'create_time' => '类型被创建的时间',
            'update_time' => '类型被修改的时间',
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
    public function add($data){
        if($this->load($data)){
            $this->create_time = $this->update_time = time();
            if($this->save()&&LogUntils::write(Json::encode($data['ProductCategory']),28,"add")){
                return true;
            }
            return false;
        }
        return false;
    }
    public function edit($data){
        if($this->load($data)){
            $this->update_time = time();
            if($this->update()&&LogUntils::write(Json::encode($data['ProductCategory']),28,"edit")){
                return true;
            }
            return false;
        }
        return false;
    }
}

