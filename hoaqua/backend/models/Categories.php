<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $title
 * @property int $cate_id
 * @property int $create_up
 * @property int $update_up
 * @property int|null $active
 *
 * @property CategoryDetail $cate
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'cate_id', 'create_up', 'update_up'], 'required','message'=>'* {attribute} không được để trống'],
            [['title'], 'string'],
            [['cate_id', 'create_up', 'update_up', 'active','parent_id'], 'integer'],
            [['cate_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryDetail::className(), 'targetAttribute' => ['cate_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tên danh mục',
            'cate_id' => 'Danh mục cấp',
            'create_up' => 'Ngày tạo',
            'update_up' => 'Ngày Cập nhật',
            'active' => 'Tình trạng',
            'parent_id'=>'Danh mục cha',
        ];
    }

    /**
     * Gets query for [[Cate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCate()
    {
        return $this->hasOne(CategoryDetail::className(), ['id' => 'cate_id']);
    }
    public function getcate_cate($parent)
    {
        $cate=Categories::find()->where(['parent_id'=>$parent])->all();
        return $cate;
    }
}
