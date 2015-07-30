<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_comision_establecimiento".
 *
 * @property integer $ID_ESTABLECIMIENTO
 * @property integer $ID_COMISION_MIXTA
 * @property integer $ACTIVO
 *
 * @property Empresa $iDESTABLECIMIENTO
 * @property ComisionMixtaCap $iDCOMISIONMIXTA
 */
class ComisionEstablecimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_comision_establecimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTABLECIMIENTO', 'ID_COMISION_MIXTA'], 'required'],
            [['ID_ESTABLECIMIENTO', 'ID_COMISION_MIXTA', 'ACTIVO'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESTABLECIMIENTO' => 'Id  Establecimiento',
            'ID_COMISION_MIXTA' => 'Id  Comision  Mixta',
            'ACTIVO' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTABLECIMIENTO()
    {
        return $this->hasOne(Empresa::className(), ['ID_EMPRESA' => 'ID_ESTABLECIMIENTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDCOMISIONMIXTA()
    {
        return $this->hasOne(ComisionMixtaCap::className(), ['ID_COMISION_MIXTA' => 'ID_COMISION_MIXTA']);
    }
}
