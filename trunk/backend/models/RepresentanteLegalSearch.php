<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RepresentanteLegal;

/**
 * RepresentanteLegalSearch represents the model behind the search form about `app\models\RepresentanteLegal`.
 */
class RepresentanteLegalSearch extends RepresentanteLegal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_REPRESENTANTE_LEGAL', 'ACTIVO'], 'integer'],
            [['NOMBRE', 'APP', 'APM', 'FEC_NAC', 'CURP', 'RFC', 'DOMICILIO', 'TELEFONO', 'CORREO_ELECTRONICO', 'NSS'], 'safe'],
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
        $query = RepresentanteLegal::find();

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
            'ID_REPRESENTANTE_LEGAL' => $this->ID_REPRESENTANTE_LEGAL,
            'FEC_NAC' => $this->FEC_NAC,
            'ACTIVO' => $this->ACTIVO,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'APP', $this->APP])
            ->andFilterWhere(['like', 'APM', $this->APM])
            ->andFilterWhere(['like', 'CURP', $this->CURP])
            ->andFilterWhere(['like', 'RFC', $this->RFC])
            ->andFilterWhere(['like', 'DOMICILIO', $this->DOMICILIO])
            ->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
            ->andFilterWhere(['like', 'CORREO_ELECTRONICO', $this->CORREO_ELECTRONICO])
            ->andFilterWhere(['like', 'NSS', $this->NSS]);

        return $dataProvider;
    }
}
