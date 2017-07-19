<?php

namespace app\erp\models;

use app\erp\util\SysConf;
use Yii;

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
class Platform extends \yii\db\ActiveRecord
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
            [['name', 'ename', 'content'], 'required'],
            [['state', 'create_time', 'update_time'], 'integer'],
            [['name', 'ename'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 500],
            [['admin_id', 'auth_code', 'key_code'], 'string', 'max' => 36],
            [['name'], 'unique'],
            [['ename'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
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
            $this->create_time=$this->create_time=time();
            if($this->save()){
                return true;
            }
            return false;
        }
        return false;
    }
}