<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_plan_puesto".
 *
 * @property integer $ID_PLAN
 * @property integer $ID_PUESTO
 * @property integer $ACTIVO
 *
 * @property Plan $iDPLAN
 * @property PuestoEmpresa $iDPUESTO
 */
class PlanPuesto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_plan_puesto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PLAN', 'ID_PUESTO'], 'required'],
            [['ID_PLAN', 'ID_PUESTO', 'ACTIVO'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PLAN' => 'Id  Plan',
            'ID_PUESTO' => 'Id  Puesto',
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
    public function getIDPUESTO()
    {
        return $this->hasOne(PuestoEmpresa::className(), ['ID_PUESTO' => 'ID_PUESTO']);
    }
}
