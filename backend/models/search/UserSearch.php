<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;
use yii\base\Object;
use yii\db\Query;
/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email'], 'safe'],
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'role' => $this->role,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
    
    
    /**
     * Creates data provider instance with search query applied
     * filters -not assigned 
     * 			-only instructor role
     * @return ActiveDataProvider
     */
    public function searchInstructorNotAssigned($params)
    {
    	$query = User::find();
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    	]);
    
    	$this->load($params);
    
    	$query->andFilterWhere(['not in', 'id', (new Query())->select('ID_USUARIO')->from('tbl_empresa_usuario')]);
    
    	$query->andFilterWhere([
    			'id' => $this->id,
    			'role' => 7,
    			'status' => $this->status,
    			'created_at' => $this->created_at,
    			'updated_at' => $this->updated_at,
    	]);
    	 
    	 
    
    	$query->andFilterWhere(['like', 'username', $this->username])
    	->andFilterWhere(['like', 'auth_key', $this->auth_key])
    	->andFilterWhere(['like', 'password_hash', $this->password_hash])
    	->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
    	->andFilterWhere(['like', 'email', $this->email]);
    
    	return $dataProvider;
    }
    
    
    /**
     * Creates data provider instance with search query applied
     * @return ActiveDataProvider
     */
    public function searchNotAssigned($params)
    {
    	$query = User::find();
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    	]);
    
    	$this->load($params);
    
    	$query->andFilterWhere(['not in', 'id', (new Query())->select('ID_USUARIO')->from('tbl_empresa_usuario')]);
    	 
    	 
    	
    	
    	$query->andFilterWhere([
    			'id' => $this->id,
    			'role' => 5,
    			'status' => $this->status,
    			'created_at' => $this->created_at,
    			'updated_at' => $this->updated_at,
    	]);
    	
    	
    
    	$query->andFilterWhere(['like', 'username', $this->username])
    	->andFilterWhere(['like', 'auth_key', $this->auth_key])
    	->andFilterWhere(['like', 'password_hash', $this->password_hash])
    	->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
    	->andFilterWhere(['like', 'email', $this->email]);
    
    	return $dataProvider;
    }
    
}
