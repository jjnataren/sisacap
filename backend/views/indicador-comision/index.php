<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\IndicadorComisionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indicador Comisions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicador-comision-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Indicador Comision', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_EVENTO',
            'ID_COMISION',
            'ID_USUARIO',
            'DESCRIPCION',
            'CATEGORIA',
            // 'ID_OBJETO',
            // 'ID_ALERTA',
            // 'DATA',
            // 'FECHA_CREACION',
            // 'ACTIVO',
            // 'FECHA_INICIO_VIGENCIA',
            // 'FECHA_FIN_VIGENCIA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
