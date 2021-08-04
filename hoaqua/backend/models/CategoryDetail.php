<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category_detail".
 *
 * @property int $id
 * @property string $cat_title
 * @property int|null $active
 * @property int $create_up
 * @property int $update_up
 *
 * @property Categories[] $categories
 */
class CategoryDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_title', 'create_up', 'update_up'], 'required','message'=>'* {attribute} không được để trống'],
            [['cat_title'], 'string'],
            [['active', 'create_up', 'update_up'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_title' => 'Cấp danh mục',
            'active' => 'Tình trạng',
            'create_up' => 'Ngày khởi tạo',
            'update_up' => 'Ngày cập nhật',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['cate_id' => 'id']);
    }
}
