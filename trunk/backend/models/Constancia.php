<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_constancia".
 *
 * @property integer $ID_CONSTANCIA
 * @property integer $ID_EMPRESA
 * @property integer $ID_CURSO
 * @property integer $ID_PLAN
 * @property integer $ID_TRABAJADOR
 * @property string $NOMBRE_NORMA
 * @property string $FECHA_EMISION_CERTIFICADO
 * @property string $FECHA_AGREGO
 * @property string $FECHA_INFORME
 * @property string $LUGAR_INFORME
 * @property integer $TIPO_CONSTANCIA
 * @property integer $METODO_OBTENCION
 * @property integer $ACTIVO
 * @property string $FECHA_CREACION
 * @property integer $ESTATUS
 * @property string $DOCUMENTO_PROBATORIO
 * @property string $NOMBRE_DOC_PROB
 * @property integer $PROMEDIO
 * @property integer $APROBADO
 * @property string $ULTIMA_MODIFICACION
 * 
 * @property string $COMENTARIO
 
 * @property Curso $iDCURSO
 * @property Trabajador $iDTRABAJADOR
 * @property IndicadorConstancia[] $indicadorConstancias
 * @property ListaConstancia[] $listaConstancias
 * @property ListaPlan[] $iDLISTAs
 */
class Constancia extends \yii\db\ActiveRecord
{
   
	/**
	 * Constancia's type
	 * @var unknown
	 */
	
	const TYPE_APROBADO=1;
	CONST TYPE_NO_APORBADO=2;
	
	public $TYPE_APROB=[
	self::TYPE_APROBADO=>'Aprobado',
	self::TYPE_NO_APORBADO=>'Reprobado'
	
	];
	const TYPE_CERT = 1;
	const TYPE_INVOICE = 2;
	
	
	public $TIPE_CONST=[
	
	self::TYPE_CERT=>'Certificada',
	self::TYPE_INVOICE=>'Comprobante',
	
	];
	/**
	 * Getting methods for
	 * @var unknown
	 */
	const MEHOTD_COURSE = 1;
	const MEHOTD_EXAM = 2;
	
	public $MET_OBTEN = [
	
	self::MEHOTD_COURSE => 'Curso',
	self::MEHOTD_EXAM => 'Examen suficiencia',
	
	];
	
	/**
	 * Avaliable statuses of contancias
	 * @var unknown
	 */
	const STATUS_CREATED =1;
	const STATUS_ALREADY = 2;
	const STATUS_ASIGNADA =3;
	const STATUS_SIGNED_INSTRUCTOR=4;
	const STATUS_SIGNED_REPRESENTATIVE=5;	
	const STATUS_DELIVERED= 6;
	const STATUS_REJECTED=7;
	const STATUS_RECHAZADA_MANAGER=8;
	const STATUS_ENVIADA=9;
	const STATUS_RECIBIDA=10;	
	const STATUS_RECEIVED_WORKER=11;
	
	
	/**
	 *
	 * @return multitype:string
	 */
	public static function getAllMetodosType(){
	
		return [Constancia::MEHOTD_COURSE => 'Curso', Constancia::MEHOTD_EXAM =>'Examen suficiencia'];
	}
	
	
	public static function getAllContanciasType(){
	
		return [Constancia::TYPE_CERT => 'Certificada', Constancia::TYPE_INVOICE =>'Comprobante'];
	}
	
	
	
	public static function getAllEstatusType(){
	
		return [Constancia::STATUS_ALREADY => 'Editando',
				Constancia::STATUS_ASIGNADA =>'Asignada a instructor',
				Constancia::STATUS_SIGNED_INSTRUCTOR =>'Firmada por  instructor',
				Constancia::STATUS_SIGNED_REPRESENTATIVE =>'Firmada por  representante legal',
				Constancia::STATUS_DELIVERED =>'Enviada al trabajador',
				Constancia::STATUS_REJECTED =>'Rechazada por instructor',						
				Constancia::STATUS_RECHAZADA_MANAGER =>'Rechazada por manager',
				constancia::STATUS_RECEIVED_WORKER=>'Recibida por trabajador'
		];
	}
	
	
	public static function getAllEstatusTypeInstructor(){
	
		return [Constancia::STATUS_ASIGNADA =>'Asignada a instructor',
		Constancia::STATUS_REJECTED =>'Rechazada instructor',
		Constancia::STATUS_SIGNED_INSTRUCTOR =>'Firma instructor',
		constancia::STATUS_ENVIADA =>'Enviada E-mail',
		constancia::STATUS_RECIBIDA =>'Visto',
	
				];
	}
	
	
	public static function getAvaliableStatusByRol($currentStatus, $rol){
	
		$avaliableStatuses = [];
		
		
	switch ($rol){
		
	
	CASE 5:	//manager
		
		switch ($currentStatus){
			
			case self::STATUS_ALREADY:
				
				$avaliableStatuses = 	[Constancia::STATUS_ASIGNADA =>'Asignada a instructor',
				Constancia::STATUS_ALREADY =>'Editando',
				];
				
				
			break;

			case self::STATUS_ASIGNADA:
			
				$avaliableStatuses = 	[Constancia::STATUS_ASIGNADA =>'Asignada a instructor',
				
				];
			
				break;


				case self::STATUS_SIGNED_INSTRUCTOR:
						
					$avaliableStatuses = 	[Constancia::STATUS_RECHAZADA_MANAGER =>'Rechazada por manager',
					Constancia::STATUS_SIGNED_INSTRUCTOR =>'Firmada por  instructor',
					Constancia::STATUS_SIGNED_REPRESENTATIVE =>'Firmada por  representante',
					];
						
				break;
				case self::STATUS_SIGNED_REPRESENTATIVE:
				
					$avaliableStatuses = 	[
					
					Constancia::STATUS_SIGNED_REPRESENTATIVE =>'Firmada por  representante',
					
						
					Constancia::STATUS_DELIVERED =>'Enviada',
					];
				
					break;
					case self::STATUS_DELIVERED:
					
						$avaliableStatuses = 	[
						
						Constancia::STATUS_DELIVERED =>'Enviada',
						];
					
						break;
			
				
				case self::STATUS_RECHAZADA_MANAGER:
				
					$avaliableStatuses = 	[Constancia::STATUS_RECHAZADA_MANAGER =>'Rechazada por manager',
					
					
					];
				
					break;
					
					case self::STATUS_REJECTED:
					
						$avaliableStatuses = 	[Constancia::STATUS_RECHAZADA_MANAGER =>'Rechazada por manager',
						Constancia::STATUS_ASIGNADA =>'Asignada',
						Constancia::STATUS_REJECTED =>'Rechazada instructor',
						];
					
						break;
					case self::STATUS_RECEIVED_WORKER:
						$avaliableStatuses=[Constancia::STATUS_RECEIVED_WORKER=> 'Recibida por trabajador',
						Constancia::STATUS_RECEIVED_WORKER =>'Recibida por trabajador',
						Constancia::STATUS_DELIVERED =>'Enviada',
						];	
				
			default:
			break;	
			
			
		}

		break;
		
	CASE 7:

		switch ($currentStatus){
				
			case self::STATUS_ASIGNADA:
		
				$avaliableStatuses = 	[Constancia::STATUS_ASIGNADA =>'Asignada a instructor',
				Constancia::STATUS_REJECTED =>'Rechazada por instructor',
				Constancia::STATUS_SIGNED_INSTRUCTOR =>'Firmada por instructor',
				];
		
		
				break;
		
			case self::STATUS_REJECTED:
					
				$avaliableStatuses = 	[Constancia::STATUS_REJECTED =>'Rechazada por instructor',
				];
					
				break;
		
		
			case self::STATUS_SIGNED_INSTRUCTOR:
		
				$avaliableStatuses = 	[
				Constancia::STATUS_SIGNED_INSTRUCTOR =>'Firmada por  instructor',
				];
		
				break;
			
				case self::STATUS_RECHAZADA_MANAGER:
				
					$avaliableStatuses = 	[
					Constancia::STATUS_REJECTED =>'Rechazada por instructor',
					Constancia::STATUS_RECHAZADA_MANAGER =>'Rechazada por manager',
					Constancia::STATUS_SIGNED_INSTRUCTOR =>'Firmada instructor',
					];
				
				
					break;
		
			default:
				break;
					
		}
		
	break;	
		
		
		
			default:
			break;	
	}
		
		return $avaliableStatuses;
		
		
		
	}
	
	
	
	public function getCurrentStatus(){
	
		return  isset(Constancia::getAllEstatusType()[$this->ESTATUS])?Constancia::getAllEstatusType()[$this->ESTATUS] : 'no establecido';
	
	}
	
	public function getCurrentStatusInstructor(){
	
		return  isset(Constancia::getAllEstatusType()[$this->ESTATUS])?Constancia::getAllEstatusType()[$this->ESTATUS] : 'no establecido';
	
	}
	
	
	
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_constancia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EMPRESA', 'ID_CURSO', 'ID_PLAN', 'ID_TRABAJADOR', 'TIPO_CONSTANCIA', 'METODO_OBTENCION', 'ACTIVO', 'ESTATUS', 'PROMEDIO', 'APROBADO'], 'integer'],
            [['FECHA_EMISION_CERTIFICADO', 'FECHA_AGREGO', 'FECHA_INFORME', 'FECHA_CREACION', 'ULTIMA_MODIFICACION'], 'safe'],
            [['NOMBRE_NORMA', 'NOMBRE_DOC_PROB'], 'string', 'max' => 300],
            [['LUGAR_INFORME'], 'string', 'max' => 200],
            [['COMENTARIO'], 'string', 'max' => 1024],
            [['DOCUMENTO_PROBATORIO'], 'string', 'max' => 2048]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_CONSTANCIA' => 'Id  Constancia',
            'ID_EMPRESA' => 'Id  Empresa',
            'ID_CURSO' => 'Id  Curso',
            'ID_PLAN' => 'Id  Plan',
            'ID_TRABAJADOR' => 'Id  Trabajador',
            'NOMBRE_NORMA' => 'Nombre  Norma',
            'FECHA_EMISION_CERTIFICADO' => 'Fecha  emisión  certificado',
            'FECHA_AGREGO' => 'Fecha  Agrego',
            'FECHA_INFORME' => 'Fecha  informe',
            'LUGAR_INFORME' => 'Lugar  informe',
            'TIPO_CONSTANCIA' => 'Tipo  Constancia',
            'METODO_OBTENCION' => 'Metodo  Obtención',
            'ACTIVO' => 'Activo',
            'FECHA_CREACION' => 'Fecha  Creación',
            'ESTATUS' => 'Estatus',
            'DOCUMENTO_PROBATORIO' => 'Documento  Probatorio',
            'NOMBRE_DOC_PROB' => 'Nombre documento probatorio',
            'PROMEDIO' => 'Promedio',
            'APROBADO' => 'Aprobado',
            'ULTIMA_MODIFICACION' => 'Última  Modificación',
            'COMENTARIO'=>'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDCURSO()
    {
        return $this->hasOne(Curso::className(), ['ID_CURSO' => 'ID_CURSO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDTRABAJADOR()
    {
        return $this->hasOne(Trabajador::className(), ['ID_TRABAJADOR' => 'ID_TRABAJADOR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadorConstancias()
    {
        return $this->hasMany(IndicadorConstancia::className(), ['ID_CONSTANCIA' => 'ID_CONSTANCIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaConstancias()
    {
        return $this->hasMany(ListaConstancia::className(), ['ID_CONSTANCIA' => 'ID_CONSTANCIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDLISTAs()
    {
        return $this->hasMany(ListaPlan::className(), ['ID_LISTA' => 'ID_LISTA'])->viaTable('tbl_lista_constancia', ['ID_CONSTANCIA' => 'ID_CONSTANCIA']);
    }
}
