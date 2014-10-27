<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Deporte".
 *
 * @property integer $id_deporte
 * @property string $nombre
 *
 * @property Evento[] $eventos
 * @property Puesto[] $puestos
 */
class Deporte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Deporte';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_deporte' => 'Id Deporte',
            'nombre' => 'Deporte',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['id_deporte' => 'id_deporte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuestos()
    {
        return $this->hasMany(Puesto::className(), ['id_deporte' => 'id_deporte']);
    }
}
