<?php

namespace app\erp\models;

use app\erp\util\LogUntils;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%supplier}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $user_id
 * @property string $name
 * @property string $tel
 * @property string $phone
 * @property string $address
 * @property string $bank_account
 * @property string $bank_name
 * @property string $banktitle
 * @property string $create_time
 * @property string $update_time
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%supplier}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'user_id', 'name', 'phone', 'address'], 'required'],
            [['user_id', 'create_time', 'update_time'], 'integer'],
            [['title', 'bank_name'], 'string', 'max' => 100],
            [['name', 'tel', 'phone'], 'string', 'max' => 20],
            [['address', 'banktitle'], 'string', 'max' => 255],
            [['bank_account'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '供应商名称',
            'user_id' => '采购员ID',
            'name' => '联系人',
            'tel' => '座机',
            'phone' => '联系电话',
            'address' => '地址',
            'bank_account' => '银行账号',
            'bank_name' => '收款账号',
            'banktitle' => '银行名称',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }

    public function add($data){
        if($this->load($data)){
            $this->create_time=$this->update_time=time();
            if($this->save()&&LogUntils::write(Json::encode($data['Supplier']),24,"add")){
                return true;
            }
            return false;
        }
        return false;
    }
    public function edit($data){
        if($this->load($data)){
            if($this->update()&&LogUntils::write(Json::encode($data['Supplier']),24,"edit")){
                return true;
            }
            return false;
        }
        return false;
    }
}
