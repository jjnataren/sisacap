<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */

$this->title = 'Actualizar mi instructor/capacitador '.' '.'ID' . '-' . $model->ID_INSTRUCTOR;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-graduation-cap -lg  fa-stack-1x"></i>
							   </span>';

$this->params['breadcrumbs'][] = ['label' => 'Instructores', 'url' => ['indexbycompany']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_INSTRUCTOR, 'url' => ['viewbycompany', 'id' => $model->ID_INSTRUCTOR]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="instructor-update">

   

    <?= $this->render('_form_by_company', [
        'model' => $model,
    		'userModel' => $userModel,
    ]) ?>

</div>
