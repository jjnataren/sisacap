<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ComisionMixtaCap */

$this->title = 'Actualizar Comision Mixta Cap: '; // $model->ID_COMISION_MIXTA;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="glyphicon glyphicon-copyright-mark  -lg  fa-stack-1x"></i>
							   </span>';

//$this->params['breadcrumbs'][] = ['label' => 'Comision Mixta Caps', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_COMISION_MIXTA, 'url' => ['view', 'id' => $model->ID_COMISION_MIXTA]];
$this->params['breadcrumbs'][] =  $this->title;
?>


<?= $this->render('_form_by_company', [
        'model' => $model,
    ]) ?>