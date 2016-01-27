<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ComisionMixtaCap */

$this->title = 'Crear comisión mixta de capacitación.'; 
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="glyphicon glyphicon-copyright-mark -lg  fa-stack-1x"></i>
							   </span>';

$this->params['breadcrumbs'][] = ['label' => 'Comisión mixta caps', 'url' => ['indexbycompany']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comision-mixta-cap-create">

    

    <?= $this->render('_form_by_company', [
        'model' => $model,
    ]) ?>

</div>
