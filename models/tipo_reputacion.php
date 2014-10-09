<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_reputacion".
 *
 * @property integer $id_tipo
 * @property string $tipo
 *
 * @property Reputacion[] $reputacions
 */
class tipo_reputacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_reputacion';
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
            'id_tipo' => 'Id Tipo',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReputacions()
    {
        return $this->hasMany(Reputacion::className(), ['id_tipo' => 'id_tipo']);
    }
}
