<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_plan_establecimiento".
 *
 * @property integer $ID_PLAN
 * @property integer $ID_ESTABLECIMIENTO
 * @property integer $ACTIVO
 *
 * @property Plan $iDPLAN
 * @property Establecimiento $iDESTABLECIMIENTO
 */
class PlanEstablecimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_plan_establecimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PLAN', 'ID_ESTABLECIMIENTO'], 'required'],
            [['ID_PLAN', 'ID_ESTABLECIMIENTO', 'ACTIVO'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PLAN' => 'Id  Plan',
            'ID_ESTABLECIMIENTO' => 'Id  Establecimiento',
            'ACTIVO' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPLAN()
    {
        return $this->hasOne(Plan::className(), ['ID_PLAN' => 'ID_PLAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTABLECIMIENTO()
    {
        return $this->hasOne(Establecimiento::className(), ['ID_ESTABLECIMIENTO' => 'ID_ESTABLECIMIENTO']);
    }
}
