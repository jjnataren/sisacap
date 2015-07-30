<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorComision */

$this->title = $model->ID_EVENTO;
$this->params['breadcrumbs'][] = ['label' => 'Indicador Comisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicador-comision-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_EVENTO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_EVENTO], [
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
            'ID_EVENTO',
            'ID_COMISION',
            'ID_USUARIO',
            'DESCRIPCION',
            'CATEGORIA',
            'ID_OBJETO',
            'ID_ALERTA',
            'DATA',
            'FECHA_CREACION',
            'ACTIVO',
            'FECHA_INICIO_VIGENCIA',
            'FECHA_FIN_VIGENCIA',
        ],
    ]) ?>

</div>
