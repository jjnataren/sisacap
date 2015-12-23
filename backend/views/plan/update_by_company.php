<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Plan */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-calendar fa-stack-1x"></i>
							   </span>';

$this->title = 'Actualizar plan de capacitación: Id  ' . ' ' . $model->ID_PLAN;

$this->params['breadcrumbs'][] = ['label' => 'Comisión ID '.$model->ID_COMISION, 'url'=>['comision-mixta-cap/dashboard', 'id'=>$model->ID_COMISION]];
//$this->params['breadcrumbs'][] = ['label' =>'Actualizar plan'.'ID' . $model->ID_PLAN, 'url' => ['view', 'id' => $model->ID_PLAN]];
$this->params['breadcrumbs'][] = 'Actualizar plan ' .'Id '. $model->ID_PLAN;
?>
<div class="plan-update">

    

    <?= $this->render('_from_update_plan', [
        'model' => $model,
    		'dataProvider'=>$dataProvider,
    		'searchModel'=>$searchModel
    ]) ?>

</div>
