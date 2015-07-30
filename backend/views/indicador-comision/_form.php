<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorComision */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicador-comision-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_COMISION')->textInput() ?>

    <?= $form->field($model, 'ID_USUARIO')->textInput() ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'CATEGORIA')->textInput() ?>

    <?= $form->field($model, 'ID_OBJETO')->textInput() ?>

    <?= $form->field($model, 'ID_ALERTA')->textInput() ?>

    <?= $form->field($model, 'DATA')->textInput(['maxlength' => 2048]) ?>

    <?= $form->field($model, 'FECHA_CREACION')->textInput() ?>

    <?= $form->field($model, 'ACTIVO')->textInput() ?>

    <?= $form->field($model, 'FECHA_INICIO_VIGENCIA')->textInput() ?>

    <?= $form->field($model, 'FECHA_FIN_VIGENCIA')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
