<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Puesto".
 *
 * @property integer $id_puesto
 * @property string $descripcion
 * @property integer $id_deporte
 *
 * @property Deporte $idDeporte
 */
class puesto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Puesto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'id_deporte'], 'required'],
            [['id_deporte'], 'integer'],
            [['descripcion'], 'string', 'max' => 140]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_puesto' => 'Id Puesto',
            'descripcion' => 'Puesto',
            'id_deporte' => 'Id Deporte',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDeporte()
    {
        return $this->hasOne(Deporte::className(), ['id_deporte' => 'id_deporte']);
    }
}
