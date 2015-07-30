<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ComisionMixtaCap;

/**
 * ComisionMixtaCapSearch represents the model behind the search form about `backend\models\ComisionMixtaCap`.
 */
class ComisionMixtaCapSearch extends ComisionMixtaCap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_COMISION_MIXTA', 'ID_EMPRESA', 'COMISION_MIXTA_PADRE', 'NUMERO_INTEGRANTES', 'ACTIVO'], 'integer'],
            [['FECHA_CONSTITUCION', 'FECHA_ELABORACION'], 'safe'],
    		[['ALIAS'], 'string'],
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
    	
    	
        $query = ComisionMixtaCap::find();

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
            'ID_COMISION_MIXTA' => $this->ID_COMISION_MIXTA,
            'ID_EMPRESA' => $this->ID_EMPRESA,
            'COMISION_MIXTA_PADRE' => $this->COMISION_MIXTA_PADRE,
            'NUMERO_INTEGRANTES' => $this->NUMERO_INTEGRANTES,
            'FECHA_CONSTITUCION' => $this->FECHA_CONSTITUCION,
            'FECHA_ELABORACION' => $this->FECHA_ELABORACION,
        	'ALIAS'=> $this->ALIAS,
            'ACTIVO' => $this->ACTIVO,
        ]);

        return $dataProvider;
    }
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchByCompany($params, $id)
    {
    	 
    	 
    	$query = ComisionMixtaCap::find();
    
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
    			'ID_COMISION_MIXTA' => $this->ID_COMISION_MIXTA,
    			'ID_EMPRESA' => $id,
    			'COMISION_MIXTA_PADRE' => $this->COMISION_MIXTA_PADRE,
    			'NUMERO_INTEGRANTES' => $this->NUMERO_INTEGRANTES,
    			'FECHA_CONSTITUCION' => $this->FECHA_CONSTITUCION,
    			'FECHA_ELABORACION' => $this->FECHA_ELABORACION,
    			'ALIAS'=> $this->ALIAS,
    			'ACTIVO' => 1,
    			]);
    
    	return $dataProvider;
    }
    
}



/*public function searchByCompany($params)
{
	$query = ComisionMixtaCap::find();

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
			'ID_COMISION_MIXTA' => $this->ID_COMISION_MIXTA,
			'ID_EMPRESA' => $this->ID_EMPRESA,
			'COMISION_MIXTA_PADRE' => $this->COMISION_MIXTA_PADRE,
			'NUMERO_INTEGRANTES' => $this->NUMERO_INTEGRANTES,
			'FECHA_CONSTITUCION' => $this->FECHA_CONSTITUCION,
			'FECHA_ELABORACION' => $this->FECHA_ELABORACION,
			'ACTIVO' => $this->ACTIVO,
			]);

	return $dataProvider;
}
}
*/
