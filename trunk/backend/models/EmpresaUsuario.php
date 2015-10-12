<?php

namespace backend\models;

use Yii;
use yii\web\NotFoundHttpException;
use common\models\User;


/**
 * This is the model class for table "tbl_empresa_usuario".
 *
 * @property integer $ID_EMPRESA
 * @property integer $ID_USUARIO
 * @property integer $ACTIVO
 * @property string $FECHA_AGREGO
 *
 * @property Empresa $iDEMPRESA
 * @property User $iDUSUARIO
 */
class EmpresaUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_empresa_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EMPRESA', 'ID_USUARIO'], 'required'],
            [['ID_EMPRESA', 'ID_USUARIO', 'ACTIVO'], 'integer'],
            [['FECHA_AGREGO'], 'safe'],
            [['ID_USUARIO'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_EMPRESA' => 'Id  Empresa',
            'ID_USUARIO' => 'Id  Usuario',
            'ACTIVO' => 'Activo',
            'FECHA_AGREGO' => 'Fecha  Agrego',
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
     * @return \yii\db\ActiveQuery
     */
    public function getIDUSUARIO()
    {
    	
        return $this->hasOne(User::className(), ['id' => 'ID_USUARIO']);
    }
    
    
    /**
     * Returns the company that user is associated with
     * @throws NotFoundHttpException
     * @return Ambigous <\yii\db\static, multitype:, boolean, \yii\db\ActiveRecord, NULL>
     */
    public static  function getMyCompany(){
    	 
    	$model = EmpresaUsuario::findOne(['ID_USUARIO'=>Yii::$app->user->id, 'ACTIVO'=>1]);
    	 
    	if($model === null) {
    		
    		Yii::$app->session->setFlash('alert', [
    				'options'=>['class'=>'alert-warning'],
    				'body'=> '<i class="fa fa-exclamation-triangle fa-lg"></i> No tiene acceso a este recurso.',
    		]);
    		
    		return Yii::$app->getResponse()->redirect(array('/sign-in/logout'));
    	}
    	 
    	return $model;
    }
    
}
