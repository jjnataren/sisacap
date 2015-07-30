<?php

namespace backend\models;

use Yii;
use Codeception\Lib\Console\Message;

/**
 * This is the model class for table "tbl_curso".
 *
 * @property integer $ID_CURSO
 * @property integer $ID_PLAN
 * @property integer $ID_INSTRUCTOR
 * @property string $NOMBRE
 * @property integer $ESTATUS
 * @property integer $DURACION_HORAS
 * @property string $FECHA_INICIO
 * @property string $FECHA_TERMINO
 * @property integer $AREA_TEMATICA
 * @property string $MODALIDAD_CAPACITACION
 * @property string $DESCRIPCION
 * @property string $OBJETIVO_CAPACITACION
 *
 * @property Constancia[] $constancias
 * @property Instructor $iDINSTRUCTOR
 * @property Plan $iDPLAN
 * @property TrabajadorCurso[] $trabajadorCursos
 */
class Curso extends \yii\db\ActiveRecord
{

	const  ESTATUS_INICIADO = 1;
	const  ESTATUS_CREADO = 2;
	const  ESTATUS_CONCLUIDO = 3;
	
	//$itemsModalidad = [1=>'Presencial',2=>'En linea',3=>'Mixta'];

	public function validateVigencia($attribute, $params){
	
		$tmp_inicio = new \DateTime($this->$attribute);
	
		$tmp_fin = new \DateTime($this->FECHA_TERMINO);
	
		$days_of_dif = date_diff($tmp_inicio, $tmp_fin);
			
		$total_days = $days_of_dif->format('%a');
			
		$total_days = intval($total_days);
	
		$max_days = intval(isset($params['max']) ? $params['max'] : '0');
	
		if ($total_days > $max_days){
			$this->addError($attribute, 'La vigencia debe ser hasta  dos años');
			$this->addError('FECHA_TERMINO', 'La vigencia debe ser hasta dos años');
				
		}
	
	}	
	
    const  mod_presencial = 1;
    const  mod_online = 2 ;
    const  mod_mixta = 3;
    
    
    const obj_habilidades = 1;
    const obj_riesgos = 2;
    const obj_productividad = 3;
    const obj_niveEducativo = 4;
    const obj_vacantes = 5;
    
    
     
    public static function  getModalidad(){
    	return [Curso::mod_presencial=>'Presencial',
	 self:: mod_online=> 'En linea',
	 self::mod_mixta=>'Mixta',
	 
    ];
    
    }
    

  public static function  getObjetivos(){
  	
  	return [Curso::obj_habilidades=>'Actualizar y perfeccionar conocimientos y habilidades y proporcionar información de nuevas tecnologías',
  	self::obj_riesgos=>'Prevenir riesgos de trabajo',
  	self::obj_productividad=>'Incrementar la productividad',
  	self::obj_niveEducativo=>'Nivel educativo',
  	self::obj_vacantes=>'Preparar para ocupar vacantes o puestos de nueva creación',
  	];
   }
    
   
   
   /*

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        
           [[ 'DURACION_HORAS','NOMBRE','AREA_TEMATICA','MODALIDAD_CAPACITACION','OBJETIVO_CAPACITACION','FECHA_INICIO','FECHA_TERMINO'], 'required','message' =>'El dato es requerido'],
        
            [['ID_PLAN', 'ID_INSTRUCTOR', 'ESTATUS', 'DURACION_HORAS', 'AREA_TEMATICA'], 'integer'],
            [['FECHA_INICIO', 'FECHA_TERMINO'], 'safe'],
            [['MODALIDAD_CAPACITACION'], 'required'],
            [['NOMBRE'], 'string', 'max' => 300],

            [['OBJETIVO_CAPACITACION', 'MODALIDAD_CAPACITACION', 'DESCRIPCION'], 'string', 'max' => 200],
            
             [['MODALIDAD_CAPACITACION', 'DESCRIPCION'], 'string', 'max' => 200],
            [['OBJETIVO_CAPACITACION'], 'string', 'max' => 45],
            
            /*own validations*/
            ['FECHA_INICIO', 'validateVigencia','params'=>['max'=>730]],
            
            
            /*own validations*/
             
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_CURSO' => 'Id  Curso',
            'ID_PLAN' => 'Id  Plan',
            'ID_INSTRUCTOR' => 'Id  Instructor',
            'NOMBRE' => 'Nombre',
            'ESTATUS' => 'Estatus',
            'DURACION_HORAS' => 'Duración  Horas',
            'FECHA_INICIO' => 'Fecha  Inicio',
            'FECHA_TERMINO' => 'Fecha  Termino',
            'AREA_TEMATICA' => 'Área  Temática',
            'MODALIDAD_CAPACITACION' => 'Modalidad  Capacitación',
            'DESCRIPCION' => 'Descripción',
            'OBJETIVO_CAPACITACION' => 'Objetivo  Capacitación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConstancias()
    {
        return $this->hasMany(Constancia::className(), ['ID_CURSO' => 'ID_CURSO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDINSTRUCTOR()
    {
        return $this->hasOne(Instructor::className(), ['ID_INSTRUCTOR' => 'ID_INSTRUCTOR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPLAN()
    {
        return $this->hasOne(Plan::className(), ['ID_PLAN' => 'ID_PLAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajadorCursos()
    {
        return $this->hasMany(TrabajadorCurso::className(), ['ID_CURSO' => 'ID_CURSO']);
    }
}
