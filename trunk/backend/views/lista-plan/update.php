<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ListaPlan */

$this->title = 'Actualizar lista plan: ' . ' ' . $model->ID_LISTA;
$this->params['breadcrumbs'][] = ['label' => 'Lista Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_LISTA, 'url' => ['view', 'id' => $model->ID_LISTA]];

?>
<div class="lista-plan-update">


    <?= $this->render('_form_by_plan', [
        'model' => $model,
    ]) ?>

</div>
