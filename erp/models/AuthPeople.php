<?php

namespace app\erp\models;

use app\erp\util\LogUntils;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%auth_people}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $birthday
 * @property string $gender
 * @property string $nation
 * @property string $idnumber
 * @property string $adress
 * @property string $createtime
 * @property string $img1
 * @property string $img2
 * @property string $img3
 */
class AuthPeople extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_people}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'birthday', 'gender', 'nation', 'idnumber', 'adress', 'createtime'], 'required'],
            [['createtime'], 'integer'],
            [['name', 'birthday'], 'string', 'max' => 20],
            [['gender'], 'string', 'max' => 4],
            [['nation'], 'string', 'max' => 10],
            [['idnumber'], 'string', 'max' => 30],
            [['adress', 'img1', 'img2', 'img3'], 'string', 'max' => 255],
            [['idnumber'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'birthday' => '出生日期',
            'gender' => '性别',
            'nation' => '民族',
            'idnumber' => '身份证号',
            'adress' => '身份证地址',
            'createtime' => '创建时间',
            'img1' => '身份证正面',
            'img2' => '身份证反面',
            'img3' => '手持身份证',
        ];
    }

    public function add($data){
        if($this->load($data)){
            $this->createtime = time();
            if($this->save()&&LogUntils::write(Json::encode($data['AuthPeople']),27,"add")){
                return true;
            }
            return false;
        }
        return false;
    }
    public function edit($data){
        if($this->load($data)){
            if($this->update()&&LogUntils::write(Json::encode($data['AuthPeople']),27,"edit")){
                return true;
            }
            return false;
        }
        return false;
    }
}