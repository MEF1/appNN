<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Ciudad".
 *
 * @property integer $id_ciudad
 * @property string $nombre
 *
 * @property Evento[] $eventos
 */
class Ciudad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Ciudad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 48]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ciudad' => 'Id Ciudad',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['id_ciudad' => 'id_ciudad']);
    }
}
