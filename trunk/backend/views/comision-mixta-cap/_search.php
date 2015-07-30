<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ComisionMixtaCapSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comision-mixta-cap-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_COMISION_MIXTA') ?>

    <?= $form->field($model, 'ID_EMPRESA') ?>

    <?= $form->field($model, 'COMISION_MIXTA_PADRE') ?>

    <?= $form->field($model, 'NUMERO_INTEGRANTES') ?>

    <?= $form->field($model, 'FECHA_CONSTITUCION') ?>

    <?php // echo $form->field($model, 'FECHA_ELABORACION') ?>

    <?php // echo $form->field($model, 'ACTIVO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
