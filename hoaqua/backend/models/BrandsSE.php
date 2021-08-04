<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Brands;

/**
 * BrandsSE represents the model behind the search form of `backend\models\Brands`.
 */
class BrandsSE extends Brands
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'create_up', 'update_up', 'active'], 'integer'],
            [['brand_title', 'brand_mobile', 'brand_address1', 'brand_email', 'brand_image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Brands::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'create_up' => $this->create_up,
            'update_up' => $this->update_up,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'brand_title', $this->brand_title])
            ->andFilterWhere(['like', 'brand_mobile', $this->brand_mobile])
            ->andFilterWhere(['like', 'brand_address1', $this->brand_address1])
            ->andFilterWhere(['like', 'brand_email', $this->brand_email])
            ->andFilterWhere(['like', 'brand_image', $this->brand_image]);

        return $dataProvider;
    }
}
