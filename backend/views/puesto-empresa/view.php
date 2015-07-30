<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PuestoEmpresa */

$this->title = $model->ID_PUESTO;
$this->params['breadcrumbs'][] = ['label' => 'Puesto Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puesto-empresa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_PUESTO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_PUESTO], [
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
            'ID_PUESTO',
            'CLAVE_PUESTO',
            'ID_EMPRESA',
            'NOMBRE_PUESTO',
            'DESCRIPCION_PUESTO',
            'ACTIVO',
        ],
    ]) ?>

</div>
