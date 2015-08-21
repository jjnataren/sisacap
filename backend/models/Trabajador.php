<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_trabajador".
 *
 * @property integer $ID_TRABAJADOR
 * @property integer $ID_EMPRESA
 * @property integer $ROL
 * @property string $NOMBRE
 * @property string $APP
 * @property string $APM
 * @property string $CURP
 * @property string $RFC
 * @property string $NSS
 * @property string $DOMICILIO
 * @property string $CORREO_ELECTRONICO
 * @property string $TELEFONO
 * @property integer $PUESTO
 * @property string $OCUPACION_ESPECIFICA
 * @property string $SEXO
 * @property string $FECHA_AGREGO
 * @property string $LUGAR_RESIDENCIA
 * @property integer $INSTITUCION_EDUCATIVA
 * @property integer $MUNICIPIO_DELEGACION
 * @property integer $ENTIDAD_FEDERATIVA
 * @property string $FECHA_EMISION_CERTIFICADO
 * @property integer $ACTIVO
 * @property integer $GRADO_ESTUDIO
 * @property integer $DOCUMENTO_PROBATORIO
 * @property string $OTRO_OCUPACION
 * @property string $NTCL
 * @property string $SECTOR
 * @property ComisionMixtaCap[] $comisionMixtaCaps
 * @property Constancia[] $constancias
 * @property Empresa $iDEMPRESA
 * @property PuestoEmpresa $pUESTO
 * @property TrabajadorCurso[] $trabajadorCursos
 */
class Trabajador extends \yii\db\ActiveRecord
{
    



	//itemsexo
	const SEX_HOMBRE=2;
	const SEX_MUJER=1;
	
	public $SEX_TIPO =[
	
	self::SEX_HOMBRE=>'HOMBRE',
	self::SEX_MUJER=>'MUJER',
	];
	//item grado
	
	const GRADO_NINGUNO=0;
	const GRADO_PRIMARIA=1;
	const GRADO_SECUNDARIA=2;
	const GRADO_BACHILLERATO=3;
	const GRADO_TECNICA=4;
	const GRADO_LIC=5;
	const GRADO_ESPECIALIDAD=6;
	const GRADO_MAESTRIA=7;
	const GRADO_DOC=8;
	
	public $GRADO_TIPO = [
	
	self::GRADO_NINGUNO=>'NINGUNO',
	self::GRADO_PRIMARIA=>'PRIMARIA',
	self::GRADO_SECUNDARIA=>'SECUNDARIA',
	self::GRADO_BACHILLERATO=>'BACHILLERATO',
	self::GRADO_LIC=>'LICENCIATURA',
	self::GRADO_ESPECIALIDAD=>'ESPECIALIDAD',
	self::GRADO_MAESTRIA=>'MAESTRIA',
	self::GRADO_DOC=>'DOCTORADO',
	
	];
	//item institucion
	const INST_PUBLICA=1;
	const INST_PRIVADA=2;
	
	public $INST_TIPO=[
	
	self::INST_PUBLICA=>'PUBLICA',
	self::INST_PRIVADA=>'PRIVADA',
	];
	//item documetos
	
	const DOC_TITULO=1;
	const DOC_CERTIFICADO=2;
	const DOC_DIPLOMA=3;
	const DOC_OTRO=4;
	
	public $DOC_TIPO = [
	
	self::DOC_TITULO => 'TITULO',
	self::DOC_CERTIFICADO => 'CERTIFICADO',
	self::DOC_DIPLOMA => 'DIPLOMA',
	self::DOC_OTRO => 'OTRO',
	];
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_trabajador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        
        //[['NOMBRE', 'APP','PUESTO' ,'APM','SEXO','CURP','RFC','OCUPACION_ESPECIFICA','MUNICIPIO_DELEGACION', 'ENTIDAD_FEDERATIVA', 'GRADO_ESTUDIO', 'NTCL'], 'required','message' =>'El dato es requerido'],
        
            [['ID_EMPRESA', 'ROL', 'PUESTO', 'INSTITUCION_EDUCATIVA', 'MUNICIPIO_DELEGACION', 'ENTIDAD_FEDERATIVA', 'ACTIVO', 'GRADO_ESTUDIO', 'DOCUMENTO_PROBATORIO'], 'integer'],
            [['FECHA_AGREGO', 'FECHA_EMISION_CERTIFICADO'], 'safe'],
            [['NOMBRE', 'APP', 'APM', 'TELEFONO'], 'string', 'max' => 100],
            [['CURP'], 'string', 'max' => 18],
            [['RFC'], 'string', 'max' => 13],
            [['RFC'], 'unique','message' =>'Ya existe un trabajador con este RFC'],
            [['CORREO_ELECTRONICO'], 'email','message' =>'Formato invalido para este correo electronico'],
            [['NSS'], 'string', 'max' => 20],
            [['DOMICILIO', 'CORREO_ELECTRONICO'], 'string', 'max' => 300],
            [['SEXO'], 'string', 'max' => 1],
            [['SECTOR'], 'string','max'=> 250],
            [['NTCL'], 'string', 'max'=>250],
            [['LUGAR_RESIDENCIA', 'OTRO_OCUPACION'], 'string', 'max' => 200],
            [['RFC'], 'unique'],
            [['NOMBRE', 'RFC'],'required'],
            
        ];
    }

    /**
     * @inheritdoc
     */
 
 public function attributeLabels()
    {
        return [
            'ID_TRABAJADOR' => 'Id  Trabajador',
            'ID_EMPRESA' => 'Id  Empresa',
            'ROL' => 'Rol',
            'NOMBRE' => 'Nombre (s)',
            'APP' => 'Apellido paterno',
            'APM' => 'Apellido materno',
            'CURP' => 'Clave única de registro de población (CURP) ',
            'RFC' => 'Registro federal de contribuyentes (RFC)',
            'NSS' => 'Número de seguridad social (NSS)',
            'DOMICILIO' => 'Domicilio',
            'CORREO_ELECTRONICO' => 'Correo  electrónico',
            'TELEFONO' => 'Teléfono(incluyendo LADA)',
            'PUESTO' => 'Puesto',
            'OCUPACION_ESPECIFICA' => 'Ocupación especifica',
            'SEXO' => 'Sexo',
            'FECHA_AGREGO' => 'Fecha  Agrego',
            'LUGAR_RESIDENCIA' => 'Lugar de residencia',
            'INSTITUCION_EDUCATIVA' => 'Institución  educativa',
            'MUNICIPIO_DELEGACION' => 'Municipio o delegación',
            'ENTIDAD_FEDERATIVA' => 'Entidad  federativa',
            'FECHA_EMISION_CERTIFICADO' => 'Fecha de emisión de certificado',
            'ACTIVO' => 'Activo',
            'GRADO_ESTUDIO' => 'Nivel máximo de estudios terminados',
            'DOCUMENTO_PROBATORIO' => 'Documento  probatorio',
            'OTRO_OCUPACION'=>'Otro',
            'NTCL'=>'Norma tecnica de competencia laboral'		
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComisionMixtaCaps()
    {
        return $this->hasMany(ComisionMixtaCap::className(), ['ID_REPRESENTANTE_TRABAJADORES' => 'ID_TRABAJADOR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConstancias()
    {
        return $this->hasMany(Constancia::className(), ['ID_TRABAJADOR' => 'ID_TRABAJADOR']);
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
    public function getPUESTO()
    {
        return $this->hasOne(PuestoEmpresa::className(), ['ID_PUESTO' => 'PUESTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajadorCursos()
    {
        return $this->hasMany(TrabajadorCurso::className(), ['ID_TRABAJADOR' => 'ID_TRABAJADOR']);
    }
}
