<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders_items".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product
 * @property int $price
 * @property int $qty
 * @property int|null $active
 * @property int $create_up
 * @property int $update_up
 *
 * @property Orders $order
 * @property Products $product0
 */
class OrdersItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product', 'price', 'qty', 'create_up', 'update_up'], 'required','message'=>'* {attribute} không được để trống'],
            [['order_id', 'product', 'price', 'qty', 'active', 'create_up', 'update_up'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product' => 'Product',
            'price' => 'Price',
            'qty' => 'Qty',
            'active' => 'Active',
            'create_up' => 'Create Up',
            'update_up' => 'Update Up',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Product0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct0()
    {
        return $this->hasOne(Products::className(), ['id' => 'product']);
    }
}
