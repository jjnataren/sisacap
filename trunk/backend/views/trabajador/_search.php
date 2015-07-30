<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\TrabajadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trabajador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_TRABAJADOR') ?>

    <?= $form->field($model, 'ID_EMPRESA') ?>

    <?= $form->field($model, 'ROL') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <?= $form->field($model, 'APP') ?>

    <?php // echo $form->field($model, 'APM') ?>

    <?php // echo $form->field($model, 'CURP') ?>

    <?php // echo $form->field($model, 'RFC') ?>

    <?php // echo $form->field($model, 'NSS') ?>

    <?php // echo $form->field($model, 'DOMICILIO') ?>

    <?php // echo $form->field($model, 'CORREO_ELECTRONICO') ?>

    <?php // echo $form->field($model, 'TELEFONO') ?>

    <?php // echo $form->field($model, 'PUESTO') ?>

    <?php // echo $form->field($model, 'OCUPACION_ESPECIFICA') ?>

    <?php // echo $form->field($model, 'FECHA_AGREGO') ?>

    <?php // echo $form->field($model, 'ACTIVO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
