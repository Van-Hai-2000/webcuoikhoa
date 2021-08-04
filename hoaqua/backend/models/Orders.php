<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property float $vat_rate
 * @property float $vat
 * @property float $subtotal
 * @property float $total
 * @property int $status
 * @property string $date
 * @property string $description
 * @property int $create_up
 * @property int $update_up
 * @property int|null $active
 *
 * @property Statuses $status0
 * @property OrdersItems[] $ordersItems
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vat_rate', 'vat', 'subtotal', 'total', 'status', 'date', 'description', 'create_up', 'update_up'], 'required','message'=>'* {attribute} không được để trống'],
            [['vat_rate', 'vat', 'subtotal', 'total'], 'number'],
            [['status', 'create_up', 'update_up', 'active'], 'integer'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Statuses::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vat_rate' => 'GTGT SP',
            'vat' => 'GTGT',
            'subtotal' => 'Giá tạm tính',
            'total' => 'Tổng',
            'status' => 'Trạng thái',
            'date' => 'Ngày đặt',
            'description' => 'Ghi chú',
            'create_up' => 'Ngày tạo',
            'update_up' => 'Ngày cập nhật',
            'active' => 'Tình trạng',
        ];
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Statuses::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[OrdersItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersItems()
    {
        return $this->hasMany(OrdersItems::className(), ['order_id' => 'id']);
    }
}
