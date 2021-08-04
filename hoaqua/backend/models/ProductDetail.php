<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_detail".
 *
 * @property int $id
 * @property string $pr_code
 * @property string $pr_image1
 * @property string $pr_image2
 * @property string $pr_image3
 * @property string $pr_image4
 * @property string $pr_desc
 * @property int $create_up
 * @property int $update_up
 * @property int|null $active
 */
class ProductDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pr_code', 'pr_image1', 'pr_image2', 'pr_image3', 'pr_image4', 'pr_desc', 'create_up', 'update_up'], 'required','message'=>'* {attribute} không được để trống'],
            [['pr_image1', 'pr_image2', 'pr_image3', 'pr_image4', 'pr_desc'], 'string'],
            [['create_up', 'update_up', 'active'], 'integer'],
            [['pr_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pr_code' => 'Pr Code',
            'pr_image1' => 'Pr Image1',
            'pr_image2' => 'Pr Image2',
            'pr_image3' => 'Pr Image3',
            'pr_image4' => 'Pr Image4',
            'pr_desc' => 'Pr Desc',
            'create_up' => 'Ngày tạo',
            'update_up' => 'Ngày cập nhật',
            'active' => 'Trạng thái',
        ];
    }
}
