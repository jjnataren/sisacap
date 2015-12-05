<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_cat_catalogo".
 *
 * @property integer $ID_ELEMENTO
 * @property string $CLAVE
 * @property integer $ELEMENTO_PADRE
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 * @property integer $ORDEN
 * @property integer $CATEGORIA
 * @property integer $ACTIVO
 *
 * @property Catalogo $eLEMENTOPADRE
 * @property Catalogo[] $catalogos
 */
class Catalogo extends \yii\db\ActiveRecord
{
	
	const CATEGORIA_ENTIDADES_FEDERATIVAS = 1;
	const CATEGORIA_MUNICIPIOS = 2;
	const CATEGORIA_OCUPACION= 5;
	const CATEGORIA_GIRO=4;
	const CATEGORIA_AREA_TEMATI=6;
	const CATEGORIA_NTCL=7;
	const CATEGORIA_COMITE=8;
	const CATEGORIA_SECTOR=9;
	const CATEGORIA_OCU=10;
	const CATEGORIA_CURSO=11;
	
	
	
	
	/**
	 * properties helpers
	 */
	public $PADRE = '';
	
	
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_cat_catalogo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ELEMENTO_PADRE', 'ORDEN', 'CATEGORIA', 'ACTIVO'], 'integer'],
            [['CLAVE'], 'string', 'max' => 100],
            [['NOMBRE', 'DESCRIPCION'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ELEMENTO' => 'Id  Elemento',
            'CLAVE' => 'Clave',
            'ELEMENTO_PADRE' => 'Elemento  Padre',
            'NOMBRE' => 'Nombre',
            'DESCRIPCION' => 'Descripcion',
            'ORDEN' => 'Orden',
            'CATEGORIA' => 'Categoria',
            'ACTIVO' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getELEMENTOPADRE()
    {
        return $this->hasOne(Catalogo::className(), ['ID_ELEMENTO' => 'ELEMENTO_PADRE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogos()
    {
        return $this->hasMany(Catalogo::className(), ['ELEMENTO_PADRE' => 'ID_ELEMENTO']);
    }
}
