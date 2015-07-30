<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PuestoEmpresa;

/**
 * PuestoEmpresaSearch represents the model behind the search form about `backend\models\PuestoEmpresa`.
 */
class PuestoEmpresaSearch extends PuestoEmpresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PUESTO', 'ID_EMPRESA', 'ACTIVO'], 'integer'],
            [['CLAVE_PUESTO', 'NOMBRE_PUESTO', 'DESCRIPCION_PUESTO'], 'safe'],
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
        $query = PuestoEmpresa::find();

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
            'ID_PUESTO' => $this->ID_PUESTO,
            'ID_EMPRESA' => $this->ID_EMPRESA,
            'ACTIVO' => $this->ACTIVO,
        ]);

        $query->andFilterWhere(['like', 'CLAVE_PUESTO', $this->CLAVE_PUESTO])
            ->andFilterWhere(['like', 'NOMBRE_PUESTO', $this->NOMBRE_PUESTO])
            ->andFilterWhere(['like', 'DESCRIPCION_PUESTO', $this->DESCRIPCION_PUESTO]);

        return $dataProvider;
    }
    
    
    
    public function searchByCompany($params, $id)
    {
    
    
    	$query = PuestoEmpresa::find();
    
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
    			'ID_PUESTO' => $this->ID_PUESTO,
    			'ID_EMPRESA' => $id,
    			'CLAVE_PUESTO' => $this->CLAVE_PUESTO,
    			'NOMBRE_PUESTO' => $this->NOMBRE_PUESTO,
    			'DESCRIPCION_PUESTO' => $this->DESCRIPCION_PUESTO,
    			'ACTIVO' => $this->ACTIVO,
    			]);
    
    	return $dataProvider;
    }
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


