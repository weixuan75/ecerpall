<?php

namespace app\erp\models\product;

use Yii;

/**
 * This is the model class for table "{{%product_price}}".
 *
 * @property string $id
 * @property string $cost
 * @property string $price
 * @property integer $user_id
 */
class ProductPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_price}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cost', 'price'], 'number'],
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cost' => '成本价',
            'price' => '市场价',
            'user_id' => '操作人ID',
        ];
    }
}
