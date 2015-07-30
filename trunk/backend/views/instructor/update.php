<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */

$this->title = 'Update Instructor: ' . ' ' . $model->ID_INSTRUCTOR;
$this->params['breadcrumbs'][] = ['label' => 'Instructors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_INSTRUCTOR, 'url' => ['view', 'id' => $model->ID_INSTRUCTOR]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instructor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
