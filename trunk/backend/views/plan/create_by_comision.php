
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Plan */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-calendar fa-stack-1x"></i>
							   </span>';
$this->title = 'Crear planes y programas de capacitación';
$this->params['breadcrumbs'][] = ['label' => 'Comisión ID '.$model->ID_COMISION, 'url'=>['comision-mixta-cap/dashboard', 'id'=>$model->ID_COMISION]];
$this->params['breadcrumbs'][] = ['label' => 'Plan ']
?>
<div class="plan-create">

   

    <?= $this->render('_form_by_comision', [
        'model' => $model,
    		'dataProvider'=>$dataProvider,
    		'searchModel'=>$searchModel
    ]) ?>

</div>
