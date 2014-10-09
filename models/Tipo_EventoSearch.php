<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tipo_Evento;

/**
 * Tipo_EventoSearch represents the model behind the search form about `app\models\Tipo_Evento`.
 */
class Tipo_EventoSearch extends Tipo_Evento
{
    public function rules()
    {
        return [
            [['id_tipoEvento'], 'integer'],
            [['nombre'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Tipo_Evento::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_tipoEvento' => $this->id_tipoEvento,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
