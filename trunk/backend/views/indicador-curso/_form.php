<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorCurso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicador-curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_CURSO')->textInput() ?>

    <?= $form->field($model, 'TITULO')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'DATA')->textInput(['maxlength' => 2048]) ?>

    <?= $form->field($model, 'CATEGORIA')->textInput() ?>

    <?= $form->field($model, 'CLAVE')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'ID_ALERTA')->textInput() ?>

    <?= $form->field($model, 'FECHA_CREACION')->textInput() ?>

    <?= $form->field($model, 'FECHA_INICIO_VIGENCIA')->textInput() ?>

    <?= $form->field($model, 'FECHA_FIN_VIGENCIA')->textInput() ?>

    <?= $form->field($model, 'ESTATUS')->textInput() ?>

    <?= $form->field($model, 'ACTIVO')->textInput() ?>

    <?= $form->field($model, 'ID_USUARIO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
