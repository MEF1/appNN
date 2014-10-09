<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Reputacion".
 *
 * @property integer $id_reputacion
 * @property string $comentario
 * @property integer $positvo
 * @property integer $negativo
 * @property integer $id_tipo
 * @property integer $id_usr
 * @property integer $id_evento
 *
 * @property Usuario $idUsr
 * @property Evento $idEvento
 * @property TipoReputacion $idTipo
 */
class Reputacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Reputacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comentario', 'positvo', 'negativo', 'id_tipo', 'id_usr', 'id_evento'], 'required'],
            [['positvo', 'negativo', 'id_tipo', 'id_usr', 'id_evento'], 'integer'],
            [['comentario'], 'string', 'max' => 140]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_reputacion' => 'Id Reputacion',
            'comentario' => 'Comentario',
            'positvo' => 'Positvo',
            'negativo' => 'Negativo',
            'id_tipo' => 'Id Tipo',
            'id_usr' => 'Id Usr',
            'id_evento' => 'Id Evento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsr()
    {
        return $this->hasOne(Usuario::className(), ['id_usr' => 'id_usr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvento()
    {
        return $this->hasOne(Evento::className(), ['id_evento' => 'id_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipo()
    {
        return $this->hasOne(TipoReputacion::className(), ['id_tipo' => 'id_tipo']);
    }
}
