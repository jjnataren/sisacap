<?php

use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-users fa-stack-1x"></i>
							   </span>';

$this->title = Yii::t('backend', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    
        <?= Html::a(Yii::t('backend', '<i class="fa fa-users"></i> Crear {modelClass}', [
    'modelClass' => 'usuario',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
            'email:email',
            [
                'class'=>\common\components\grid\EnumColumn::className(),
                'attribute'=>'role',
                'enum'=>User::getRoles(),
                'filter'=>User::getRoles()
            ],
            [
                'class'=>\common\components\grid\EnumColumn::className(),
                'attribute'=>'status',
                'enum'=>User::getStatuses(),
                'filter'=>User::getStatuses()
            ],
            'created_at:datetime',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
