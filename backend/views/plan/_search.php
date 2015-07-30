<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_PLAN') ?>

    <?= $form->field($model, 'ID_EMPRESA') ?>

    <?= $form->field($model, 'TOTAL_HOMBRES') ?>

    <?= $form->field($model, 'TOTAL_MUJERES') ?>

    <?= $form->field($model, 'OBJETIVO1') ?>

    <?php // echo $form->field($model, 'OBJETIVO_2') ?>

    <?php // echo $form->field($model, 'OBJETIVO_3') ?>

    <?php // echo $form->field($model, 'OBJETIVO_4') ?>

    <?php // echo $form->field($model, 'OBJETIVO_5') ?>

   

    <?php // echo $form->field($model, 'VIGENCIA_INICIO') ?>

    <?php // echo $form->field($model, 'VIGENCIA_FIN') ?>

    <?php // echo $form->field($model, 'NUMERO_ETAPAS') ?>

    <?php // echo $form->field($model, 'NUMERO_CONSTANCIAS_EXPEDIDAS') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
