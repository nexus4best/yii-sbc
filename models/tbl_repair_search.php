<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tbl_repair;

/**
 * tbl_repair_search represents the model behind the search form of `app\models\tbl_repair`.
 */
class tbl_repair_search extends tbl_repair
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['BrnStatus', 'BrnCode', 'BrnRepair', 'BrnPos', 'BrnBrand', 'BrnModel', 'BrnSerial', 'BrnCause', 'BrnUserCreate', 'CreatedAt', 'UpdatedAt'], 'safe'],
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
        $query = tbl_repair::find();

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
            'CreatedAt' => $this->CreatedAt,
            'UpdatedAt' => $this->UpdatedAt,
        ]);

        $query->andFilterWhere(['like', 'BrnStatus', $this->BrnStatus])
            ->andFilterWhere(['like', 'BrnCode', $this->BrnCode])
            ->andFilterWhere(['like', 'BrnRepair', $this->BrnRepair])
            ->andFilterWhere(['like', 'BrnPos', $this->BrnPos])
            ->andFilterWhere(['like', 'BrnBrand', $this->BrnBrand])
            ->andFilterWhere(['like', 'BrnModel', $this->BrnModel])
            ->andFilterWhere(['like', 'BrnSerial', $this->BrnSerial])
            ->andFilterWhere(['like', 'BrnCause', $this->BrnCause])
            ->andFilterWhere(['like', 'BrnUserCreate', $this->BrnUserCreate]);

        return $dataProvider;
    }
}