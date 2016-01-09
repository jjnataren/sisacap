<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_representante_legal".
 *
 * @property integer $ID_REPRESENTANTE_LEGAL
 * @property string $NOMBRE
 * @property string $APP
 * @property string $APM
 * @property string $FEC_NAC
 * @property string $CURP
 * @property string $RFC
 * @property string $DOMICILIO
 * @property string $TELEFONO
 * @property string $CORREO_ELECTRONICO
 * @property integer $ACTIVO
 * @property string $NSS
 * @property string $SIGN_PICTURE
 * @property string $SIGN_PASSWD
 * @property string $SIGN_KEY
 * @property string $SIGN_CREATED
 * @property string $SIGN_EXTENSION
 *
 * @property Empresa[] $empresas
 */
class RepresentanteLegal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_representante_legal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FEC_NAC'], 'safe'],
            [['ACTIVO'], 'integer'],
            [['NOMBRE', 'APP', 'APM', 'TELEFONO'], 'string', 'max' => 100],
            [['CURP'], 'string', 'max' => 18],
            [['RFC'], 'string', 'max' => 13],
            [['DOMICILIO', 'CORREO_ELECTRONICO'], 'string', 'max' => 300],
            [['NSS'], 'string', 'max' => 20],
            [['CORREO_ELECTRONICO'], 'email',],
            [['SIGN_PICTURE'], 'string', 'max' => 2048],
            [['SIGN_PASSWD', 'SIGN_KEY'], 'string', 'max' => 1024],
            [['SIGN_EXTENSION'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
             'ID_REPRESENTANTE_LEGAL' => 'Id  representante legal',
            'NOMBRE' => 'Nombre',
            'APP' => 'Apellido paterno' ,
            'APM' => 'Apellido materno',
            'FEC_NAC' => 'Fecha de nacimiento',
            'CURP' => 'Clave única de registro de población (CURP)',
            'RFC' => 'Registro federal del contribuyente (RFC)',
            'DOMICILIO' => 'Domicilio completo',
            'TELEFONO' => 'Teléfono(s)',
            'CORREO_ELECTRONICO' => 'Correo  electrónico',
            'ACTIVO' => 'Activo',
            'NSS' => 'Número de registro patronal',
            'SIGN_PICTURE' => 'Imagen firma',
            'SIGN_PASSWD' => 'Constraseña encriptación',
            'SIGN_KEY' => 'Sign  Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::className(), ['ID_REPRESENTANTE_LEGAL' => 'ID_REPRESENTANTE_LEGAL']);
    }
    
    
    
	/**
	 * Gets  singning image binary base64
	 */    
    public function getSigningBinary(){
    	
    	/*
    	* into a reproducable iv/key pair
    	*/
    	
    	$image64Data = null;
    	
    	
    	if($this->SIGN_PICTURE !== null){
    
    	try {
    		
    	
    	$passphrase  =  $this->SIGN_PASSWD;
    	
    	$iv = substr(md5('iv'.$passphrase, true), 0, 8);
    	$key = substr(md5('pass1'.$passphrase, true) .
    			md5('pass2'.$passphrase, true), 0, 24);
    	$opts = array('iv'=>$iv, 'key'=>$key);
    	
    	$fp = @fopen($this->SIGN_PICTURE, 'rb');
    	
    	if (!$fp) {
    		
    		return null;
    	}
    	stream_filter_append($fp, 'mdecrypt.tripledes', STREAM_FILTER_READ, $opts);
    	$data = rtrim(stream_get_contents($fp));
    	fclose($fp);
    	
    	$image64Data =  $data;
    	
    	} catch (Exception $e) {
    		
    		return null;
    	}
    	}
    	
    	return base64_encode($image64Data);
    	
    }
    
}
