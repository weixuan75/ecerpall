<?php

namespace app\erp\models;

use Yii;

/**
 * This is the model class for table "{{%purchase_product}}".
 *
 * @property string $id
 * @property string $purchase_id
 * @property integer $product_id
 */
class PurchaseProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%purchase_product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchase_id', 'product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'purchase_id' => 'Purchase ID',
            'product_id' => 'Product ID',
        ];
    }
}
