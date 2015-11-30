<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_instructor".
 *
 * @property integer $ID_INSTRUCTOR
 * @property integer $ID_EMPRESA
 * @property string $NOMBRE_AGENTE_EXTERNO
 * @property string $NOMBRE
 * @property string $APP
 * @property string $APM
 * @property string $DOMICILIO
 * @property string $TELEFONO
 * @property string $CORREO_ELECTRONICO
 * @property integer $LOGOTIPO
 * @property integer $NUM_REGISTRO_AGENTE_EXTERNO
 * @property integer $TIPO_INSTRUCTOR
 * @property string $COMENTARIOS
 * @property integer $ACTIVO
 * @property integer $ID_USUARIO
 * @property string $RFC
 * @property string $SIGN_PIC
 * @property string $SIGN_PASSWD
 * @property string $SIGN_PIC_EXTENSION
 * @property string $SIGN_CREATED_AT
 * @property string $DOCUMENTO_PROBATORIO
 *
 * @property Curso[] $cursos
 * @property Empresa $iDEMPRESA
 * @property User $iDUSUARIO
 */
class Instructor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_instructor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EMPRESA', 'LOGOTIPO', 'NUM_REGISTRO_AGENTE_EXTERNO', 'TIPO_INSTRUCTOR', 'ACTIVO', 'ID_USUARIO'], 'integer'],
            [['SIGN_CREATED_AT'], 'safe'],
            [['NOMBRE_AGENTE_EXTERNO', 'NOMBRE', 'APP', 'APM', 'TELEFONO', 'SIGN_PIC_EXTENSION'], 'string', 'max' => 100],
            [['DOMICILIO', 'CORREO_ELECTRONICO'], 'string', 'max' => 300],
            [['COMENTARIOS'], 'string', 'max' => 200],
            [['RFC'], 'string', 'max' => 13],
            [['SIGN_PIC', 'SIGN_PASSWD'], 'string', 'max' => 2048],
            [['DOCUMENTO_PROBATORIO'], 'string', 'max' => 1048]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_INSTRUCTOR' => 'Id  Instructor',
            'ID_EMPRESA' => 'Id  Empresa',
            'NOMBRE_AGENTE_EXTERNO' => 'Nombre  Agente  Externo',
            'NOMBRE' => 'Nombre',
            'APP' => 'App',
            'APM' => 'Apm',
            'DOMICILIO' => 'Domicilio',
            'TELEFONO' => 'Telefono',
            'CORREO_ELECTRONICO' => 'Correo  Electronico',
            'LOGOTIPO' => 'Logotipo',
            'NUM_REGISTRO_AGENTE_EXTERNO' => 'Num  Registro  Agente  Externo',
            'TIPO_INSTRUCTOR' => 'Tipo  Instructor',
            'COMENTARIOS' => 'Comentarios',
            'ACTIVO' => 'Activo',
            'ID_USUARIO' => 'Id  Usuario',
            'RFC' => 'Rfc',
            'SIGN_PIC' => 'Sign  Pic',
            'SIGN_PASSWD' => 'Sign  Passwd',
            'SIGN_PIC_EXTENSION' => 'Sign  Pic  Extension',
            'SIGN_CREATED_AT' => 'Sign  Created  At',
            'DOCUMENTO_PROBATORIO' => 'Documento  Probatorio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['ID_INSTRUCTOR' => 'ID_INSTRUCTOR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDEMPRESA()
    {
        return $this->hasOne(Empresa::className(), ['ID_EMPRESA' => 'ID_EMPRESA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDUSUARIO()
    {
        return $this->hasOne(User::className(), ['id' => 'ID_USUARIO']);
    }
}
