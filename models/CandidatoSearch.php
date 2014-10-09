<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Candidato;

/**
 * CandidatoSearch represents the model behind the search form about `app\models\Candidato`.
 */
class CandidatoSearch extends Candidato
{
    public function rules()
    {
        return [
            [['id_candidato', 'id_usr', 'id_puestoEvento', 'id_estado'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Candidato::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_candidato' => $this->id_candidato,
            'id_usr' => $this->id_usr,
            'id_puestoEvento' => $this->id_puestoEvento,
            'id_estado' => $this->id_estado,
        ]);

        return $dataProvider;
    }
}
