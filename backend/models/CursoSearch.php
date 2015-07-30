<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Curso;

/**
 * CursoSearch represents the model behind the search form about `backend\models\Curso`.
 */
class CursoSearch extends Curso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_CURSO', 'ID_EMPRESA', 'ID_INSTRUCTOR', 'AREA_TEMATICA'], 'integer'],
            [['NOMBRE', 'DURACION_HORAS', 'FECHA_INICIO', 'FECHA_TERMINO', 'MODALIDAD_CAPACITACION'], 'safe'],
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
        $query = Curso::find();

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
            'ID_CURSO' => $this->ID_CURSO,
            'ID_EMPRESA' => $this->ID_EMPRESA,
            'ID_INSTRUCTOR' => $this->ID_INSTRUCTOR,
            'DURACION_HORAS' => $this->DURACION_HORAS,
            'FECHA_INICIO' => $this->FECHA_INICIO,
            'FECHA_TERMINO' => $this->FECHA_TERMINO,
            'AREA_TEMATICA' => $this->AREA_TEMATICA,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'MODALIDAD_CAPACITACION', $this->MODALIDAD_CAPACITACION]);

        return $dataProvider;
    }
    
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchbycompany($params, $id)
    {
    	$query = Curso::find();
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    
    	$this->load($params);
    	
    	$this->ID_EMPRESA = $id;
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	$query->andFilterWhere([
    			'ID_CURSO' => $this->ID_CURSO,
    			'ID_EMPRESA' => $this->ID_EMPRESA,
    			'ID_INSTRUCTOR' => $this->ID_INSTRUCTOR,
    			'DURACION_HORAS' => $this->DURACION_HORAS,
    			'FECHA_INICIO' => $this->FECHA_INICIO,
    			'FECHA_TERMINO' => $this->FECHA_TERMINO,
    			'AREA_TEMATICA' => $this->AREA_TEMATICA,
    			]);
    
    	$query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
    	->andFilterWhere(['like', 'MODALIDAD_CAPACITACION', $this->MODALIDAD_CAPACITACION]);
    
    	return $dataProvider;
    }
}
