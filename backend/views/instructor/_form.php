<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instructor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_EMPRESA')->textInput() ?>

    <?= $form->field($model, 'NOMBRE_AGENTE_EXTERNO')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'APP')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'APM')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'DOMICILIO')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'TELEFONO')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'CORREO_ELECTRONICO')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'LOGOTIPO')->textInput() ?>

    <?= $form->field($model, 'NUM_REGISTRO_AGENTE_EXTERNO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
