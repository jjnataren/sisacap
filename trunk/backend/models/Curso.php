<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_curso".
 *
 * @property integer $ID_CURSO
 * @property integer $ID_PLAN
 * @property integer $ID_INSTRUCTOR
 * @property string $NOMBRE
 * @property integer $DURACION_HORAS
 * @property string $FECHA_INICIO
 * @property string $FECHA_TERMINO
 * @property integer $AREA_TEMATICA
 * @property string $MODALIDAD_CAPACITACION
 * @property string $DESCRIPCION
 * @property string $OBJETIVO_CAPACITACION
 * @property integer $ESTATUS
 * @property string $DOCUMENTO_PROBATORIO
 * @property string $NOMBRE_DOCUMENTO_PROBATORIO
 * @property string $FECHA_DOCUMENTO_PROBATORIO
 *
 * @property Constancia[] $constancias
 * @property Instructor $iDINSTRUCTOR
 * @property Plan $iDPLAN
 * @property IndicadorCurso[] $indicadorCursos
 * @property TrabajadorCurso[] $trabajadorCursos
 */
class Curso extends \yii\db\ActiveRecord
{
	public $OTRO_NOMBRE;
	
	const  STATUS_INICIADO = 1;
	const  STATUS_CREADO = 2;  //POR INICIAR
	const  STATUS_CONCLUIDO = 3;
	const  STATUS_CERRADO =4 ;
	
	//$itemsModalidad = [1=>'Presencial',2=>'En linea',3=>'Mixta'];
	
	
	
	const  mod_presencial = 1;
	const  mod_online = 2 ;
	const  mod_mixta = 3;
	
	
	const obj_habilidades = 1;
	const obj_riesgos = 2;
	const obj_productividad = 3;
	const obj_niveEducativo = 4;
	const obj_vacantes = 5;
	
	const CURSO_PERSONALIZADO = 66666;
	
	
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
	
	
	public  static  function statusDescription(){
	
		return [
		0=>'unknow',
		Curso::STATUS_INICIADO =>'Iniciado',
		Curso::STATUS_CREADO =>'Creado',
		Curso::STATUS_CONCLUIDO => 'Concluido',
		Curso::STATUS_CERRADO =>'Cerrado',
	
	
		];
	}
	
	
	
	
	
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_curso';
    }

    
    
    
    /**
     * Own validation
     * @param unknown $attribute
     * @param unknown $params
     *
     * */
    
    
    
    
    public function  validateVigenciaInicioPlan($attribute, $params){
    
    	$v_inicio = new \DateTime($this->$attribute);
    
    	$v_fin = new \DateTime($this->iDPLAN->VIGENCIA_INICIO);
    
    
    	if ($v_inicio < $v_fin){
    		$this->addError($attribute, 'La fecha de inicio del curso debe ser mayor de la fecha de inicio del plan [' .$v_fin->format('d/m/Y') .' ]' );
    
    	}
    
    
    }
    
    
    /**
     * Own validation
     * @param unknown $attribute
     * @param unknown $params
     */
    public function  validateVigenciaFinPlan($attribute, $params){
    
    	$v_inicio = new \DateTime($this->$attribute);
    
    	$v_fin = new \DateTime($this->iDPLAN->VIGENCIA_FIN);
    
    
    	if ($v_inicio > $v_fin){
    		$this->addError($attribute, 'La fecha de fin del curso debe ser  menor a la  fecha de fin del plan  [' .$v_fin->format('d/m/Y') .' ]' );
    
    	}
    
    
    }
    
    
    
    /**
     * Own validation
     * @param unknown $attribute
     * @param unknown $params
     */
    public function  validateVigenciaInic($attribute, $params){
    
    	$v_inicio = new \DateTime($this->$attribute);
    
    	$v_fin = new \DateTime($this->FECHA_TERMINO);
    
    
    	if ($v_inicio > $v_fin){
    		$this->addError($attribute, 'La fecha de  inicio debe ser menor a la fecha fin');
    		$this->addError('FECHA_TERMINO', 'La fecha fin debe ser mayor a la fecha inicio');
    
    	}
    
    
    }
    
    
    /**
     * Own validation
     * @param unknown $attribute
     * @param unknown $params
     */
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
    
   /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        
           [[ 'DURACION_HORAS','NOMBRE','AREA_TEMATICA','MODALIDAD_CAPACITACION','FECHA_INICIO','FECHA_TERMINO'], 'required','message' =>'El dato es requerido'],
        
            [['ID_PLAN','OTRO_NOMBRE', 'ID_INSTRUCTOR', 'ESTATUS', 'DURACION_HORAS', 'AREA_TEMATICA'], 'integer'],
            [['FECHA_INICIO', 'FECHA_TERMINO'], 'safe'],
            [['MODALIDAD_CAPACITACION'], 'required'],
            [['NOMBRE'], 'string', 'max' => 300],

            [['MODALIDAD_CAPACITACION'], 'string', 'max' => 200],
            [['DESCRIPCION'], 'string', 'max' => 1024],
            
            
             [['MODALIDAD_CAPACITACION'], 'string', 'max' => 200],
            
            
            /*own validations*/
            ['FECHA_INICIO', 'validateVigencia','params'=>['max'=>730]],
        	['FECHA_INICIO', 'validateVigenciaInic','params'=>['max'=>0]],
        	['FECHA_INICIO', 'validateVigenciaInicioPlan','params'=>['max'=>0]],
        	['FECHA_TERMINO', 'validateVigenciaFinPlan','params'=>['max'=>0]],
            
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_CURSO' => 'Id de curso',
            'ID_PLAN' => 'Id del plan',
            'ALIAS' => 'Alias',
            'ID_INSTRUCTOR' => 'Id del Instructor',
            'NOMBRE' => 'Nombre',
            'DURACION_HORAS' => 'Duracion  Horas',
            'FECHA_INICIO' => 'Fecha  Inicio',
            'FECHA_TERMINO' => 'Fecha  Termino',
            'AREA_TEMATICA' => 'Area  Tematica',
            'MODALIDAD_CAPACITACION' => 'Modalidad  Capacitacion',
            'DESCRIPCION' => 'Descripcion',
            'OBJETIVO_CAPACITACION' => 'Objetivo  Capacitacion',
            'ESTATUS' => 'Estatus',
            'OTRO_NOMBRE'=>'Cursos predeterminados',
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
    public function getIndicadorCursos()
    {
        return $this->hasMany(IndicadorCurso::className(), ['ID_CURSO' => 'ID_CURSO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajadorCursos()
    {
        return $this->hasMany(TrabajadorCurso::className(), ['ID_CURSO' => 'ID_CURSO']);
    }
    

    /**
     * returns course's current status
     * @return string
     */
    public function  getCurrentStatus(){
    
    	 
    	/*
    	  
    	 
    	 
    	 
    	if ($plan->getCurrentStatus() < Plan::STATUS_VALIDADO && $fechaInfo !== false){
    	 
    	 
    	$modelIndicador = new IndicadorPlan();
    	 
    	$modelIndicador->ACTIVO = 1;
    	 
    	$modelIndicador->FECHA_INICIO_VIGENCIA= $fechaInfo->modify('-5 day')->format('Y-m-d');
    	 
    	$modelIndicador->FECHA_FIN_VIGENCIA = $fechaInfo->modify('+10 day')->format('Y-m-d');*/
    	 
    	 
    	$v_inicio = strtotime($this->FECHA_INICIO);
    	$v_fin = strtotime($this->FECHA_TERMINO);
    	 
    	if (!$v_fin  || !$v_inicio){
    
    		RETURN 0;
    	}
    	 
    	 
    	$fechaFin60Dias = new \DateTime($this->FECHA_TERMINO);
    	$fechaFin60Dias->modify('+60 day');
    	 
    	$currentTime = time();
    	 
    	if ($v_inicio > $currentTime ){
    
    		RETURN self::STATUS_CREADO;
    		 
    	}
    	if ($v_inicio <= $currentTime && $v_fin >= $currentTime ){
    
    		RETURN self::STATUS_INICIADO;
    
    	}elseif($v_fin < $currentTime ){
    
    		return  self::STATUS_CONCLUIDO;
    	}
    	 
    	 
    	return 0;
    }
}
