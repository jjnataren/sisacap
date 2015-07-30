<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_indicador_comision".
 *
 * @property integer $ID_EVENTO
 * @property integer $ID_COMISION
 * @property integer $ID_USUARIO
 * @property string $DESCRIPCION
 * @property integer $CATEGORIA
 * @property integer $ID_OBJETO
 * @property integer $ID_ALERTA
 * @property string $DATA
 * @property string $FECHA_CREACION
 * @property integer $ACTIVO
 * @property string $FECHA_INICIO_VIGENCIA
 * @property string $FECHA_FIN_VIGENCIA
 *
 * @property ComisionMixtaCap $iDCOMISION
 */
class IndicadorComision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_indicador_comision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_COMISION', 'ID_USUARIO', 'CATEGORIA', 'ID_OBJETO', 'ID_ALERTA', 'ACTIVO'], 'integer'],
            [['FECHA_CREACION', 'FECHA_INICIO_VIGENCIA', 'FECHA_FIN_VIGENCIA'], 'safe'],
            [['DESCRIPCION'], 'string', 'max' => 500],
            [['DATA'], 'string', 'max' => 2048]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_EVENTO' => 'Id  Evento',
            'ID_COMISION' => 'Id  Comision',
            'ID_USUARIO' => 'Id  Usuario',
            'DESCRIPCION' => 'Descripcion',
            'CATEGORIA' => 'Categoria',
            'ID_OBJETO' => 'Id  Objeto',
            'ID_ALERTA' => 'Id  Alerta',
            'DATA' => 'Data',
            'FECHA_CREACION' => 'Fecha  Creacion', 
            'ACTIVO' => 'Activo',
            'FECHA_INICIO_VIGENCIA' => 'Fecha  Inicio  Vigencia',
            'FECHA_FIN_VIGENCIA' => 'Fecha  Fin  Vigencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDCOMISION()
    {
        return $this->hasOne(ComisionMixtaCap::className(), ['ID_COMISION_MIXTA' => 'ID_COMISION']);
    }
}
