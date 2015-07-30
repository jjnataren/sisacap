<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmpresaUsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_EMPRESA') ?>

    <?= $form->field($model, 'ID_USUARIO') ?>

    <?= $form->field($model, 'ACTIVO') ?>

    <?= $form->field($model, 'FECHA_AGREGO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
