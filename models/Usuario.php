<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuario".
 *
 * @property integer $id_usr
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nac
 * @property string $sexo
 * @property string $email
 * @property string $clave
 * @property string $usr
 * @property integer $telefono
 * @property string $foto
 *
 * @property Candidato[] $candidatos
 * @property Evento[] $eventos
 * @property Reputacion[] $reputacions
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
       /*********** agregar para interface *********************/
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    public static function findIdentityByAccessToken($token)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id_usr;
    }

    public function getAuthKey()
    {
        return $this->clave;
    }

    public function validateAuthKey($authKey)
    {
        return $this->clave === $authKey;
    }
/*agregar para funcionamiento*/    
    public static function findByUsername($username)
    {
        return static::findOne(['usr' => $username]);
    }
    public function validatePassword($authKey)
    {
        return $this->clave === $authKey;
    }
    public function getUsername()
    {
        return $this->usr;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_nac'], 'safe'],
            [['nombre','apellido','email','telefono','clave','usr'], 'required'],
            [['usr','email'], 'unique'],
            [['telefono'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 40],
            [['sexo'], 'string', 'max' => 10],
            [['email'],'email'],
            [['clave', 'usr','foto'], 'string', 'max' => 140],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usr' => 'Id Usr',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nac' => 'Fecha Nacimiento',
            'sexo' => 'Sexo',
            'email' => 'E-mail',
            'clave' => 'Clave',
            'usr' => 'Usuario',
            'telefono' => 'Teléfono (sólo números)',
            'foto' => 'Foto de Perfil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidatos()
    {
        return $this->hasMany(Candidato::className(), ['id_usr' => 'id_usr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['id_usuario' => 'id_usr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReputacions()
    {
        return $this->hasMany(Reputacion::className(), ['id_usr' => 'id_usr']);
    }
}
