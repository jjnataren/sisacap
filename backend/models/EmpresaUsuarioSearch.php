<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EmpresaUsuario;

/**
 * EmpresaUsuarioSearch represents the model behind the search form about `backend\models\EmpresaUsuario`.
 */
class EmpresaUsuarioSearch extends EmpresaUsuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EMPRESA', 'ID_USUARIO', 'ACTIVO'], 'integer'],
            [['FECHA_AGREGO'], 'safe'],
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
        $query = EmpresaUsuario::find();

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
            'ID_EMPRESA' => $this->ID_EMPRESA,
            'ID_USUARIO' => $this->ID_USUARIO,
            'ACTIVO' => $this->ACTIVO,
            'FECHA_AGREGO' => $this->FECHA_AGREGO,
        ]);

        return $dataProvider;
    }
}
