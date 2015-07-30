<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PuestoEmpresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="puesto-empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_PUESTO') ?>

    <?= $form->field($model, 'CLAVE_PUESTO') ?>

    <?= $form->field($model, 'ID_EMPRESA') ?>

    <?= $form->field($model, 'NOMBRE_PUESTO') ?>

    <?= $form->field($model, 'DESCRIPCION_PUESTO') ?>

    <?php // echo $form->field($model, 'ACTIVO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
