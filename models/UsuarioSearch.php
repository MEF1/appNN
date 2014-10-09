<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    public function rules()
    {
        return [
            [['id_usr', 'telefono'], 'integer'],
            [['nombre', 'apellido', 'fecha_nac', 'sexo', 'email', 'clave', 'usr', 'foto'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Usuario::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_usr' => $this->id_usr,
            'fecha_nac' => $this->fecha_nac,
            'telefono' => $this->telefono,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'clave', $this->clave])
            ->andFilterWhere(['like', 'usr', $this->usr])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
