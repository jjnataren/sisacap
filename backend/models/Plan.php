<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_plan".
 *
 * @property integer $ID_PLAN
 * @property integer $ID_COMISION
 * @property string $ALIAS
 * @property integer $TOTAL_HOMBRES
 * @property integer $TOTAL_MUJERES
 * @property string $VIGENCIA_INICIO
 * @property string $VIGENCIA_FIN
 * @property integer $NUMERO_ETAPAS
 * @property integer $NUMERO_CONSTANCIAS_EXPEDIDAS
 * @property integer $ESTATUS
 * @property integer $MODALIDAD_CAPACITACION
 * @property integer $ACTIVO
 * @property integer $MODALIDAD
 * @property integer $OBJETIVO1
 * @property integer $OBJETIVO2
 * @property integer $OBJETIVO3
 * @property integer $OBJETIVO4
 * @property integer $OBJETIVO5
 * @property integer $ID_EMPRESA
 * @property string $FECHA_CONSTITUCION
 * @property string $FECHA_AGREGO
 * @property string $DOCUMENTO_APROBATORIO
 * @property string $NOMBRE_DOC_APROBATORIO
 * @property string $DESCRIPCION_PLAN
 * @property integer $TIPO_PLAN
 * @property string  $LUGAR_INFORME
 * 
 * @property string $FECHA_INFO
 *
 * @property Curso[] $cursos
 * @property IndicadorPlan[] $indicadorPlans
 * @property ListaPlan[] $listaPlans
 * @property Empresa $iDEMPRESA
 * @property ComisionMixtaCap $iDCOMISION
 * @property PlanEstablecimiento[] $planEstablecimientos
 * @property ComisionEstablecimiento[] $iDESTABLECIMIENTOs
 * @property PlanPuesto[] $planPuestos
 * @property PuestoEmpresa[] $iDPUESTOs
 * @property TrabajadorCurso[] $trabajadorCursos
 * 

 * */
class Plan extends \yii\db\ActiveRecord
{
    

	const STATUS_CREADO = 1;
	const STATUS_INICIADO=2;
	const STATUS_VALIDADO=3;
	const STATUS_CONCLUIDO=4;
	const STATUS_ALMACENADO=5;
	const STATUS_BORRADO =6;
	const STATUS_CANCELADO=7;
	
	public $statusDescription = [ Plan::STATUS_CREADO=>'Editando', Plan::STATUS_VALIDADO=>'Constituido', Plan::STATUS_CONCLUIDO=>'Terminado'];
	
	/**
	 * avaliable own validations
	 */
	
	public function validateVigencia($attribute, $params){
	
		$tmp_inicio = new \DateTime($this->$attribute);
	
		$tmp_fin = new \DateTime($this->VIGENCIA_FIN);
	
		$days_of_dif = date_diff($tmp_inicio, $tmp_fin);
			
		$total_days = $days_of_dif->format('%a');
			
		$total_days = intval($total_days);
	
		$max_days = intval(isset($params['max']) ? $params['max'] : '0');
	
		if ($total_days > $max_days){
			$this->addError($attribute, 'La vigencia debe ser hasta  dos años');
			$this->addError('VIGENCIA_FIN', 'La vigencia debe ser hasta dos años');
	
		}
	  
	}
	
	public function  validateVigenciaInic($attribute, $params){
	
		$v_inicio = new \DateTime($this->$attribute);
	
		$v_fin = new \DateTime($this->VIGENCIA_FIN);
	
	
		if ($v_inicio > $v_fin){
			$this->addError($attribute, 'La vigencia inicio debe ser menor a la vigencia fin');
			$this->addError('VIGENCIA_FIN', 'La vigencia fin debe ser mayor a la fecha de vigencia de inicio');
	
		}
	
	
	}
	
	
	/*
	 * avaliable validation date	 */

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
       		[['TOTAL_HOMBRES','ALIAS','LUGAR_INFORME', 'VIGENCIA_INICIO', 'VIGENCIA_FIN','FECHA_INFO','TOTAL_MUJERES', 'NUMERO_ETAPAS', 'MODALIDAD_CAPACITACION', 'OBJETIVO1', 'OBJETIVO2', 'OBJETIVO3', 'OBJETIVO4', 'OBJETIVO5', 'ID_EMPRESA', 'TIPO_PLAN'], 'required','message' =>'El dato es obligatorio'],
            [['ID_COMISION', 'TOTAL_HOMBRES', 'TOTAL_MUJERES', 'NUMERO_ETAPAS', 'NUMERO_CONSTANCIAS_EXPEDIDAS', 'ESTATUS', 'MODALIDAD_CAPACITACION', 'ACTIVO', 'MODALIDAD', 'OBJETIVO1', 'OBJETIVO2', 'OBJETIVO3', 'OBJETIVO4', 'OBJETIVO5', 'ID_EMPRESA', 'TIPO_PLAN'], 'integer'],
            [['VIGENCIA_INICIO', 'VIGENCIA_FIN', 'FECHA_CONSTITUCION', 'FECHA_AGREGO', 'FECHA_INFO'], 'safe'],
            [['ALIAS'], 'string', 'max' => 50],
            [['DOCUMENTO_APROBATORIO'], 'string', 'max' => 2048],
            [['NOMBRE_DOC_APROBATORIO'], 'string', 'max' => 300],
            [['LUGAR_INFORME'], 'string', 'max' => 300],
            [['DESCRIPCION_PLAN'], 'string', 'max' => 200],
        		
            /*own validations*/
            ['VIGENCIA_INICIO', 'validateVigencia','params'=>['max'=>730]],             
            ['VIGENCIA_INICIO', 'validateVigenciaInic','params'=>['max'=>0]],
             
        ];
    }

 /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PLAN' => 'Id plan',
            'ID_COMISION' => 'Id comisión',
            'ALIAS' => 'Alias',
            'TOTAL_HOMBRES' => 'Total trabajadores hombres',
            'TOTAL_MUJERES' => 'Total trabajadores mujeres',
            'VIGENCIA_INICIO' => 'Vigencia inicio',
            'VIGENCIA_FIN' => 'Vigencia fin',
            'NUMERO_ETAPAS' => 'Numero etapas',
            'NUMERO_CONSTANCIAS_EXPEDIDAS' => 'Numero constancias expedidas',
            'ESTATUS' => 'Estatus',
            'MODALIDAD_CAPACITACION' => 'Modalidad de capacitación',
            'ACTIVO' => 'Activo',
            'MODALIDAD' => 'Modalidad',
            'OBJETIVO1' => 'Objetivo1',
            'OBJETIVO2' => 'Objetivo2',
            'OBJETIVO3' => 'Objetivo3',
            'OBJETIVO4' => 'Objetivo4',
            'OBJETIVO5' => 'Objetivo5',
            'ID_EMPRESA' => 'Id empresa',
            'FECHA_CONSTITUCION' => 'Fecha constitución',
            'FECHA_AGREGO' => 'Fecha agrego',
            'DOCUMENTO_APROBATORIO' => 'Documento probatorio',
            'NOMBRE_DOC_APROBATORIO' => 'Nombre documento probatorio',
            'DESCRIPCION_PLAN' => 'Descripción del plan',
            'TIPO_PLAN' => 'Incluir todos los puestos de trabajo',
            'FECHA_INFO' => 'Fecha elaboración del informe',
            'LUGAR_INFORME' => 'Lugar elaboración del informe ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['ID_PLAN' => 'ID_PLAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadorPlans()
    {
        return $this->hasMany(IndicadorPlan::className(), ['ID_PLAN' => 'ID_PLAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaPlans()
    {
        return $this->hasMany(ListaPlan::className(), ['ID_PLAN' => 'ID_PLAN']);
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
    public function getIDCOMISION()
    {
        return $this->hasOne(ComisionMixtaCap::className(), ['ID_COMISION_MIXTA' => 'ID_COMISION']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstablecimientos()
    {
        return $this->hasMany(Empresa::className(), ['ID_EMPRESA' => 'ID_ESTABLECIMIENTO'])->viaTable('tbl_plan_establecimiento', ['ID_PLAN' => 'ID_PLAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTABLECIMIENTOs()
    {
        return $this->hasMany(ComisionEstablecimiento::className(), ['ID_ESTABLECIMIENTO' => 'ID_ESTABLECIMIENTO'])->viaTable('tbl_plan_establecimiento', ['ID_PLAN' => 'ID_PLAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanPuestos()
    {
        return $this->hasMany(PlanPuesto::className(), ['ID_PLAN' => 'ID_PLAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPUESTOs()
    {
        return $this->hasMany(PuestoEmpresa::className(), ['ID_PUESTO' => 'ID_PUESTO'])->viaTable('tbl_plan_puesto', ['ID_PLAN' => 'ID_PLAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajadorCursos()
    {
        return $this->hasMany(TrabajadorCurso::className(), ['ID_PLAN' => 'ID_PLAN']);
    }
    
   
    /**
     * returns  plan's status of particular model
     */
    public function  getCurrentStatus(){
    
    
    	if(! $this->isVigente())
    		return Plan::STATUS_CONCLUIDO;
    
    
    	if ($this->DOCUMENTO_APROBATORIO === null) return Plan::STATUS_CREADO;
    	else return Plan::STATUS_VALIDADO;
    
    }
    
    
    
    /**
     * returns  plan's status of particular model
     */
    public function  getStatus(){
    
    	 
    	if(! $this->isVigente())
    		return $this->statusDescription[Plan::STATUS_CONCLUIDO];
    	 
    	 
    	if ($this->DOCUMENTO_APROBATORIO === null) return $this->statusDescription[Plan::STATUS_CREADO];
    	else return $this->statusDescription[Plan::STATUS_VALIDADO];
    
    }
     
    
    
    /**
     *	Checks if  a particular plan is avaliable
     * @return boolean
     */
    public function  isVigente(){
    		
    
    	return  ( $this->VIGENCIA_FIN !== null &&  strtotime($this->VIGENCIA_FIN) > time() );
    	 
    	 
    	//if($this->$total_days > $max_days  ) return  $this-> validateVigencia[Plan::STATUS_CONCLUIDO];
    }
}
