<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property int $id
 * @property string $banner_title
 * @property string $banner_image
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['banner_title', 'banner_image'], 'required'],
            [['banner_image'], 'string'],
            [['banner_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'banner_title' => 'Banner Title',
            'banner_image' => 'Banner Image',
        ];
    }
}
