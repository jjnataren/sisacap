<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PuestoEmpresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="puesto-empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CLAVE_PUESTO')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ID_EMPRESA')->textInput() ?>

    <?= $form->field($model, 'NOMBRE_PUESTO')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'DESCRIPCION_PUESTO')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ACTIVO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
