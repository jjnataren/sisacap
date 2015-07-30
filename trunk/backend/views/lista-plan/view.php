<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ListaPlan */

$this->title = $model->ID_LISTA;
$this->params['breadcrumbs'][] = ['label' => 'Lista Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_LISTA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_LISTA], [
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
            'ID_LISTA',
            'ID_PLAN',
            'FECHA_CREACION',
            'FECHA_ELABORACION',
            'ESTATUS',
            'ACTIVO',
            'DOCUMENTO_PROBATORIO',
            'NOMBRE_DOC_PROB',
            'ID_EMPRESA',
        ],
    ]) ?>

</div>
