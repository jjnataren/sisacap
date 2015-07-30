<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmpresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_EMPRESA') ?>

    <?= $form->field($model, 'ID_REPRESENTANTE_LEGAL') ?>

    <?= $form->field($model, 'NOMBRE_RAZON_SOCIAL') ?>

    <?= $form->field($model, 'RFC') ?>

    <?= $form->field($model, 'NSS') ?>

    <?php // echo $form->field($model, 'CURP') ?>

    <?php // echo $form->field($model, 'MORAL') ?>

    <?php // echo $form->field($model, 'CALLE') ?>

    <?php // echo $form->field($model, 'NUMERO_EXTERIOR') ?>

    <?php // echo $form->field($model, 'NUMERO_INTERIOR') ?>

    <?php // echo $form->field($model, 'COLONIA') ?>

    <?php // echo $form->field($model, 'ENTIDAD_FEDERATIVA') ?>

    <?php // echo $form->field($model, 'LOCALIDAD') ?>

    <?php // echo $form->field($model, 'TELEFONO') ?>

    <?php // echo $form->field($model, 'MUNICIPIO_DELEGACION') ?>

    <?php // echo $form->field($model, 'GIRO_PRINCIPAL') ?>

    <?php // echo $form->field($model, 'NUMERO_TRABAJADORES') ?>

    <?php // echo $form->field($model, 'CODIGO_POSTAL') ?>

    <?php // echo $form->field($model, 'FAX') ?>

    <?php // echo $form->field($model, 'CORREO_ELECTRONICO') ?>

    <?php // echo $form->field($model, 'ACTIVO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
