<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */

$this->title = 'Actualizar trabajador: ' . ' ' . $model->NOMBRE.' '. $model->APP;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-users fa-lg  fa-stack-1x"></i>
							   </span>';
$this->params['breadcrumbs'][] = ['label' => 'Trabajadores', 'url' => ['indexcompany']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_TRABAJADOR, 'url' => ['viewbycompany', 'id' => $model->ID_TRABAJADOR]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="trabajador-update">

   

    <?= $this->render('_company_form', [
        'model' => $model,
    ]) ?>

</div>
