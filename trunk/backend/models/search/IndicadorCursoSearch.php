<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IndicadorCurso;

/**
 * IndicadorCursoSearch represents the model behind the search form about `backend\models\IndicadorCurso`.
 */
class IndicadorCursoSearch extends IndicadorCurso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EVENTO', 'ID_CURSO', 'CATEGORIA', 'ID_ALERTA', 'ESTATUS', 'ACTIVO', 'ID_USUARIO'], 'integer'],
            [['TITULO', 'DATA', 'CLAVE', 'FECHA_CREACION', 'FECHA_INICIO_VIGENCIA', 'FECHA_FIN_VIGENCIA'], 'safe'],
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
    	$query = IndicadorCurso::findBySql('select * from tbl_indicador_curso where id_curso in 
                            		(select id_curso from tbl_curso where id_plan in 
                            			(select id_plan from tbl_plan where id_comision in 
                            				(select id_comision from tbl_comision_mixta_cap where id_empresa = '. $id.') ))' );
    										
    
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
            'ID_CURSO' => $this->ID_CURSO,
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
            ->andFilterWhere(['like', 'DATA', $this->DATA])
            ->andFilterWhere(['like', 'CLAVE', $this->CLAVE]);
    
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
        $query = IndicadorCurso::find();

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
            'ID_CURSO' => $this->ID_CURSO,
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
            ->andFilterWhere(['like', 'DATA', $this->DATA])
            ->andFilterWhere(['like', 'CLAVE', $this->CLAVE]);

        return $dataProvider;
    }
}
