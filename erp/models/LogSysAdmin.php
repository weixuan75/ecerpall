<?php

namespace app\erp\models;

use app\erp\util\UserUtil;
use Yii;

/**
 * This is the model class for table "{{%log_sys_admin}}".
 *
 * @property string $id
 * @property string $admin_id
 * @property integer $model_id
 * @property string $content
 * @property integer $state
 * @property integer $tag
 * @property string $time
 */
class LogSysAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log_sys_admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'content'], 'required'],
            [['admin_id', 'model_id', 'state', 'tag', 'time'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => '管理员ID',
            'model_id' => '模块ID',
            'content' => '操作内容',
            'state' => '状态',
            'tag' => '操作标签',
            'time' => '时间',
        ];
    }
    public function add($data){
        $this->content=$data;
        $this->time = time();
        $this->admin_id = UserUtil::UserId();
        if($this->save()){
            return true;
        }
        return false;
    }
}
