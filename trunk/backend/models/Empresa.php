<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_empresa".
 *
 * @property integer $ID_EMPRESA
 * @property integer $ID_EMPRESA_PADRE
 * @property integer $ID_REPRESENTANTE_LEGAL
 * @property string $NOMBRE_RAZON_SOCIAL
 * @property string $ALIAS
 * @property string $RFC
 * @property string $NSS
 * @property string $CURP
 * @property integer $MORAL
 * @property string $CALLE
 * @property string $NUMERO_EXTERIOR
 * @property string $NUMERO_INTERIOR
 * @property string $COLONIA
 * @property string $ENTIDAD_FEDERATIVA
 * @property string $LOCALIDAD
 * @property string $TELEFONO
 * @property string $MUNICIPIO_DELEGACION
 * @property integer $GIRO_PRINCIPAL
 * @property string $OTRO_GIRO
 * @property integer $NUMERO_TRABAJADORES
 * @property string $NOMBRE_CONTACTO
 * @property string $NUM_CONTACTO
 * @property integer $CODIGO_POSTAL
 * @property string $DOMICILIO
 * @property string $FAX
 * @property integer $TIPO
 * @property string $CORREO_ELECTRONICO
 * @property string $PICTURE
 * @property string $NOMBRE_CENTRO_TRABAJO
 * @property integer $ESQUEMA_SEGURIDAD_SOCIAL
 * @property string $NOMBRE_COMERCIAL
 * @property integer $ACTIVO
 * @property string $FECHA_INICIO_OPERACIONES
 * @property string $CORREO_ELECTRONICO_EMPRESA
 *
 * @property ComisionEstablecimiento[] $comisionEstablecimientos
 * @property ComisionMixtaCap[] $iDCOMISIONMIXTAs
 * @property ComisionMixtaCap[] $comisionMixtaCaps
 * @property Empresa $iDEMPRESAPADRE
 * @property Empresa[] $empresas
 * @property RepresentanteLegal $iDREPRESENTANTELEGAL
 * @property EmpresaUsuario[] $empresaUsuarios
 * @property User[] $iDUSUARIOs
 * @property Instructor[] $instructors
* @property ListaEstablecimiento[] $listaEstablecimientos
 * @property ListaPlan[] $iDLISTAs
 * @property Plan[] $plans
 * @property PlanEstablecimiento[] $planEstablecimientos
 * @property Plan[] $iDPLANs
 * @property PuestoEmpresa[] $puestoEmpresas
 * @property Trabajador[] $trabajadors
 */
class Empresa extends \yii\db\ActiveRecord
{

	//CONSTANTES PARA SEGURIDAD SOCIAL
	const SGS_IMMS=1;
	const SGS_ISSSTE=2;
	const SGS_PROPIO=3;
	const SGS_NO_CUENTA=4;
	
	public $SGS_TIPOS = [
	
	self::SGS_IMMS => 'IMSS',
	self::SGS_ISSSTE => 'ISSSTE',
	self::SGS_PROPIO => 'PROPIO',
	self::SGS_NO_CUENTA => 'NO CUENTA',
	];
	
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 1;
	public $PICTURES =[];
	
	
	
	
	/**
	 * Returns user statuses list
	 * @param bool $status
	 * @return array|mixed
	 */
	public static function getStatuses($status = false){
		$statuses = [
		self::STATUS_ACTIVE=>Yii::t('common', 'Active'),
		self::STATUS_DELETED=>Yii::t('common', 'Deleted')
		];
		return $status ? ArrayHelper::getValue($statuses, $status) : $statuses;
	}
	
	
	/**
	 *
	 */
	public static function  getNoAdministradas(){
	
		return Empresa::findBySql('select * from tbl_empresa where id_empresa not in (select ID_EMPRESA from
				tbl_empresa_usuario where ACTIVO = 1) and id_empresa_padre is null')->all();
	
	}
	
	/**
	 *
	 */
	public static function  getAdministradas(){
	
		return Empresa::findBySql('select  * from tbl_empresa where id_empresa in (SELECT DISTINCT ID_EMPRESA from tbl_empresa_usuario where ACTIVO = 1)')->all();
	
	}
	
	
	/**
	 *gets  the  total workers of a particular empresa
	 */
	public  function  getTotalWorkers(){
		
	  $rows = Yii::$app->db->createCommand('SELECT COUNT(*)  FROM  tbl_trabajador where id_empresa in ( select id_empresa from tbl_empresa where id_empresa =  ' . $this->ID_EMPRESA .  ' OR id_empresa_padre='.$this->ID_EMPRESA .') AND ACTIVO=1' )->queryScalar();
		
		return $rows;
	
	}
	
	public function scenarios()
	{
		$scenarios = parent::scenarios();
		$scenarios['establecimiento'] = ['RFC','NOMBRE_RAZON_SOCIAL'];
		return $scenarios;
	}
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
         return [
            [['ID_EMPRESA_PADRE', 'ID_REPRESENTANTE_LEGAL', 'MORAL', 'GIRO_PRINCIPAL', 'NUMERO_TRABAJADORES', 'CODIGO_POSTAL', 'TIPO', 'ESQUEMA_SEGURIDAD_SOCIAL', 'ACTIVO'], 'integer'],
            [['FECHA_INICIO_OPERACIONES'], 'safe'],
            [['NOMBRE_RAZON_SOCIAL', 'CALLE', 'COLONIA', 'TELEFONO', 'MUNICIPIO_DELEGACION', 'CORREO_ELECTRONICO','CORREO_ELECTRONICO_EMPRESA'], 'string', 'max' => 300],
            [['ALIAS'], 'string', 'max' => 20],
            [['NSS'],'string', 'max'=>20],
            [['RFC'], 'string', 'max' => 13],
            [['RFC','NOMBRE_RAZON_SOCIAL'],'required','message' =>'El dato es obligatorio'],
            [['CURP'], 'string', 'max' => 18],
            [['NUMERO_EXTERIOR', 'NUMERO_INTERIOR', 'ENTIDAD_FEDERATIVA', 'LOCALIDAD', 'NUM_CONTACTO', 'NOMBRE_CENTRO_TRABAJO', 'NOMBRE_COMERCIAL'], 'string', 'max' => 100],
            [['OTRO_GIRO', 'DOMICILIO'], 'string', 'max' => 200],
            [['NOMBRE_CONTACTO'], 'string', 'max' => 250],
            [['FAX'], 'string', 'max' => 50],
            [['PICTURE'], 'string', 'max' => 2048],
            [['CORREO_ELECTRONICO'], 'email',]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
       return [
            'ID_EMPRESA' => 'Id  Empresa',
            'ID_EMPRESA_PADRE' => 'Id  Empresa  padre',
            'ID_REPRESENTANTE_LEGAL' => 'Representante legal',
            'NOMBRE_RAZON_SOCIAL' => 'Nombre o razón social',
            'ALIAS' => 'Alias',
            'RFC' => 'Registro federal de contribuyentes',
            'NSS' => 'Registro patronal del I.M.S.S',
            'CURP' => 'Clave única de registro de población (CURP)',
            'MORAL' => 'Moral',
            'CALLE' => 'Calle',
            'NUMERO_EXTERIOR' => 'Número exterior',
            'NUMERO_INTERIOR' => 'Número interior',
            'COLONIA' => 'Colonia',
            'ENTIDAD_FEDERATIVA' => 'Entidad federativa',
            'LOCALIDAD' => 'Localidad',
            'TELEFONO' => 'Teléfono',
            'MUNICIPIO_DELEGACION' => 'Municipio/Delegación',
            'GIRO_PRINCIPAL' => 'Giro principal',
            'OTRO_GIRO' => 'Otro  Giro',
            'NUMERO_TRABAJADORES' => 'Número de trabajadores',
            'NOMBRE_CONTACTO' => 'Nombre del contacto',
            'NUM_CONTACTO' => 'Puesto del contacto',
            'CODIGO_POSTAL' => 'Código postal',
            'DOMICILIO' => 'Domicilio',
            'FAX' => 'Fax',
            'TIPO' => 'Tipo',
            'CORREO_ELECTRONICO' => 'Correo electrónico',
            'PICTURE' => 'Picture',
            'NOMBRE_CENTRO_TRABAJO' => 'Nombre del centro de trabajo',
            'ESQUEMA_SEGURIDAD_SOCIAL' => 'Esquema de seguridad social',
            'NOMBRE_COMERCIAL' => 'Nombre Comercial',
            'ACTIVO' => 'Activo',
            'FECHA_INICIO_OPERACIONES' => 'Fecha inicio de operaciones',
            'CORREO_ELECTRONICO_EMPRESA' => 'Correo electrónico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComisionEstablecimientos()
    {
        return $this->hasMany(ComisionEstablecimiento::className(), ['ID_ESTABLECIMIENTO' => 'ID_EMPRESA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDCOMISIONMIXTAs()
    {
        return $this->hasMany(ComisionMixtaCap::className(), ['ID_COMISION_MIXTA' => 'ID_COMISION_MIXTA'])->viaTable('tbl_comision_establecimiento', ['ID_ESTABLECIMIENTO' => 'ID_EMPRESA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComisionMixtaCaps()
    {
        return $this->hasMany(ComisionMixtaCap::className(), ['ID_EMPRESA' => 'ID_EMPRESA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDEMPRESAPADRE()
    {
        return $this->hasOne(Empresa::className(), ['ID_EMPRESA' => 'ID_EMPRESA_PADRE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::className(), ['ID_EMPRESA_PADRE' => 'ID_EMPRESA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDREPRESENTANTELEGAL()
    {
        return $this->hasOne(RepresentanteLegal::className(), ['ID_REPRESENTANTE_LEGAL' => 'ID_REPRESENTANTE_LEGAL']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaUsuarios()
    {
        return $this->hasMany(EmpresaUsuario::className(), ['ID_EMPRESA' => 'ID_EMPRESA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDUSUARIOs()
    {
        return $this->hasMany(User::className(), ['id' => 'ID_USUARIO'])->viaTable('tbl_empresa_usuario', ['ID_EMPRESA' => 'ID_EMPRESA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructors()
    {
        return $this->hasMany(Instructor::className(), ['ID_EMPRESA' => 'ID_EMPRESA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaEstablecimientos()
    {
    	return $this->hasMany(ListaEstablecimiento::className(), ['ID_ESTABLECIMIENTO' => 'ID_EMPRESA']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDLISTAs()
    {
    	return $this->hasMany(ListaPlan::className(), ['ID_LISTA' => 'ID_LISTA'])->viaTable('tbl_lista_establecimiento', ['ID_ESTABLECIMIENTO' => 'ID_EMPRESA']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['ID_EMPRESA' => 'ID_EMPRESA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstablecimientos()
    {
    	return $this->hasMany(PlanEstablecimiento::className(), ['ID_ESTABLECIMIENTO' => 'ID_EMPRESA']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPLANs()
    {
    	return $this->hasMany(Plan::className(), ['ID_PLAN' => 'ID_PLAN'])->viaTable('tbl_plan_establecimiento', ['ID_ESTABLECIMIENTO' => 'ID_EMPRESA']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getPuestoEmpresas()
    {
        return $this->hasMany(PuestoEmpresa::className(), ['ID_EMPRESA' => 'ID_EMPRESA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajadors()
    {
        return $this->hasMany(Trabajador::className(), ['ID_EMPRESA' => 'ID_EMPRESA']);
    }
}
