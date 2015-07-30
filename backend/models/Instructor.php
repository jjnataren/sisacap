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
 *
 * @property Curso[] $cursos
 * @property Empresa $iDEMPRESA
 */
class Instructor extends \yii\db\ActiveRecord
{
    
/**
 * Tipos de capacitadores
 * @var unknown
 */
	const TIPO_AGENTE_CAP_INTERNO = 1;
	const TIPO_AGENTE_EXT_IND = 2;
	const TIPO_AGENTE_ACREDITACION = 3;
	const TIPO_AGENTE_PROVEDOR = 4;
	
	
	public static function getTypeInstructor(){
		 
		return [Instructor::TIPO_AGENTE_CAP_INTERNO=>'Agente capacitador interno',
				self::TIPO_AGENTE_EXT_IND=>'Agente capacitador externo con numero de acreditación, independiente',
				self::TIPO_AGENTE_ACREDITACION=>'Agente capacitador externo con numero de acreditación, perteneciente a una empresa ', 
				self::TIPO_AGENTE_PROVEDOR=>'Agente empresa provedor externo'];
	}
	
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
            [['ID_EMPRESA', 'LOGOTIPO', 'NUM_REGISTRO_AGENTE_EXTERNO', 'TIPO_INSTRUCTOR', 'ACTIVO'], 'integer'],
//            [['NUM_REGISTRO_AGENTE_EXTERNO'], 'required'],
            [['NOMBRE_AGENTE_EXTERNO', 'NOMBRE', 'APP', 'APM', 'TELEFONO'], 'string', 'max' => 100],
            [['DOMICILIO', 'CORREO_ELECTRONICO'], 'string', 'max' => 300],
            [['COMENTARIOS'], 'string', 'max' => 200]
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
            'NOMBRE_AGENTE_EXTERNO' => 'Nombre del agente  externo',
            'NOMBRE' => 'Nombre',
            'APP' => 'Apellido paterno',
            'APM' => 'Apellido materno',
            'DOMICILIO' => 'Domicilio',
            'TELEFONO' => 'Teléfono',
            'CORREO_ELECTRONICO' => 'Correo  electrónico',
            'LOGOTIPO' => 'Logotipo',
            'NUM_REGISTRO_AGENTE_EXTERNO' => 'Número de registro del agente  externo',
            'TIPO_INSTRUCTOR' => 'Tipo de instructor',
            'COMENTARIOS' => 'Comentarios',
            'ACTIVO' => 'Activo',
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
}
