<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Plan;

/**
 * PlanSearch represents the model behind the search form about `backend\models\Plan`.
 */
class PlanSearch extends Plan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PLAN', 'ID_COMISION',  'TOTAL_HOMBRES', 'TOTAL_MUJERES', 'NUMERO_ETAPAS', 'NUMERO_CONSTANCIAS_EXPEDIDAS', 'ESTATUS', 'MODALIDAD_CAPACITACION', 'ACTIVO', 'MODALIDAD', 'OBJETIVO1', 'OBJETIVO2', 'OBJETIVO3', 'OBJETIVO4', 'OBJETIVO5'], 'integer'],
            [['ALIAS', 'VIGENCIA_INICIO', 'VIGENCIA_FIN','FECHA_INFO'], 'safe'],
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
        $query = Plan::find();

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
            'ID_PLAN' => $this->ID_PLAN,
            'ID_COMISION' => $this->ID_COMISION,
            'TOTAL_HOMBRES' => $this->TOTAL_HOMBRES,
            'TOTAL_MUJERES' => $this->TOTAL_MUJERES,
            'VIGENCIA_INICIO' => $this->VIGENCIA_INICIO,
            'VIGENCIA_FIN' => $this->VIGENCIA_FIN,
            'NUMERO_ETAPAS' => $this->NUMERO_ETAPAS,
            'NUMERO_CONSTANCIAS_EXPEDIDAS' => $this->NUMERO_CONSTANCIAS_EXPEDIDAS,
            'ESTATUS' => $this->ESTATUS,
            'MODALIDAD_CAPACITACION' => $this->MODALIDAD_CAPACITACION,
            'ACTIVO' => $this->ACTIVO,
            'MODALIDAD' => $this->MODALIDAD,
            'OBJETIVO1' => $this->OBJETIVO1,
            'OBJETIVO2' => $this->OBJETIVO2,
            'OBJETIVO3' => $this->OBJETIVO3,
            'OBJETIVO4' => $this->OBJETIVO4,
            'OBJETIVO5' => $this->OBJETIVO5,
        		'FECHA_INFO' => $this->FECHA_INFO,
        ]);

        $query->andFilterWhere(['like', 'ALIAS', $this->ALIAS]);

        return $dataProvider;
    }
    
    

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param integer $id
     * @return ActiveDataProvider
     */
    public function searchByCompany($params, $id)
    {
    	$query = Plan::findBySql('SELECT * FROM tbl_plan WHERE ID_EMPRESA = '.$id);
    
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
    			'ID_PLAN' => $this->ID_PLAN,
    			'ID_EMPRESA' => $this->ID_EMPRESA,
    			'TOTAL_HOMBRES' => $this->TOTAL_HOMBRES,
    			'TOTAL_MUJERES' => $this->TOTAL_MUJERES,
    			'VIGENCIA_INICIO' => $this->VIGENCIA_INICIO,
    			'VIGENCIA_FIN' => $this->VIGENCIA_FIN,
    			'NUMERO_ETAPAS' => $this->NUMERO_ETAPAS,
    			'NUMERO_CONSTANCIAS_EXPEDIDAS' => $this->NUMERO_CONSTANCIAS_EXPEDIDAS,
    			'ESTATUS' => $this->ESTATUS,
    			'ACTIVO' => $this->ACTIVO,
    			'OBJETIVO1' => $this->OBJETIVO1,
    			'OBJETIVO2' => $this->OBJETIVO2,
    			'OBJETIVO3' => $this->OBJETIVO3,
    			'OBJETIVO4' => $this->OBJETIVO4,
    			'OBJETIVO5' => $this->OBJETIVO5,
    			'FECHA_INFO' => $this->FECHA_INFO,
    			]);
    
    	return $dataProvider;
}
}