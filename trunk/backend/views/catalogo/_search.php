<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CatalogoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalogo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_ELEMENTO') ?>

    <?= $form->field($model, 'CLAVE') ?>

    <?= $form->field($model, 'ELEMENTO_PADRE') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <?= $form->field($model, 'DESCRIPCION') ?>

    <?php // echo $form->field($model, 'ORDEN') ?>

    <?php // echo $form->field($model, 'CATEGORIA') ?>

    <?php // echo $form->field($model, 'ACTIVO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
