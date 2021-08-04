<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\orders;

/**
 * ordersSE represents the model behind the search form of `backend\models\orders`.
 */
class ordersSE extends orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'create_up', 'update_up', 'active'], 'integer'],
            [['vat_rate', 'vat', 'subtotal', 'total'], 'number'],
            [['date', 'description'], 'safe'],
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
        $query = orders::find();

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
            'vat_rate' => $this->vat_rate,
            'vat' => $this->vat,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
            'status' => $this->status,
            'date' => $this->date,
            'create_up' => $this->create_up,
            'update_up' => $this->update_up,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
