<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\news;

/**
 * newsSE represents the model behind the search form of `backend\models\news`.
 */
class newsSE extends news
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'create_up', 'update_up'], 'integer'],
            [['new_title', 'new_image', 'new_desc'], 'safe'],
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
        $query = news::find();

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
        ]);

        $query->andFilterWhere(['like', 'new_title', $this->new_title])
            ->andFilterWhere(['like', 'new_image', $this->new_image])
            ->andFilterWhere(['like', 'new_desc', $this->new_desc]);

        return $dataProvider;
    }
}
