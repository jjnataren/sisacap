<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PuestoEmpresa */
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-user-secret fa-stack-1x"></i>
							   </span>';
$this->title = 'Actualizar puesto : ' . ' ' . $model->NOMBRE_PUESTO;
$this->params['breadcrumbs'][] = ['label' => 'Puestos', 'url' => ['indexbycompany']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PUESTO, 'url' => ['viewbycompany', 'id' => $model->ID_PUESTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="puesto-empresa-update">

  
    <?= $this->render('_form_by_company', [
        'model' => $model,
    ]) ?>

</div>