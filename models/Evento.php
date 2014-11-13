<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Evento".
 *
 * @property integer $id_evento
 * @property string $fecha
 * @property string $hora
 * @property integer $direccion
 * @property integer $descripcion
 * @property double $lat
 * @property double $long
 * @property integer $id_ciudad
 * @property integer $id_deporte
 * @property integer $id_tipo
 * @property integer $id_usuario
 *
 * @property Ciudad $idCiudad
 * @property Deporte $idDeporte
 * @property TipoEvento $idTipo
 * @property Usuario $idUsuario
 * @property Reputacion[] $reputacions
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'hora', 'direccion', 'descripcion', 'id_ciudad', 'id_deporte', 'id_tipo', 'id_usuario'], 'required'],
            [['fecha', 'hora'], 'safe'],
            [['id_ciudad', 'id_deporte', 'id_tipo', 'id_usuario'], 'integer'],
            [['direccion', 'descripcion'], 'string'],
            [['lat', 'long'], 'double']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_evento' => 'Id Evento',
            'fecha' => 'Fecha',
            'hora' => 'Hora',
            'direccion' => 'Direccion',
            'descripcion' => 'Evento',
            'lat' => 'Lat',
            'long' => 'Long',
            'id_ciudad' => 'Ciudad',
            'id_deporte' => 'Deporte',
            'id_tipo' => 'Tipo',
            'id_usuario' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['id_ciudad' => 'id_ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDeporte()
    {
        return $this->hasOne(Deporte::className(), ['id_deporte' => 'id_deporte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipo()
    {
        return $this->hasOne(Tipo_Evento::className(), ['id_tipoEvento' => 'id_tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usr' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReputacions()
    {
        return $this->hasMany(Reputacion::className(), ['id_evento' => 'id_evento']);
    }
}
