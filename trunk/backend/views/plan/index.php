<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Plan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PLAN',
            'ID_EMPRESA',
            'TOTAL_HOMBRES',
            'TOTAL_MUJERES',
            'OBJETIVO1',
            // 'OBJETIVO2',
            // 'OBJETIVO3',
            // 'OBJETIVO4',
            // 'OBJETIVO5',
           
            // 'VIGENCIA_INICIO',
            // 'VIGENCIA_FIN',
            // 'NUMERO_ETAPAS',
            // 'NUMERO_CONSTANCIAS_EXPEDIDAS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
