<?php
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Curso */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-laptop  fa-stack-1x"></i>
							   </span>';

$this->title = 'Crear curso del plan';
$this->params['breadcrumbs'][] = ['label' => 'Curso', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-create">

   

    <?= $this->render('_form_by_empresa', [
        'model' => $model,
    		'dataProvider'=>$dataProvider,
    		'searchModel'=>$searchModel
    ]) ?>

</div>
