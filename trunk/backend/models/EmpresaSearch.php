<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `backend\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EMPRESA', 'ID_REPRESENTANTE_LEGAL', 'MORAL', 'NUMERO_TRABAJADORES', 'CODIGO_POSTAL', 'ACTIVO'], 'integer'],
            [['NOMBRE_RAZON_SOCIAL', 'RFC', 'NSS', 'CURP', 'CALLE', 'NUMERO_EXTERIOR', 'NUMERO_INTERIOR', 'COLONIA', 'ENTIDAD_FEDERATIVA', 'LOCALIDAD', 'TELEFONO', 'MUNICIPIO_DELEGACION', 'GIRO_PRINCIPAL', 'FAX', 'CORREO_ELECTRONICO'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Empresa::find();

        
        $query->where(['ID_EMPRESA_PADRE' => null]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

      /*  if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }*/

        $query->andFilterWhere([
            'ID_EMPRESA' => $this->ID_EMPRESA,
            'ID_REPRESENTANTE_LEGAL' => $this->ID_REPRESENTANTE_LEGAL,
            'MORAL' => $this->MORAL,
            'NUMERO_TRABAJADORES' => $this->NUMERO_TRABAJADORES,
            'CODIGO_POSTAL' => $this->CODIGO_POSTAL,
            'ACTIVO' => $this->ACTIVO,
        	
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_RAZON_SOCIAL', $this->NOMBRE_RAZON_SOCIAL])
            ->andFilterWhere(['like', 'RFC', $this->RFC])
            ->andFilterWhere(['like', 'NSS', $this->NSS])
            ->andFilterWhere(['like', 'CURP', $this->CURP])
            ->andFilterWhere(['like', 'CALLE', $this->CALLE])
            ->andFilterWhere(['like', 'NUMERO_EXTERIOR', $this->NUMERO_EXTERIOR])
            ->andFilterWhere(['like', 'NUMERO_INTERIOR', $this->NUMERO_INTERIOR])
            ->andFilterWhere(['like', 'COLONIA', $this->COLONIA])
            ->andFilterWhere(['like', 'ENTIDAD_FEDERATIVA', $this->ENTIDAD_FEDERATIVA])
            ->andFilterWhere(['like', 'LOCALIDAD', $this->LOCALIDAD])
            ->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
            ->andFilterWhere(['like', 'MUNICIPIO_DELEGACION', $this->MUNICIPIO_DELEGACION])
            ->andFilterWhere(['like', 'GIRO_PRINCIPAL', $this->GIRO_PRINCIPAL])
            ->andFilterWhere(['like', 'FAX', $this->FAX])
            ->andFilterWhere(['like', 'CORREO_ELECTRONICO', $this->CORREO_ELECTRONICO]);

        return $dataProvider;
    }
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchEstablishments($params, $id)
    {
    	$query = Empresa::find();
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    
    	$this->load($params);
    	
    	
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	$query->andFilterWhere([
    			'ID_EMPRESA' => $this->ID_EMPRESA,
    			'ID_EMPRESA_PADRE' => $id,
    			'ID_REPRESENTANTE_LEGAL' => $this->ID_REPRESENTANTE_LEGAL,
    			'MORAL' => $this->MORAL,
    			'NUMERO_TRABAJADORES' => $this->NUMERO_TRABAJADORES,
    			'CODIGO_POSTAL' => $this->CODIGO_POSTAL,
    			'ACTIVO' => 1,
    			]);
    
    	$query->andFilterWhere(['like', 'NOMBRE_RAZON_SOCIAL', $this->NOMBRE_RAZON_SOCIAL])
    	->andFilterWhere(['like', 'RFC', $this->RFC])
    	->andFilterWhere(['like', 'NSS', $this->NSS])
    	->andFilterWhere(['like', 'CURP', $this->CURP])
    	->andFilterWhere(['like', 'CALLE', $this->CALLE])
    	->andFilterWhere(['like', 'NUMERO_EXTERIOR', $this->NUMERO_EXTERIOR])
    	->andFilterWhere(['like', 'NUMERO_INTERIOR', $this->NUMERO_INTERIOR])
    	->andFilterWhere(['like', 'COLONIA', $this->COLONIA])
    	->andFilterWhere(['like', 'ENTIDAD_FEDERATIVA', $this->ENTIDAD_FEDERATIVA])
    	->andFilterWhere(['like', 'LOCALIDAD', $this->LOCALIDAD])
    	->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
    	->andFilterWhere(['like', 'MUNICIPIO_DELEGACION', $this->MUNICIPIO_DELEGACION])
    	->andFilterWhere(['like', 'GIRO_PRINCIPAL', $this->GIRO_PRINCIPAL])
    	->andFilterWhere(['like', 'FAX', $this->FAX])
    	->andFilterWhere(['like', 'CORREO_ELECTRONICO', $this->CORREO_ELECTRONICO]);
    
    	return $dataProvider;
    }
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchEstablishmentsByComision($params, $id)
    {
    	
    	
    	$comisionModel = ComisionMixtaCap::findOne($id);
    	
    	
    	
    	$query = $comisionModel->getIDESTABLECIMIENTOs();
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    
    //	$this->load($params);
    	 
    	 
    
   // 	if (!$this->validate()) {
    		// uncomment the following line if you do not want to any records when validation fails
    		// $query->where('0=1');
    //		return $dataProvider;
   // 	}
    
   /* 	$query->andFilterWhere([
    			'ID_EMPRESA' => $this->ID_EMPRESA,
    			'ID_EMPRESA_PADRE' => $id,
    			'ID_REPRESENTANTE_LEGAL' => $this->ID_REPRESENTANTE_LEGAL,
    			'MORAL' => $this->MORAL,
    			'NUMERO_TRABAJADORES' => $this->NUMERO_TRABAJADORES,
    			'CODIGO_POSTAL' => $this->CODIGO_POSTAL,
    			'ACTIVO' => $this->ACTIVO,
    			]);
    
    	$query->andFilterWhere(['like', 'NOMBRE_RAZON_SOCIAL', $this->NOMBRE_RAZON_SOCIAL])
    	->andFilterWhere(['like', 'RFC', $this->RFC])
    	->andFilterWhere(['like', 'NSS', $this->NSS])
    	->andFilterWhere(['like', 'CURP', $this->CURP])
    	->andFilterWhere(['like', 'CALLE', $this->CALLE])
    	->andFilterWhere(['like', 'NUMERO_EXTERIOR', $this->NUMERO_EXTERIOR])
    	->andFilterWhere(['like', 'NUMERO_INTERIOR', $this->NUMERO_INTERIOR])
    	->andFilterWhere(['like', 'COLONIA', $this->COLONIA])
    	->andFilterWhere(['like', 'ENTIDAD_FEDERATIVA', $this->ENTIDAD_FEDERATIVA])
    	->andFilterWhere(['like', 'LOCALIDAD', $this->LOCALIDAD])
    	->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
    	->andFilterWhere(['like', 'MUNICIPIO_DELEGACION', $this->MUNICIPIO_DELEGACION])
    	->andFilterWhere(['like', 'GIRO_PRINCIPAL', $this->GIRO_PRINCIPAL])
    	->andFilterWhere(['like', 'FAX', $this->FAX])
    	->andFilterWhere(['like', 'CORREO_ELECTRONICO', $this->CORREO_ELECTRONICO]);
    */
    	return $dataProvider;
    }
    
    
}
