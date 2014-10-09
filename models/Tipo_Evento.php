<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tipo_Evento".
 *
 * @property integer $id_tipoEvento
 * @property string $nombre
 *
 * @property Evento[] $eventos
 */
class Tipo_Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tipo_Evento';
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
            'id_tipoEvento' => 'Id Tipo Evento',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['id_tipo' => 'id_tipoEvento']);
    }
}
