<?php

namespace app\erp\models\product;

use Yii;

/**
 * This is the model class for table "{{%product_price}}".
 *
 * @property string $id
 * @property string $product_id
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
            [['product_id', 'user_id'], 'required'],
            [['product_id', 'user_id'], 'integer'],
            [['cost', 'price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => '产品ID',
            'cost' => '成本价',
            'price' => '市场价',
            'user_id' => '操作人ID',
        ];
    }
}
