<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $new_title
 * @property string $new_image
 * @property string $new_desc
 * @property int $create_up
 * @property int $update_up
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_title', 'new_image', 'new_desc', 'create_up', 'update_up'], 'required'],
            [['new_image', 'new_desc'], 'string'],
            [['create_up', 'update_up'], 'integer'],
            [['new_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'new_title' => 'New Title',
            'new_image' => 'New Image',
            'new_desc' => 'New Desc',
            'create_up' => 'Create Up',
            'update_up' => 'Update Up',
        ];
    }
}
