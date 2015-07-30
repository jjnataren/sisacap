<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Catalogo;

/**
 * CatalogoSearch represents the model behind the search form about `backend\models\Catalogo`.
 */
class CatalogoSearch extends Catalogo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ELEMENTO', 'ELEMENTO_PADRE', 'ORDEN', 'CATEGORIA', 'ACTIVO'], 'integer'],
            [['CLAVE', 'NOMBRE', 'DESCRIPCION'], 'safe'],
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
        $query = Catalogo::find();

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
            'ID_ELEMENTO' => $this->ID_ELEMENTO,
            'ELEMENTO_PADRE' => $this->ELEMENTO_PADRE,
            'ORDEN' => $this->ORDEN,
            'CATEGORIA' => $this->CATEGORIA,
            'ACTIVO' => $this->ACTIVO,
        ]);

        $query->andFilterWhere(['like', 'CLAVE', $this->CLAVE])
            ->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION]);

        return $dataProvider;
    }
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchByCategoria($params,$id_categoria)
    {
    	$query = Catalogo::find();
    
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
    			'ID_ELEMENTO' => $this->ID_ELEMENTO,
    			'ELEMENTO_PADRE' => $this->ELEMENTO_PADRE,
    			'ORDEN' => $this->ORDEN,
    			'CATEGORIA' => $id_categoria,
    			'ACTIVO' => $this->ACTIVO,
    	]);
    
    	$query->andFilterWhere(['like', 'CLAVE', $this->CLAVE])
    	->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
    	->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION]);
    
    	return $dataProvider;
    }
}
