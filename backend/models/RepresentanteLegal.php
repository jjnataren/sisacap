<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%representante_legal}}".
 *
 * @property integer $ID_REPRESENTANTE_LEGAL
 * @property string $NOMBRE
 * @property string $APP
 * @property string $APM
 * @property string $FEC_NAC
 * @property string $CURP
 * @property string $RFC
 * @property string $DOMICILIO
 * @property string $TELEFONO
 * @property string $CORREO_ELECTRONICO
 * @property integer $ACTIVO
 * @property string $NSS
 *
 * @property Empresa[] $empresas
 */
class RepresentanteLegal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%representante_legal}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FEC_NAC'], 'safe'],
            [['ACTIVO'], 'integer'],
            [['NOMBRE', 'APP', 'APM', 'TELEFONO'], 'string', 'max' => 100],
            [['CURP'], 'string', 'max' => 18],
            [['RFC'], 'string', 'max' => 13],
            [['DOMICILIO', 'CORREO_ELECTRONICO'], 'string', 'max' => 300],
            [['NSS'], 'string', 'max' => 20],
            [['CORREO_ELECTRONICO'], 'email',]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_REPRESENTANTE_LEGAL' => 'Id  representante legal',
            'NOMBRE' => 'Nombre',
            'APP' => 'Apellido paterno' ,
            'APM' => 'Apellido materno',
            'FEC_NAC' => 'Fecha de nacimiento',
            'CURP' => 'Clave única de registro de población (CURP)',
            'RFC' => 'Registro federal del contribuyente (RFC)',
            'DOMICILIO' => 'Domicilio completo',
            'TELEFONO' => 'Teléfono(s)',
            'CORREO_ELECTRONICO' => 'Correo  electrónico',
            'ACTIVO' => 'Activo',
            'NSS' => 'Número de registro patronal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::className(), ['ID_REPRESENTANTE_LEGAL' => 'ID_REPRESENTANTE_LEGAL']);
    }
}
