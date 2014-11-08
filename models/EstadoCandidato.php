<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EstadoCandidato".
 *
 * @property integer $id_estado
 * @property string $tipo
 *
 * @property Candidato[] $candidatos
 */
class EstadoCandidato extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EstadoCandidato';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo'], 'required'],
            [['tipo'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id Estado',
            'tipo' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidatos()
    {
        return $this->hasMany(Candidato::className(), ['id_estado' => 'id_estado']);
    }
}
