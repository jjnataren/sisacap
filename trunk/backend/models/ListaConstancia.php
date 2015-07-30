<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_lista_constancia".
 *
 * @property integer $ID_LISTA
 * @property integer $ID_CONSTANCIA
 * @property string $FECHA_AGREGO
 * @property integer $ESTATUS
 * @property integer $ACTIVO
 * @property integer $MODALIDAD_CAPACITACION
 * @property integer $OBJETIVO_CAPACITACION
 *
 * @property ListaPlan $iDLISTA
 * @property Constancia $iDCONSTANCIA
 */
class ListaConstancia extends \yii\db\ActiveRecord
{
	
	const MODALIDAD_PRESENCIAL = 1;
	const MODALIDAD_LINEA = 2;
	const MODALIDAD_MIXTA = 3;
	
	//Actualizar y perfeccionar conocimientos y habilidades y proporcionar información de nuevas tecnologías
	const OBJ_NUEVAS_TEC = 1;
	//Prevenir riesgos de trabajo
	const OBJ_PREV_RIESG_TRAB = 2;
	//Incrementar la productividad
	const OBJ_INC_PROD = 3;
	//Mejorar el nivel educativo
	const OBJ_NIV_EDU = 4;
	//Preparar para ocupar vacantes o puestos de nueva creación
	const OBJ_OCU_VAC_PUEST_NUEVA_CREA = 5;
	
	
	
	/**
	 * Get all modalidades of ListaConstancia
	 * @return multitype:string
	 */
	public static function  getAllModalidades(){
		
		return [ListaConstancia::MODALIDAD_PRESENCIAL=>'Modalidad precencial', ListaConstancia::MODALIDAD_LINEA=>'Modalidad linea', ListaConstancia::MODALIDAD_MIXTA=>'Modalidad mixta'];
		
	}
	
	
	public static function getAllObetivos(){

		return [
	
		ListaConstancia::OBJ_NUEVAS_TEC=>'Actualizar y perfeccionar conocimientos y habilidades y proporcionar información de nuevas tecnologías',
		ListaConstancia::OBJ_PREV_RIESG_TRAB=>'Prevenir riesgos de trabajo',
		ListaConstancia::OBJ_INC_PROD=>'Incrementar la productividad',
		ListaConstancia::OBJ_NIV_EDU=>'Mejorar el nivel educativo',
		ListaConstancia::OBJ_OCU_VAC_PUEST_NUEVA_CREA=>'Preparar para ocupar vacantes o puestos de nueva creación',
		
		];
		
	}
	
	
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_lista_constancia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_LISTA', 'ID_CONSTANCIA'], 'required'],
            [['ID_LISTA', 'ID_CONSTANCIA', 'ESTATUS', 'ACTIVO', 'MODALIDAD_CAPACITACION', 'OBJETIVO_CAPACITACION'], 'integer'],
            [['FECHA_AGREGO'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_LISTA' => 'Id  Lista',
            'ID_CONSTANCIA' => 'Id  Constancia',
            'FECHA_AGREGO' => 'Fecha  Agrego',
            'ESTATUS' => 'Estatus',
            'ACTIVO' => 'Activo',
            'MODALIDAD_CAPACITACION' => 'Modalidad  Capacitacion',
            'OBJETIVO_CAPACITACION' => 'Objetivo  Capacitacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDLISTA()
    {
        return $this->hasOne(ListaPlan::className(), ['ID_LISTA' => 'ID_LISTA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDCONSTANCIA()
    {
        return $this->hasOne(Constancia::className(), ['ID_CONSTANCIA' => 'ID_CONSTANCIA']);
    }
}
