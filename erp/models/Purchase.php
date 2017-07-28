<?php

namespace app\erp\models;

use app\erp\util\LogUntils;
use app\erp\util\SysConf;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%purchase}}".
 *
 * @property string $id
 * @property string $code
 * @property integer $type
 * @property integer $supplier_id
 * @property integer $user_id
 * @property integer $state
 * @property string $price
 * @property string $data
 * @property integer $num
 * @property string $update_time
 * @property string $create_time
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%purchase}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'supplier_id', 'user_id', 'state', 'num', 'update_time', 'create_time'], 'integer'],
            [['user_id'], 'required'],
            [['price'], 'number'],
            [['code', 'data'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => '采购清单编号',
            'type' => '类型：0是流通货1是尾货',
            'supplier_id' => '供应商ID',
            'user_id' => '采购单操作员',
            'state' => '状态',
            'price' => '采购清单的价格',
            'data' => '采购内容',
            'num' => '采购总数量',
            'update_time' => '修改时间',
            'create_time' => '创建时间',
        ];
    }

    public function add($data){
        if($this->load($data)){
            $this->create_time=$this->update_time=time();
            if($this->save()&&LogUntils::write(Json::encode($data['Purchase']),24,"add")){
                return true;
            }
            return false;
        }
        return false;
    }
    public function edit($data){
        if($this->load($data)){
            if($this->update()&&LogUntils::write(Json::encode($data['Purchase']),24,"edit")){
                return true;
            }
            return false;
        }
        return false;
    }
}
