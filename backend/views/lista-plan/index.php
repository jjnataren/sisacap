<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ListaPlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Plans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-plan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lista Plan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_LISTA',
            'ID_PLAN',
            'FECHA_CREACION',
            'FECHA_ELABORACION',
            'ESTATUS',
            // 'ACTIVO',
            // 'DOCUMENTO_PROBATORIO',
            // 'NOMBRE_DOC_PROB',
            // 'ID_EMPRESA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
