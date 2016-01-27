<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RepresentanteLegal */

$this->title = 'Actualizar mi representante legal.' ;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-suitcase -lg  fa-stack-1x"></i>
							   </span>';

$this->params['breadcrumbs'][] = ['label' => 'Representante legal', 'url' => ['viewbycompany']];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="representante-legal-update">

    

    <?= $this->render('_form_by_company', [
        'model' => $model,
    ]) ?>

</div>
