<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Candidato".
 *
 * @property integer $id_candidato
 * @property integer $id_usr
 * @property integer $id_puestoEvento
 * @property integer $id_estado
 *
 * @property Usuario $idUsr
 * @property PuestoEvento $idPuestoEvento
 * @property EstadoCandidato $idEstado
 */
class Candidato extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Candidato';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_candidato', 'id_usr', 'id_puestoEvento', 'id_estado'], 'integer'],
            [['id_usr', 'id_puestoEvento', 'id_estado'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_candidato' => 'Id Candidato',
            'id_usr' => 'Id Usr',
            'id_puestoEvento' => 'Id Puesto Evento',
            'id_estado' => 'Id Estado',
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
    public function getIdPuestoEvento()
    {
        return $this->hasOne(Puesto_Evento::className(), ['id_puestoEvento' => 'id_puestoEvento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasOne(EstadoCandidato::className(), ['id_estado' => 'id_estado']);
    }
}
