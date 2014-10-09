<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reputacion;

/**
 * ReputacionSearch represents the model behind the search form about `app\models\Reputacion`.
 */
class ReputacionSearch extends Reputacion
{
    public function rules()
    {
        return [
            [['id_reputacion', 'positvo', 'negativo', 'id_tipo', 'id_usr', 'id_evento'], 'integer'],
            [['comentario'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Reputacion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_reputacion' => $this->id_reputacion,
            'positvo' => $this->positvo,
            'negativo' => $this->negativo,
            'id_tipo' => $this->id_tipo,
            'id_usr' => $this->id_usr,
            'id_evento' => $this->id_evento,
        ]);

        $query->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
}
