<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\productdetail;

/**
 * productdetailSE represents the model behind the search form of `backend\models\productdetail`.
 */
class productdetailSE extends productdetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'create_up', 'update_up', 'active'], 'integer'],
            [['pr_code', 'pr_image1', 'pr_image2', 'pr_image3', 'pr_image4', 'pr_desc'], 'safe'],
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
        $query = productdetail::find();

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

        $query->andFilterWhere(['like', 'pr_code', $this->pr_code])
            ->andFilterWhere(['like', 'pr_image1', $this->pr_image1])
            ->andFilterWhere(['like', 'pr_image2', $this->pr_image2])
            ->andFilterWhere(['like', 'pr_image3', $this->pr_image3])
            ->andFilterWhere(['like', 'pr_image4', $this->pr_image4])
            ->andFilterWhere(['like', 'pr_desc', $this->pr_desc]);

        return $dataProvider;
    }
}
