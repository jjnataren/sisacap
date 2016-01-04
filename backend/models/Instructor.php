<?php

namespace backend\models;

use Yii;
use yii\base\Object;
use backend\models\UserForm;
use common\models\User;
use kartik\password\StrengthValidator;

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
 * @property string $NOMBRE_DOC_PROB
 *
 * @property Curso[] $cursos
 * @property Empresa $iDEMPRESA
 * @property User $iDUSUARIO
 * 
 */
class Instructor extends \yii\db\ActiveRecord
{
	
	/**Aux variables  to get form data value*/
	public $username;
	public $email;
	public $user_form_status;
	public $user_form_password;
	

	
	/**
	 * Tipos de instructores
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
    			[['ID_EMPRESA', 'LOGOTIPO', 'NUM_REGISTRO_AGENTE_EXTERNO', 'TIPO_INSTRUCTOR', 'ACTIVO', 'ID_USUARIO'], 'integer'],
    			[['user_form_status'], 'integer'],
    			[['SIGN_CREATED_AT'], 'safe'],
    			[['NOMBRE_AGENTE_EXTERNO', 'NOMBRE', 'APP', 'APM', 'TELEFONO', 'SIGN_PIC_EXTENSION'], 'string', 'max' => 100],
    			[['DOMICILIO', 'CORREO_ELECTRONICO'], 'string', 'max' => 300],
    			//[['email'], 'email'],
    			[[ 'NOMBRE'], 'required'],
    			[['RFC'], 'string', 'max' => 13],
    			//[['username', 'user_form_password','email', 'NOMBRE'], 'required'],
    			//[['user_form_password'], StrengthValidator::className(), 'preset'=>'normal', 'userAttribute'=>'username'],
    			[['SIGN_PIC', 'SIGN_PASSWD'], 'string', 'max' => 2048],
    			//['username', 'unique', 'targetClass'=>'\common\models\User'],
    			//['email', 'unique', 'targetClass'=> '\common\models\User'],
    			 
    			
    	];
    }
    
    /**
     * (non-PHPdoc)
     * @see \yii\base\Model::scenarios()
     */
    public function scenarios()   {
    	$scenarios = parent::scenarios();
    	$scenarios['nouserchange'] = ['NOMBRE'];//Scenario Values Only Accepted
    	return $scenarios;
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
    	return [
    			'ID_INSTRUCTOR' => 'Id instructor',
    			'ID_EMPRESA' => 'Id  Empresa',
    			'NOMBRE_AGENTE_EXTERNO' => 'Nombre de la empresa capacitadora',
    			'NOMBRE' => 'Nombre',
    			'APP' => 'Apellido paterno',
    			'APM' => 'Apellido materno',
    			'DOMICILIO' => 'Domicilio',
    			'TELEFONO' => 'Teléfono',
    			'CORREO_ELECTRONICO' => 'Correo electrónico',
    			'LOGOTIPO' => 'Logotipo',
    			'NUM_REGISTRO_AGENTE_EXTERNO' => 'Número de registro del agente  externo',
    			'TIPO_INSTRUCTOR' => 'Tipo de instructor',
    			'COMENTARIOS' => 'Comentarios',
    			'ACTIVO' => 'Activo',
    			'RFC'=> 'RFC',
    			'SIGN_PICTURE' => 'Imagen firma',
    			'SIGN_PASSWD' => 'Constraseña encriptación',
    			'SIGN_KEY' => 'Sign  Key',
    			'username'=>'Nombre  de usuario',
    			'user_form_password' => 'Contraseña',
    			'user_form_status' => 'Activo',
    			'email' => 'Correo electrónico'
    			
    			
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
    /**
     * Get instance of Instructor
     * @throws NotFoundHttpException
     */
    public static function getOwnData() {
    
    	$empresaModel = EmpresaUsuario::getMyCompany();
    
    	$model = Instructor::findOne(['ID_USUARIO'=>Yii::$app->user->id, 'ID_EMPRESA'=>$empresaModel->ID_EMPRESA]);
    
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    
    	return $model;
    }
    /**
     * Gets  singning image binary base64
     */
    public function getSigningBinary(){
    
    	/*
    	 * into a reproducable iv/key pair
    	 */
    
    	$image64Data = null;
    
    
    	if($this->SIGN_PIC !== null){
    
    		 
    		$passphrase  =  $this->SIGN_PASSWD;
    		 
    		$iv = substr(md5('iv'.$passphrase, true), 0, 8);
    		$key = substr(md5('pass1'.$passphrase, true) .
    				md5('pass2'.$passphrase, true), 0, 24);
    		$opts = array('iv'=>$iv, 'key'=>$key);
    		 
    		$fp = fopen($this->SIGN_PIC, 'r');
    		stream_filter_append($fp, 'mdecrypt.tripledes', STREAM_FILTER_READ, $opts);
    		$data = rtrim(stream_get_contents($fp));
    		fclose($fp);
    		 
    		$image64Data =  $data;
    		 
    	}
    
    	return base64_encode($image64Data);
    
    }
}

