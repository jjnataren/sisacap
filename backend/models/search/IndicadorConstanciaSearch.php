<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IndicadorConstancia;

/**
 * IndicadorConstanciaSearch represents the model behind the search form about `backend\models\IndicadorConstancia`.
 */
class IndicadorConstanciaSearch extends IndicadorConstancia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EVENTO', 'ID_CONSTANCIA', 'CATEGORIA', 'ID_ALERTA', 'ESTATUS', 'ACTIVO', 'ID_USUARIO'], 'integer'],
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
    
    
    public function searchByCompany($params,  $id)
    {
    	$query = IndicadorConstancia::findBySql('select * from tbl_indicador_constancia where id_constancia in 
                            		(select id_constancia from tbl_constancia where id_trabajador in 
                             			(select id_trabajador from tbl_trabajador where id_empresa in 
                            				(select id_empresa from tbl_empresa where id_empresa_padre = '.$id.' OR id_empresa = '.$id.'  and ACTIVO=1) 
                            			AND ACTIVO=1)
                            		AND ACTIVO=1)
                             	  AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia');
    	
    
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
    			'ID_CONSTANCIA' => $this->ID_CONSTANCIA,
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
    public function search($params)
    {
        $query = IndicadorConstancia::find();

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
            'ID_CONSTANCIA' => $this->ID_CONSTANCIA,
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
