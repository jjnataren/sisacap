<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Instructor;

/**
 * InstructorSearch represents the model behind the search form about `backend\models\Instructor`.
 */
class InstructorSearch extends Instructor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_INSTRUCTOR', 'ID_EMPRESA', 'LOGOTIPO', 'NUM_REGISTRO_AGENTE_EXTERNO', 'TIPO_INSTRUCTOR'], 'integer'],
            [['NOMBRE_AGENTE_EXTERNO', 'NOMBRE', 'APP', 'APM', 'DOMICILIO', 'TELEFONO', 'CORREO_ELECTRONICO'], 'safe'],
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
        $query = Instructor::find();

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
            'ID_INSTRUCTOR' => $this->ID_INSTRUCTOR,
            'ID_EMPRESA' => $this->ID_EMPRESA,
            'LOGOTIPO' => $this->LOGOTIPO,
            'NUM_REGISTRO_AGENTE_EXTERNO' => $this->NUM_REGISTRO_AGENTE_EXTERNO,
            'TIPO_INSTRUCTOR' => $this->TIPO_INSTRUCTOR,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_AGENTE_EXTERNO', $this->NOMBRE_AGENTE_EXTERNO])
            ->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'APP', $this->APP])
            ->andFilterWhere(['like', 'APM', $this->APM])
            ->andFilterWhere(['like', 'DOMICILIO', $this->DOMICILIO])
            ->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
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
    public function searchByCompany($params, $id)
    {
    	$query = Instructor::find();
    
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
    			'ID_INSTRUCTOR' => $this->ID_INSTRUCTOR,
    			'ID_EMPRESA' => $id,
    			'LOGOTIPO' => $this->LOGOTIPO,
    			'NUM_REGISTRO_AGENTE_EXTERNO' => $this->NUM_REGISTRO_AGENTE_EXTERNO,
    			'TIPO_INSTRUCTOR' => $this->TIPO_INSTRUCTOR,
    			'ACTIVO' => 1,
    			]);
    
    	$query->andFilterWhere(['like', 'NOMBRE_AGENTE_EXTERNO', $this->NOMBRE_AGENTE_EXTERNO])
    	->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
    	->andFilterWhere(['like', 'APP', $this->APP])
    	->andFilterWhere(['like', 'APM', $this->APM])
    	->andFilterWhere(['like', 'DOMICILIO', $this->DOMICILIO])
    	->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
    	->andFilterWhere(['like', 'CORREO_ELECTRONICO', $this->CORREO_ELECTRONICO]);
    
    	return $dataProvider;
    }
    
}
