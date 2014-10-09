<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tipo_reputacion;

/**
 * tipo_reputacionSearch represents the model behind the search form about `app\models\tipo_reputacion`.
 */
class tipo_reputacionSearch extends tipo_reputacion
{
    public function rules()
    {
        return [
            [['id_tipo'], 'integer'],
            [['tipo'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = tipo_reputacion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_tipo' => $this->id_tipo,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
