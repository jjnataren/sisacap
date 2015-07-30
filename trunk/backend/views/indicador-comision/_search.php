<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\IndicadorComisionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicador-comision-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_EVENTO') ?>

    <?= $form->field($model, 'ID_COMISION') ?>

    <?= $form->field($model, 'ID_USUARIO') ?>

    <?= $form->field($model, 'DESCRIPCION') ?>

    <?= $form->field($model, 'CATEGORIA') ?>

    <?php // echo $form->field($model, 'ID_OBJETO') ?>

    <?php // echo $form->field($model, 'ID_ALERTA') ?>

    <?php // echo $form->field($model, 'DATA') ?>

    <?php // echo $form->field($model, 'FECHA_CREACION') ?>

    <?php // echo $form->field($model, 'ACTIVO') ?>

    <?php // echo $form->field($model, 'FECHA_INICIO_VIGENCIA') ?>

    <?php // echo $form->field($model, 'FECHA_FIN_VIGENCIA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
