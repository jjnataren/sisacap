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
	const TYPE_CERT = 1;
	const TYPE_INVOICE = 2;
	
	
	/**
	 * Getting methods for
	 * @var unknown
	 */
	const MEHOTD_COURSE = 1;
	const MEHOTD_EXAM = 2;
	
	/**
	 * Avaliable statuses of contancias
	 * @var unknown
	 */
	const STATUS_ALREADY = 1;
	const STATUS_CREATED = 2;
	
	
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
	
		return [Constancia::STATUS_ALREADY => 'Editando', Constancia::STATUS_CREATED =>'Emitida'];
	}
	
	
	public function getCurrentStatus(){
	
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
