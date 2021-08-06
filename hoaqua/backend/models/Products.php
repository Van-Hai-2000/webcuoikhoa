<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $product_cat
 * @property int $product_band
 * @property string $product_title
 * @property int $product_price
 * @property string $product_desc
 * @property string $product_keywords
 * @property int $create_up
 * @property int $update_up
 * @property int|null $active
 *
 * @property OrdersItems[] $ordersItems
 * @property Categories $productCat
 * @property Brands $productBand
 */
class Products extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_cat', 'product_band', 'product_title', 'product_price', 'product_desc', 'product_keywords', 'create_up', 'update_up'], 'required','message'=>'* {attribute} không được để trống'],
            [['product_cat', 'product_band', 'product_price', 'create_up', 'update_up', 'active'], 'integer'],
            [['product_desc', 'product_keywords'], 'string'],
            [['product_title'], 'string', 'max' => 255],
            [['product_cat'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['product_cat' => 'id']],
            [['product_band'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['product_band' => 'id']],
            [['file'],'file','extensions'=>'jpg,png,gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_cat' => 'Danh mục sản phẩm',
            'product_band' => 'Nhà cung cấp',
            'product_title' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm',
            'product_img'=>'Ảnh sản phẩm',
            'product_desc' => 'Thông tin sản phẩm',
            'product_keywords' => 'Mã sản phẩm',
            'create_up' => 'Ngày tạo',
            'update_up' => 'Ngày cập nhật',
            'active' => 'Tình trạng',
        ];
    }

    /**
     * Gets query for [[OrdersItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersItems()
    {
        return $this->hasMany(OrdersItems::className(), ['product' => 'id']);
    }

    /**
     * Gets query for [[ProductCat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCat()
    {
        return $this->hasOne(Categories::className(), ['id' => 'product_cat']);
    }

    /**
     * Gets query for [[ProductBand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductBand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'product_band']);
    }
    public function getproid($id)
    {
        $data = Products::findOne(['id'=>$id]);
        return $data;
    }
}
