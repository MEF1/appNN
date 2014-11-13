<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Puesto_Evento;

/**
 * Puesto_EventoSearch represents the model behind the search form about `app\models\Puesto_Evento`.
 */
class Puesto_EventoSearch extends Puesto_Evento
{
    public $_id_usuario;
    public function rules()
    {
        return [
            [['id_puestoEvento', 'id_evento', 'id_puesto'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Puesto_Evento::find();
        $query->joinWith(['idEvento']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if(isset($this->_id_usuario)){
            $query->andFilterWhere([
    'Evento.id_usuario' => $this->_id_usuario]);
        }
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_puestoEvento' => $this->id_puestoEvento,
            'id_evento' => $this->id_evento,
            'id_puesto' => $this->id_puesto,
        ]);

        return $dataProvider;
    }
}
