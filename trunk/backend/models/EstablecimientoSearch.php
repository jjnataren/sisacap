<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Establecimiento;

/**
 * EstablecimientoSearch represents the model behind the search form about `backend\models\Establecimiento`.
 */
class EstablecimientoSearch extends Establecimiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTABLECIMIENTO', 'ID_EMPRESA', 'ACTIVO'], 'integer'],
            [['NOMBRE', 'DOMICILIO', 'RFC', 'IMSS'], 'safe'],
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
    public function searchByCompany($params,$id)
    {
    	$query = Establecimiento::find();
    
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
    			'ID_ESTABLECIMIENTO' => $this->ID_ESTABLECIMIENTO,
    			'ID_EMPRESA' => $id,
    			'ACTIVO' => $this->ACTIVO,
    			]);
    
    	$query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
    	->andFilterWhere(['like', 'DOMICILIO', $this->DOMICILIO])
    	->andFilterWhere(['like', 'RFC', $this->RFC])
    	->andFilterWhere(['like', 'IMSS', $this->IMSS]);
    
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
        $query = Establecimiento::find();

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
            'ID_ESTABLECIMIENTO' => $this->ID_ESTABLECIMIENTO,
            'ID_EMPRESA' => $this->ID_EMPRESA,
            'ACTIVO' => $this->ACTIVO,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'DOMICILIO', $this->DOMICILIO])
            ->andFilterWhere(['like', 'RFC', $this->RFC])
            ->andFilterWhere(['like', 'IMSS', $this->IMSS]);

        return $dataProvider;
    }
}
