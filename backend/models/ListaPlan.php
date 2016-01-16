<?php

namespace backend\models;

use Yii;
use Codeception\Lib\Console\Message;

/**
 * This is the model class for table "tbl_lista_plan".
 *
 * @property integer $ID_LISTA
 * @property integer $ID_PLAN
 * @property string $FECHA_CREACION
 * @property string $FECHA_ELABORACION
 * @property integer $ESTATUS
 * @property integer $ACTIVO
 * @property string $DOCUMENTO_PROBATORIO
 * @property string $NOMBRE_DOC_PROB
 * @property integer $ID_EMPRESA
 * @property string $ALIAS
 * @property string $DESCRIPCION
 * @property integer $CONSTANCIAS_HOMBRES
 * @property integer $CONSTANCIAS_MUJERES
 * @property string $FECHA_INFO
 * @property string $FECHA_AGREGO
 * @property string $FECHA_INFORME
 * @property string $LUGAR_INFORME
 * @property string $FECHA_SOLICITUD
 * @property string $FECHA_P_DOF
 * @property string $EXPEDIENTE
 *
 * @property ListaConstancia[] $listaConstancias
 * @property Constancia[] $iDCONSTANCIAs
 * @property ListaEstablecimiento[] $listaEstablecimientos
 * @property PlanEstablecimiento[] $iDESTABLECIMIENTOs
 * @property Plan $iDPLAN
 */
class ListaPlan extends \yii\db\ActiveRecord
{
	const STATUS_CREADO = 1;  // Lista plan has been created
	const STATUS_ENVIADO = 2;//Lista plan has been sended.   (Manual)
	const STATUS_CONFIRMADO = 3;// User has attached the documento probatorio file
	const STATUS_NOTIFICADO = 4;
	
	public $statusDescription = [ ListaPlan::STATUS_CREADO=>'Editando', ListaPlan::STATUS_NOTIFICADO=>'Notificado'];
	
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_lista_plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['CONSTANCIAS_HOMBRES', 'CONSTANCIAS_MUJERES','ALIAS','LUGAR_INFORME','FECHA_ELABORACION'], 'required','message' =>'El dato es obligatorio'],
        
            [['ID_PLAN', 'ESTATUS', 'ACTIVO', 'ID_EMPRESA', 'CONSTANCIAS_HOMBRES', 'CONSTANCIAS_MUJERES'], 'integer'],
            [['FECHA_AGREGO', 'FECHA_INFORME','FECHA_SOLICITUD', 'FECHA_P_DOF'], 'safe'],
            [['FECHA_ELABORACION','EXPEDIENTE'], 'string', 'max' => 45],
            [['DOCUMENTO_PROBATORIO'], 'string', 'max' => 2048],
            [['NOMBRE_DOC_PROB', 'DESCRIPCION'], 'string', 'max' => 300],
            [['ALIAS', 'LUGAR_INFORME'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_LISTA' => 'Id  Lista',
            'ID_PLAN' => 'Id  Plan',
      
            'FECHA_ELABORACION' => 'Fecha elaboración informe',
            'ESTATUS' => 'Estatus',
            'ACTIVO' => 'Activo',
            'DOCUMENTO_PROBATORIO' => 'Documento  probatorio',
            'NOMBRE_DOC_PROB' => 'Nombre documento probatorio',
            'ID_EMPRESA' => 'Id  Empresa',
            'ALIAS' => 'Alias',
            'DESCRIPCION' => 'Descripción',
            'CONSTANCIAS_HOMBRES' => 'No. de constancias  hombres',
            'CONSTANCIAS_MUJERES' => 'No. de constancias  mujeres',
            'FECHA_AGREGO' => 'Fecha  agregó',
            'FECHA_INFORME' => 'Fecha elaboración informe',
            'EXPEDIENTE' => 'Expediente',
       		'FECHA_SOLICITUD' => 'Fecha en que se realiza la solicitud',
       		'FECHA_P_DOF' => 'Fecha de publicación del formato en el DOF',
       		'LUGAR_INFORME' => 'Lugar elaboración informe',        		
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaConstancias()
    {
        return $this->hasMany(ListaConstancia::className(), ['ID_LISTA' => 'ID_LISTA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDCONSTANCIAs()
    {
        return $this->hasMany(Constancia::className(), ['ID_CONSTANCIA' => 'ID_CONSTANCIA'])->viaTable('tbl_lista_constancia', ['ID_LISTA' => 'ID_LISTA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaEstablecimientos()
    {
        return $this->hasMany(ListaEstablecimiento::className(), ['ID_LISTA' => 'ID_LISTA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTABLECIMIENTOs()
    {
    	return $this->hasMany(Empresa::className(), ['ID_EMPRESA' => 'ID_ESTABLECIMIENTO'])->viaTable('tbl_lista_establecimiento', ['ID_LISTA' => 'ID_LISTA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPLAN()
    {
        return $this->hasOne(Plan::className(), ['ID_PLAN' => 'ID_PLAN']);
    }
    public  function  getStatus(){
    
    	if ($this->DOCUMENTO_PROBATORIO === null) return $this->statusDescription[ListaPlan::STATUS_CREADO];
    	else return $this->statusDescription[ListaPlan::STATUS_NOTIFICADO];
    
    }
}
