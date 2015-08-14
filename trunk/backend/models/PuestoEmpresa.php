<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_puesto_empresa".
 *
 * @property integer $ID_PUESTO
 * @property integer $CLAVE_PUESTO
 * @property integer $ID_EMPRESA
 * @property string $NOMBRE_PUESTO
 * @property string $DESCRIPCION_PUESTO
 * @property integer $ACTIVO
 *
 * @property Empresa $iDEMPRESA
 */
class PuestoEmpresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_puesto_empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CLAVE_PUESTO', 'ID_EMPRESA', 'ACTIVO'], 'integer'],
            [['NOMBRE_PUESTO', 'DESCRIPCION_PUESTO'], 'string', 'max' => 100],
        	[['CLAVE_PUESTO', 'ID_EMPRESA'], 'unique', 'targetAttribute' => ['CLAVE_PUESTO', 'ID_EMPRESA'],'message' =>'Ya existe un puesto con la clave especificaada']
        		
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PUESTO' => 'Id  Puesto',
            'CLAVE_PUESTO' => 'Clave  puesto',
            'ID_EMPRESA' => 'Id  Empresa',
            'NOMBRE_PUESTO' => 'Nombre  puesto',
            'DESCRIPCION_PUESTO' => 'Descripción  puesto',
            'ACTIVO' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDEMPRESA()
    {
        return $this->hasOne(Empresa::className(), ['ID_EMPRESA' => 'ID_EMPRESA']);
    }
    
    
    /**
     * Returns the company that user is associated with
     * @throws NotFoundHttpException
     * @return Ambigous <\yii\db\static, multitype:, boolean, \yii\db\ActiveRecord, NULL>
     */
    public static  function getMyCompany(){
    
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id, 'ACTIVO'=>1]);
    
    	if($model === null) throw new NotFoundHttpException('The requested page does not exist.');
    
    	return $model;
    }
    
    
    
    
    
}
