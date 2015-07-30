<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorComision */

$this->title = 'Update Indicador Comision: ' . ' ' . $model->ID_EVENTO;
$this->params['breadcrumbs'][] = ['label' => 'Indicador Comisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_EVENTO, 'url' => ['view', 'id' => $model->ID_EVENTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indicador-comision-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
