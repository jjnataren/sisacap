<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ListaPlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lista-plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_LISTA') ?>

    <?= $form->field($model, 'ID_PLAN') ?>

    <?= $form->field($model, 'FECHA_CREACION') ?>

    <?= $form->field($model, 'FECHA_ELABORACION') ?>

    <?= $form->field($model, 'ESTATUS') ?>

    <?php // echo $form->field($model, 'ACTIVO') ?>

    <?php // echo $form->field($model, 'DOCUMENTO_PROBATORIO') ?>

    <?php // echo $form->field($model, 'NOMBRE_DOC_PROB') ?>

    <?php // echo $form->field($model, 'ID_EMPRESA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
