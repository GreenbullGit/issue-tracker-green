<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Issue;

/**
 * IssueSearch represents the model behind the search form of `app\models\Issue`.
 */
class IssueSearch extends Issue
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'PARENT_ID'], 'integer'],
            [['NAME', 'DESCRIPTION', 'STATUS', 'PRIORITY', 'URL'], 'safe'],
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
    public function search($params, $parentId=NULL)
    {
        if($parentId){
        $query = Issue::find()->where(['PARENT_ID' => $parentId])->andWhere(['<>','STATUS',"Closed"]);
        }
        else{
        $query = Issue::find()->where(['PARENT_ID' => NULL])->andWhere(['<>','STATUS',"Closed"]);
        }
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
            'ID' => $this->ID,
            'PARENT_ID' => $this->PARENT_ID,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'DESCRIPTION', $this->DESCRIPTION])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS])
            ->andFilterWhere(['like', 'PRIORITY', $this->PRIORITY])
            ->andFilterWhere(['like', 'URL', $this->URL]);

        return $dataProvider;
    }
}
