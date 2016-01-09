<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Trabajador;
use yii\db\Query;
use backend\models\Curso;

/**
 * TrabajadorSearch represents the model behind the search form about `backend\models\Trabajador`.
 */
class TrabajadorSearch extends Trabajador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TRABAJADOR', 'ID_EMPRESA', 'ROL', 'ACTIVO'], 'integer'],
            [['NOMBRE', 'APP', 'APM', 'CURP', 'RFC', 'NSS', 'DOMICILIO', 'CORREO_ELECTRONICO', 'TELEFONO', 'PUESTO', 'OCUPACION_ESPECIFICA', 'FECHA_AGREGO'], 'safe'],
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
    public function searchRepresentanteTrabajadores($params, $id_company)
    {
    	$query = Trabajador::find();
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	
    	$query->where(['in', 'ID_EMPRESA', (new Query())->select('ID_EMPRESA')->from('tbl_empresa')->where(['or', ['ID_EMPRESA_PADRE' => $id_company], ['ID_EMPRESA'=>$id_company] ])]);
    	
    	$query->andFilterWhere([
    			'ID_TRABAJADOR' => $this->ID_TRABAJADOR,    
    			'ID_EMPRESA' => $this->ID_EMPRESA,
    			'ROL' => $this->ROL,
    			'FECHA_AGREGO' => $this->FECHA_AGREGO,
    			'ACTIVO' => 1,
    			]);
    
    	$query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
    	->andFilterWhere(['like', 'APP', $this->APP])
    	->andFilterWhere(['like', 'APM', $this->APM])
    	->andFilterWhere(['like', 'CURP', $this->CURP])
    	->andFilterWhere(['like', 'RFC', $this->RFC])
    	->andFilterWhere(['like', 'NSS', $this->NSS])
    	->andFilterWhere(['like', 'DOMICILIO', $this->DOMICILIO])
    	->andFilterWhere(['like', 'CORREO_ELECTRONICO', $this->CORREO_ELECTRONICO])
    	->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
    	->andFilterWhere(['like', 'PUESTO', $this->PUESTO])
    	->andFilterWhere(['like', 'OCUPACION_ESPECIFICA', $this->OCUPACION_ESPECIFICA]);
    
    	return $dataProvider;
    }
    
    
    
    

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchByCompany($params, $id_company)
    {
    	$query = Trabajador::find();
    
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
    			'ID_TRABAJADOR' => $this->ID_TRABAJADOR,
    			'ID_EMPRESA' => $id_company,
    			'ROL' => $this->ROL,
    			'FECHA_AGREGO' => $this->FECHA_AGREGO,
    			'ACTIVO' => 1,
    			]);
    
    	$query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
    	->andFilterWhere(['like', 'APP', $this->APP])
    	->andFilterWhere(['like', 'APM', $this->APM])
    	->andFilterWhere(['like', 'CURP', $this->CURP])
    	->andFilterWhere(['like', 'RFC', $this->RFC])
    	->andFilterWhere(['like', 'NSS', $this->NSS])
    	->andFilterWhere(['like', 'DOMICILIO', $this->DOMICILIO])
    	->andFilterWhere(['like', 'CORREO_ELECTRONICO', $this->CORREO_ELECTRONICO])
    	->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
    	->andFilterWhere(['like', 'PUESTO', $this->PUESTO])
    	->andFilterWhere(['like', 'OCUPACION_ESPECIFICA', $this->OCUPACION_ESPECIFICA]);
    
    	return $dataProvider;
    }
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchByCourse($params, $id_company, $id_course)
    {
    	
    	
    	
    	
    	$query = Trabajador::find();
    	
    	$courseModel = Curso::findOne($id_course);
    	
    	$planModel = $courseModel->iDPLAN;
    	
    	
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    	]);
    
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	
    	
    	
    	
    	$query->andFilterWhere(['not in', 'id_trabajador', (new Query())->select('id_trabajador')->from('tbl_constancia')->where(['id_curso' => $id_course, 'activo'=>1])->andFilterWhere(['not',['ID_TRABAJADOR' => null]])]);
    	
    	
    	if($planModel !== null &&  !$planModel->TIPO_PLAN){
    		
    		$query->andFilterWhere(['in', 'PUESTO', (new Query())->select('id_puesto')->from('tbl_plan_puesto')->where(['id_plan' => $planModel->ID_PLAN, 'activo'=>1])]);
    	}
    	
    	$query->andFilterWhere([
    			'ID_TRABAJADOR' => $this->ID_TRABAJADOR,
    			'ID_EMPRESA' => $id_company,
    			'ROL' => $this->ROL,
    			'FECHA_AGREGO' => $this->FECHA_AGREGO,
    			'ACTIVO' => 1,
    	]);
    
    	$query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
    	->andFilterWhere(['like', 'APP', $this->APP])
    	->andFilterWhere(['like', 'APM', $this->APM])
    	->andFilterWhere(['like', 'CURP', $this->CURP])
    	->andFilterWhere(['like', 'RFC', $this->RFC])
    	->andFilterWhere(['like', 'NSS', $this->NSS])
    	->andFilterWhere(['like', 'DOMICILIO', $this->DOMICILIO])
    	->andFilterWhere(['like', 'CORREO_ELECTRONICO', $this->CORREO_ELECTRONICO])
    	->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
    	->andFilterWhere(['like', 'PUESTO', $this->PUESTO])
    	->andFilterWhere(['like', 'OCUPACION_ESPECIFICA', $this->OCUPACION_ESPECIFICA]);
    
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
        $query = Trabajador::find();

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
            'ID_TRABAJADOR' => $this->ID_TRABAJADOR,
            'ID_EMPRESA' => $this->ID_EMPRESA,
            'ROL' => $this->ROL,
            'FECHA_AGREGO' => $this->FECHA_AGREGO,
            'ACTIVO' => $this->ACTIVO,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'APP', $this->APP])
            ->andFilterWhere(['like', 'APM', $this->APM])
            ->andFilterWhere(['like', 'CURP', $this->CURP])
            ->andFilterWhere(['like', 'RFC', $this->RFC])
            ->andFilterWhere(['like', 'NSS', $this->NSS])
            ->andFilterWhere(['like', 'DOMICILIO', $this->DOMICILIO])
            ->andFilterWhere(['like', 'CORREO_ELECTRONICO', $this->CORREO_ELECTRONICO])
            ->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
            ->andFilterWhere(['like', 'PUESTO', $this->PUESTO])
            ->andFilterWhere(['like', 'OCUPACION_ESPECIFICA', $this->OCUPACION_ESPECIFICA]);

        return $dataProvider;
    }
}
