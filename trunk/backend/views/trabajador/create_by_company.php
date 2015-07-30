<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */

$this->title = 'Crear trabajador';
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-users fa-lg  fa-stack-1x"></i>
							   </span>';
$this->params['breadcrumbs'][] = ['label' => 'Trabajadores', 'url' => ['indexcompany']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajador-create">



    <?= $this->render('_from_crear', [
        'model' => $model,
    ]) ?>

</div>
