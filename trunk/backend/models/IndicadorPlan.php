<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_indicador_plan".
 *
 * @property integer $ID_EVENTO
 * @property integer $ID_PLAN
 * @property string $TITULO
 * @property string $DATA
 * @property integer $CATEGORIA
 * @property string $CLAVE
 * @property integer $ID_ALERTA
 * @property string $FECHA_CREACION
 * @property string $FECHA_INICIO_VIGENCIA
 * @property string $FECHA_FIN_VIGENCIA
 * @property integer $ESTATUS
 * @property integer $ACTIVO
 * @property integer $ID_USUARIO
 *
 * @property Plan $iDPLAN
 */
class IndicadorPlan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_indicador_plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PLAN', 'CATEGORIA', 'ID_ALERTA', 'ESTATUS', 'ACTIVO', 'ID_USUARIO'], 'integer'],
            [['FECHA_CREACION', 'FECHA_INICIO_VIGENCIA', 'FECHA_FIN_VIGENCIA'], 'safe'],
            [['TITULO'], 'string', 'max' => 200],
            [['DATA'], 'string', 'max' => 2048],
            [['CLAVE'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_EVENTO' => 'Id  Evento',
            'ID_PLAN' => 'Id  Plan',
            'TITULO' => 'Titulo',
            'DATA' => 'Data',
            'CATEGORIA' => 'Categoria',
            'CLAVE' => 'Clave',
            'ID_ALERTA' => 'Id  Alerta',
            'FECHA_CREACION' => 'Fecha  Creacion',
            'FECHA_INICIO_VIGENCIA' => 'Fecha  Inicio  Vigencia',
            'FECHA_FIN_VIGENCIA' => 'Fecha  Fin  Vigencia',
            'ESTATUS' => 'Estatus',
            'ACTIVO' => 'Activo',
            'ID_USUARIO' => 'Id  Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPLAN()
    {
        return $this->hasOne(Plan::className(), ['ID_PLAN' => 'ID_PLAN']);
    }
}
