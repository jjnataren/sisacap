<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComisionMixtaCapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comision Mixta Caps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comision-mixta-cap-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comision Mixta Cap', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_COMISION_MIXTA',
            'ID_EMPRESA',
            'COMISION_MIXTA_PADRE',
            'NUMERO_INTEGRANTES',
            'FECHA_CONSTITUCION',
            // 'FECHA_ELABORACION',
            // 'ACTIVO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
