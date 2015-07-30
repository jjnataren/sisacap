<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Plan */

$this->title = $model->ID_PLAN;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['Actualizar', 'id' => $model->ID_PLAN], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['Borrar', 'id' => $model->ID_PLAN], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_PLAN',
            'ID_EMPRESA',
            'TOTAL_HOMBRES',
            'TOTAL_MUJERES',
            'OBJETIVO1',
            'OBJETIVO2',
            'OBJETIVO3',
            'OBJETIVO4',
            'OBJETIVO5',
         
            'VIGENCIA_INICIO',
            'VIGENCIA_FIN',
            'NUMERO_ETAPAS',
            'NUMERO_CONSTANCIAS_EXPEDIDAS',
        ],
    ]) ?>

</div>
