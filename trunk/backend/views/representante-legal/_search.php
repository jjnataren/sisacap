<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RepresentanteLegalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="representante-legal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_REPRESENTANTE_LEGAL') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <?= $form->field($model, 'APP') ?>

    <?= $form->field($model, 'APM') ?>

    <?= $form->field($model, 'FEC_NAC') ?>

    <?php // echo $form->field($model, 'CURP') ?>

    <?php // echo $form->field($model, 'RFC') ?>

    <?php // echo $form->field($model, 'DOMICILIO') ?>

    <?php // echo $form->field($model, 'TELEFONO') ?>

    <?php // echo $form->field($model, 'CORREO_ELECTRONICO') ?>

    <?php // echo $form->field($model, 'ACTIVO') ?>

    <?php // echo $form->field($model, 'NSS') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
