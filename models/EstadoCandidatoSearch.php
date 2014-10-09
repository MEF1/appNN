<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadoCandidato;

/**
 * EstadoCandidatoSearch represents the model behind the search form about `app\models\EstadoCandidato`.
 */
class EstadoCandidatoSearch extends EstadoCandidato
{
    public function rules()
    {
        return [
            [['id_estado'], 'integer'],
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
        $query = EstadoCandidato::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_estado' => $this->id_estado,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
