<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Puesto_Evento".
 *
 * @property integer $id_puestoEvento
 * @property integer $id_evento
 * @property integer $id_puesto
 *
 * @property Candidato[] $candidatos
 * @property puesto &id_puesto 
 */
class Puesto_Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Puesto_Evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_evento', 'id_puesto'], 'required'],
            [['id_evento', 'id_puesto'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_puestoEvento' => 'Id Puesto Evento',
            'id_evento' => 'Id Evento',
            'id_puesto' => 'Id Puesto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidatos()
    {
        return $this->hasMany(Candidato::className(), ['id_puestoEvento' => 'id_puestoEvento']);
    }
    
    public function getIdPuesto()
    {
        return $this->hasOne(puesto::className(), ['id_puesto' => 'id_puesto']);
    }
    
    public function getIdEvento()
    {
        return $this->hasOne(Evento::className(), ['id_evento' => 'id_evento']);
    }
    
}
