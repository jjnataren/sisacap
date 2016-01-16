<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ListaPlan */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="glyphicon glyphicon-list-alt  fa-stack-1x"></i>
							   </span>';




$this->title = 'Crear nuevo reporte listas de constancias';
$this->params['breadcrumbs'][] = ['label' => 'Plan ID '.$id_plan, 'url' => ['plan/dashboard', 'id'=>$id_plan]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">

<div class="col-md-9  col-xs-12 col-sm-12 col-md-offset-3">

    <?= $this->render('_form_by_plan', [
        'model' => $model,
    ]) ?>

    </div>
    
</div>
