<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $country
 * @property string $code
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'code','create_up', 'update_up'], 'required','message'=>'* {attribute} không được để trống'],
            [['country'], 'string'],
            [['code'], 'string', 'max' => 10],
            [['active','create_up', 'update_up'],'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Thành phố',
            'code' => 'Mã Code',
            'create_up' => 'Ngày tạo',
            'update_up' => 'Ngày Cập nhật',
            'active' => 'Tình trạng',
        ];
    }
}
