<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Evento;

/**
 * EventoSearch represents the model behind the search form about `app\models\Evento`.
 */
class EventoSearch extends Evento
{
    public function rules()
    {
        return [
            [['id_evento', 'direccion', 'descripcion', 'id_ciudad', 'id_deporte', 'id_tipo', 'id_usuario'], 'integer'],
            [['fecha', 'hora'], 'safe'],
            [['lat', 'long'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Evento::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_evento' => $this->id_evento,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'direccion' => $this->direccion,
            'descripcion' => $this->descripcion,
            'lat' => $this->lat,
            'long' => $this->long,
            'id_ciudad' => $this->id_ciudad,
            'id_deporte' => $this->id_deporte,
            'id_tipo' => $this->id_tipo,
            'id_usuario' => $this->id_usuario,
        ]);

        return $dataProvider;
    }
}
