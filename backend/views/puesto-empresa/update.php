<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PuestoEmpresa */

$this->title = 'Update Puesto Empresa: ' . ' ' . $model->ID_PUESTO;
$this->params['breadcrumbs'][] = ['label' => 'Puesto Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PUESTO, 'url' => ['view', 'id' => $model->ID_PUESTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="puesto-empresa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
