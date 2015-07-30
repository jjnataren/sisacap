<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IndicadorPlan;

/**
 * IndicadorPlanSearch represents the model behind the search form about `backend\models\IndicadorPlan`.
 */
class IndicadorPlanSearch extends IndicadorPlan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EVENTO', 'ID_PLAN', 'CATEGORIA', 'ID_ALERTA', 'ESTATUS', 'ACTIVO', 'ID_USUARIO'], 'integer'],
            [['TITULO', 'DATA', 'FECHA_CREACION', 'FECHA_INICIO_VIGENCIA', 'FECHA_FIN_VIGENCIA'], 'safe'],
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
        $query = IndicadorPlan::find();

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
            'ID_EVENTO' => $this->ID_EVENTO,
            'ID_PLAN' => $this->ID_PLAN,
            'CATEGORIA' => $this->CATEGORIA,
            'ID_ALERTA' => $this->ID_ALERTA,
            'FECHA_CREACION' => $this->FECHA_CREACION,
            'FECHA_INICIO_VIGENCIA' => $this->FECHA_INICIO_VIGENCIA,
            'FECHA_FIN_VIGENCIA' => $this->FECHA_FIN_VIGENCIA,
            'ESTATUS' => $this->ESTATUS,
            'ACTIVO' => $this->ACTIVO,
            'ID_USUARIO' => $this->ID_USUARIO,
        ]);

        $query->andFilterWhere(['like', 'TITULO', $this->TITULO])
            ->andFilterWhere(['like', 'DATA', $this->DATA]);

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
    	
    	
    	$query = IndicadorPlan::findBySql('select * from tbl_indicador_plan where id_plan in
    										(select id_plan from tbl_plan where id_comision in
												(select id_comision_mixta from tbl_comision_mixta_cap where id_empresa = '.$id.'
												AND activo=1) 
											 AND activo=1)
    										AND activo=1');
    	
    	
    
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
    			'ID_EVENTO' => $this->ID_EVENTO,
    			'ID_PLAN' => $this->ID_PLAN,
    			'CATEGORIA' => $this->CATEGORIA,
    			'ID_ALERTA' => $this->ID_ALERTA,
    			'FECHA_CREACION' => $this->FECHA_CREACION,
    			'FECHA_INICIO_VIGENCIA' => $this->FECHA_INICIO_VIGENCIA,
    			'FECHA_FIN_VIGENCIA' => $this->FECHA_FIN_VIGENCIA,
    			'ESTATUS' => $this->ESTATUS,
    			'ACTIVO' => $this->ACTIVO,
    			'ID_USUARIO' => $this->ID_USUARIO,
    			]);
    
    	$query->andFilterWhere(['like', 'TITULO', $this->TITULO])
    	->andFilterWhere(['like', 'DATA', $this->DATA]);
    
    	return $dataProvider;
    }
}
