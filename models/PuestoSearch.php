<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\puesto;

/**
 * PuestoSearch represents the model behind the search form about `app\models\puesto`.
 */
class PuestoSearch extends puesto
{
    public function rules()
    {
        return [
            [['id_puesto', 'id_deporte'], 'integer'],
            [['descripcion'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = puesto::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_puesto' => $this->id_puesto,
            'id_deporte' => $this->id_deporte,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
