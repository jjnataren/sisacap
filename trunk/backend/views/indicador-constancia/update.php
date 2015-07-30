<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorConstancia */

$this->title = 'Update Indicador Constancia: ' . ' ' . $model->ID_EVENTO;
$this->params['breadcrumbs'][] = ['label' => 'Indicador Constancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_EVENTO, 'url' => ['view', 'id' => $model->ID_EVENTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indicador-constancia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
