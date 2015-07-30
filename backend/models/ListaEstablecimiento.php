<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_lista_establecimiento".
 *
 * @property integer $ID_LISTA
 * @property integer $ID_ESTABLECIMIENTO
 * @property string $FECHA_AGREGO
 * @property integer $ACTIVO
 *
 * @property ListaPlan $iDLISTA
 * @property Empresa $iDESTABLECIMIENTO
 */
class ListaEstablecimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_lista_establecimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_LISTA', 'ID_ESTABLECIMIENTO'], 'required'],
            [['ID_LISTA', 'ID_ESTABLECIMIENTO', 'ACTIVO'], 'integer'],
            [['FECHA_AGREGO'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_LISTA' => 'Id  Lista',
            'ID_ESTABLECIMIENTO' => 'Id  Establecimiento',
            'FECHA_AGREGO' => 'Fecha  Agrego',
            'ACTIVO' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDLISTA()
    {
        return $this->hasOne(ListaPlan::className(), ['ID_LISTA' => 'ID_LISTA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTABLECIMIENTO()
    {
        return $this->hasOne(Empresa::className(), ['ID_EMPRESA' => 'ID_ESTABLECIMIENTO']);
    }
}
