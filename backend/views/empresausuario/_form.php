<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmpresaUsuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_EMPRESA')->textInput() ?>

    <?= $form->field($model, 'ID_USUARIO')->textInput() ?>

    <?= $form->field($model, 'ACTIVO')->textInput() ?>

    <?= $form->field($model, 'FECHA_AGREGO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
