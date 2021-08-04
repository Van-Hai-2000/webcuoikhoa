<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\products;

/**
 * productsSE represents the model behind the search form of `backend\models\products`.
 */
class productsSE extends products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_cat', 'product_band', 'product_price', 'create_up', 'update_up', 'active'], 'integer'],
            [['product_title', 'product_desc', 'product_keywords'], 'safe'],
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
        $query = products::find();

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
            'product_cat' => $this->product_cat,
            'product_band' => $this->product_band,
            'product_price' => $this->product_price,
            'create_up' => $this->create_up,
            'update_up' => $this->update_up,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'product_title', $this->product_title])
            ->andFilterWhere(['like', 'product_desc', $this->product_desc])
            ->andFilterWhere(['like', 'product_keywords', $this->product_keywords]);

        return $dataProvider;
    }
}
