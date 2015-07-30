<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RepresentanteLegal */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-suitcase fa-stack-1x"></i>
							   </span>';

$this->title = 'Crear nuevo representante legal';
$this->params['breadcrumbs'][] = ['label' => 'Representantes Legales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representante-legal-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
