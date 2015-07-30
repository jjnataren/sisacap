<?php

use yii\helpers\Html;
use backend\models\Empresa;


/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = 'Crear establecimiento';
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-university -lg fa-stack-1x"></i>
							   </span>';

$this->params['breadcrumbs'][] = ['label' => 'Establecimiento', 'url' => ['establishments', 'id'=>$model->ID_EMPRESA]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-create">


    <?= $this->render('_establishment_form.php', [
        'model' => new Empresa(),
    ]) ?>

</div>
