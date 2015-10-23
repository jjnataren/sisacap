<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_comision_mixta_cap".
 *
 * @property integer $ID_COMISION_MIXTA
 * @property string $ALIAS
 * @property integer $ID_EMPRESA
 * @property integer $COMISION_MIXTA_PADRE
 * @property integer $NUMERO_INTEGRANTES
 * @property string $FECHA_CONSTITUCION
 * @property string $FECHA_ELABORACION
 * @property string $FECHA_AGREGO
 * @property string $DOCUMENTO_PROBATORIO
 * @property string $NOMBRE_DOC_PROB
 * @property integer $ACTIVO
 * @property string $DESCRIPCION
 * @property string $LUGAR_INFORME
 *
 *
 * @property ComisionEstablecimiento[] $comisionEstablecimientos
 * @property Empresa[] $iDESTABLECIMIENTOs
 * @property Empresa $iDEMPRESA
 * @property ComisionMixtaCap $cOMISIONMIXTAPADRE
 * @property ComisionMixtaCap[] $comisionMixtaCaps
 * @property IndicadorComision[] $indicadorComisions
 * @property Plan[] $plans
 */
class ComisionMixtaCap extends \yii\db\ActiveRecord
{
	
	const STATUS_BORRADA = 0;
	const STATUS_CREADA = 1;
	const STATUS_VALIDADA=2;	
	const STATUS_INICIADA=3;
	const STATUS_CONCLUIDA=4;
	const STATUS_ALMACENADA=5;
	
	public $statusDescription = [ ComisionMixtaCap::STATUS_CREADA=>'Editando', ComisionMixtaCap::STATUS_VALIDADA=>'Constituida'];
	
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_comision_mixta_cap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EMPRESA', 'COMISION_MIXTA_PADRE', 'NUMERO_INTEGRANTES', 'ACTIVO'], 'integer'],
            [['FECHA_CONSTITUCION', 'FECHA_ELABORACION','FECHA_AGREGO', 'FECHA_INFORME'], 'safe'],
            [['ALIAS', 'LUGAR_INFORME'], 'string', 'max' => 100],
            ['ALIAS', 'required','message'=>'El campo no puede estar en blanco. '],
            ['ALIAS','string','min'=>3],
            [['DOCUMENTO_PROBATORIO'], 'string', 'max' => 2048],
            [['NOMBRE_DOC_PROB'], 'string', 'max' => 300],
            [['DESCRIPCION'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_COMISION_MIXTA' => 'Id comisión  mixta',
            'ALIAS' => 'Alias',
            'ID_EMPRESA' => 'Id empresa',
            'COMISION_MIXTA_PADRE' => 'Comisión  mixta  padre',
            'NUMERO_INTEGRANTES' => 'Número  integrantes',
            'FECHA_CONSTITUCION' => 'Fecha  constitución',
            'FECHA_ELABORACION' => 'Fecha elaboración del informe',
            'FECHA_AGREGO' => 'Fecha agrego',
           'DOCUMENTO_PROBATORIO' => 'Documento  probatorio',
            'NOMBRE_DOC_PROB' => 'Nombre documento probatorio',
            'ACTIVO' => 'Activo',
            'DESCRIPCION' => 'Descripción',
            'LUGAR_INFORME' => 'Lugar elaboración del informe',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComisionEstablecimientos()
    {
        return $this->hasMany(ComisionEstablecimiento::className(), ['ID_COMISION_MIXTA' => 'ID_COMISION_MIXTA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTABLECIMIENTOs()
    {
        return $this->hasMany(Empresa::className(), ['ID_EMPRESA' => 'ID_ESTABLECIMIENTO'])->viaTable('tbl_comision_establecimiento', ['ID_COMISION_MIXTA' => 'ID_COMISION_MIXTA']);
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
    public function getIDREPRESENTANTETRABAJADORES()
    {
    	return $this->hasOne(Trabajador::className(), ['ID_TRABAJADOR' => 'ID_REPRESENTANTE_TRABAJADORES']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCOMISIONMIXTAPADRE()
    {
        return $this->hasOne(ComisionMixtaCap::className(), ['ID_COMISION_MIXTA' => 'COMISION_MIXTA_PADRE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComisionMixtaCaps()
    {
        return $this->hasMany(ComisionMixtaCap::className(), ['COMISION_MIXTA_PADRE' => 'ID_COMISION_MIXTA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadorComisions()
    {
        return $this->hasMany(IndicadorComision::className(), ['ID_COMISION' => 'ID_COMISION_MIXTA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['ID_COMISION' => 'ID_COMISION_MIXTA']);
    }
    
    /**
     * Returns the general status  of comision mixta
     */
    public function  getStatus(){
    
    	if ($this->DOCUMENTO_PROBATORIO === null) return $this->statusDescription[ComisionMixtaCap::STATUS_CREADA];
    	else return $this->statusDescription[ComisionMixtaCap::STATUS_VALIDADA];
    
    }
    /**
     * Returns current status of a particular model
     * @return number
     */
    public function  getCurrentStatus(){
    
    	if ($this->DOCUMENTO_PROBATORIO === null)
    		return ComisionMixtaCap::STATUS_CREADA;
    	else return ComisionMixtaCap::STATUS_VALIDADA;
    
    }
    
}
