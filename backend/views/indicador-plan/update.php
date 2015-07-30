<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorPlan */

$this->title = 'Update Indicador Plan: ' . ' ' . $model->ID_EVENTO;
$this->params['breadcrumbs'][] = ['label' => 'Indicador Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_EVENTO, 'url' => ['view', 'id' => $model->ID_EVENTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indicador-plan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
