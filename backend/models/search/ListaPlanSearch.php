<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ListaPlan;

/**
 * ListaPlanSearch represents the model behind the search form about `backend\models\ListaPlan`.
 */
class ListaPlanSearch extends ListaPlan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_LISTA', 'ID_PLAN', 'ESTATUS', 'ACTIVO', 'ID_EMPRESA'], 'integer'],
            [['FECHA_CREACION', 'FECHA_ELABORACION', 'DOCUMENTO_PROBATORIO', 'NOMBRE_DOC_PROB'], 'safe'],
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
        $query = ListaPlan::find();

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
            'ID_LISTA' => $this->ID_LISTA,
            'ID_PLAN' => $this->ID_PLAN,
            'FECHA_CREACION' => $this->FECHA_CREACION,
            'ESTATUS' => $this->ESTATUS,
            'ACTIVO' => $this->ACTIVO,
            'ID_EMPRESA' => $this->ID_EMPRESA,
        ]);

        $query->andFilterWhere(['like', 'FECHA_ELABORACION', $this->FECHA_ELABORACION])
            ->andFilterWhere(['like', 'DOCUMENTO_PROBATORIO', $this->DOCUMENTO_PROBATORIO])
            ->andFilterWhere(['like', 'NOMBRE_DOC_PROB', $this->NOMBRE_DOC_PROB]);

        return $dataProvider;
    }
}
