<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-building fa-stack-1x"></i>
							   </span>';

$this->title = 'Crear nueva empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
