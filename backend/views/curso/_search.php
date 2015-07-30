<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CursoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_CURSO') ?>

    <?= $form->field($model, 'ID_PLAN') ?>

    <?= $form->field($model, 'ID_INSTRUCTOR') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <?= $form->field($model, 'DURACION_HORAS') ?>

    <?php // echo $form->field($model, 'FECHA_INICIO') ?>

    <?php // echo $form->field($model, 'FECHA_TERMINO') ?>

    <?php // echo $form->field($model, 'AREA_TEMATICA') ?>

    <?php // echo $form->field($model, 'MODALIDAD_CAPACITACION') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
