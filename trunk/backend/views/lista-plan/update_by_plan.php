<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ListaPlan */

$this->title = 'Actualizar reporte de constancias emitidas';
$this->params['breadcrumbs'][] = ['label' => 'Plan ID '.$model->ID_PLAN, 'url' => ['plan/dashboard', 'id'=>$model->ID_PLAN]];
$this->params['breadcrumbs'][] = ['label' => 'Reporte ID '.$model->ID_LISTA, 'url' => ['lista-plan/dashboard', 'id'=>$model->ID_LISTA]];

?>
<div class="row">

<div class="col-md-9  col-xs-12 col-sm-12 col-md-offset-3">

    <?= $this->render('_form_by_plan', [
        'model' => $model,
    ]) ?>

    </div>
    
</div>
