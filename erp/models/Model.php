<?php

namespace app\erp\models;

use app\erp\util\LogUntils;
use app\erp\util\SysConf;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%platform}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $ename
 * @property string $content
 * @property string $admin_id
 * @property string $auth_code
 * @property string $key_code
 * @property integer $state
 * @property string $create_time
 * @property string $update_time
 */
class Model extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%platform}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'ename', 'content'], 'required','message'=>"不能为空"],
            [['state','admin_id', 'create_time', 'update_time'], 'integer'],
            [['name', 'ename'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 500],
            [['auth_code', 'key_code'], 'string', 'max' => 45],
            [['name'], 'unique','message'=>"平台已经存在"],
            [['ename'], 'unique','message'=>"英文名称已经存在"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'id' => 'ID',
            'name' => '名称',
            'ename' => '英文名称',
            'content' => '介绍',
            'admin_id' => '管理员',
            'auth_code' => '授权码',
            'key_code' => '认证码',
            'state' => '状态',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }
    public function add($data){
        if($this->load($data)){
            $this->auth_code = SysConf::uuid("auth-");
            $this->key_code= SysConf::uuid("key-");
            $this->create_time=$this->update_time=time();
            if($this->save()&&LogUntils::write(Json::encode($data['Model']),$this->getPrimaryKey(),"add")){
                return true;
            }
            return false;
        }
        return false;
    }
    public function edit($data){
        if($this->load($data)){
            if($this->update()&&LogUntils::write(Json::encode($data['Model']),$this->getPrimaryKey(),"edit")){
                return true;
            }
            return false;
        }
        return false;
    }
}