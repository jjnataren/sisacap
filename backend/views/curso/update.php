<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Curso */

$this->title = 'Update Curso: ' . ' ' . $model->ID_CURSO;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_CURSO, 'url' => ['view', 'id' => $model->ID_CURSO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="curso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
