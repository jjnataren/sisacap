<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\InstructorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instructor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_INSTRUCTOR') ?>

    <?= $form->field($model, 'ID_EMPRESA') ?>

    <?= $form->field($model, 'NOMBRE_AGENTE_EXTERNO') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <?= $form->field($model, 'APP') ?>

    <?php // echo $form->field($model, 'APM') ?>

    <?php // echo $form->field($model, 'DOMICILIO') ?>

    <?php // echo $form->field($model, 'TELEFONO') ?>

    <?php // echo $form->field($model, 'CORREO_ELECTRONICO') ?>

    <?php // echo $form->field($model, 'LOGOTIPO') ?>

    <?php // echo $form->field($model, 'NUM_REGISTRO_AGENTE_EXTERNO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
