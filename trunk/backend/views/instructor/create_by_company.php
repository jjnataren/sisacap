<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */
$this->title = 'Crear establecimiento';
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-graduation-cap -lg fa-stack-1x"></i>
							   </span>';
$this->title = 'Crear instructor';
$this->params['breadcrumbs'][] = ['label' => 'Instructores', 'url' => ['indexbycompany']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-create">

    <?= $this->render('_form_by_company', [
    		'userModel' => $userModel,
        'model' => $model,
    ]) ?>

</div>
