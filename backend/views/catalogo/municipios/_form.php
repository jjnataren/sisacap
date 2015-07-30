<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */
/* @var $form yii\widgets\ActiveForm */

$dataListEntidades=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>Catalogo::CATEGORIA_ENTIDADES_FEDERATIVAS,'ACTIVO'=>1]), 'ID_ELEMENTO', 'NOMBRE');

?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CLAVE')->textInput(['maxlength' => 100]) ?>

   <?= $form->field($model, 'ELEMENTO_PADRE')->dropDownList($dataListEntidades,  ['prompt'=>'-- Seleccione--']); // ->label(false) ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'ACTIVO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

