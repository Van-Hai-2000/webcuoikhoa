<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "brands".
 *
 * @property int $id
 * @property string $brand_title
 * @property string $brand_mobile
 * @property string $brand_address1
 * @property string $brand_email
 * @property string $brand_image
 * @property int $create_up
 * @property int $update_up
 * @property int|null $active
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public static function tableName()
    {
        return 'brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_title', 'brand_mobile', 'brand_address1', 'brand_email', 'brand_image', 'active'], 'required','message'=>'* {attribute} không được để trống'],
            [['brand_title', 'brand_image'], 'string'],
            [['create_up', 'update_up', 'active'], 'integer'],
            [['brand_mobile'], 'string', 'max' => 10],
            [['brand_address1'], 'string', 'max' => 300],
            [['brand_email'], 'string', 'max' => 150],
            [['file'],'file','extensions'=>'jpg,png,gif']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_title' => 'Tên nhà cung cấp ',
            'brand_mobile' => 'SDT',
            'brand_address1' => 'Địa chỉ',
            'brand_email' => 'Email',
            'brand_image' => 'Ảnh',
            'create_up' => 'Ngày khởi tạo',
            'update_up' => 'Ngày cập nhật ',
            'active' => 'Trạng thái',
        ];
    }
}
