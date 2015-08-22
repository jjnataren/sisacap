<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\IndicadorCursoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicador-curso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_EVENTO') ?>

    <?= $form->field($model, 'ID_CURSO') ?>

    <?= $form->field($model, 'TITULO') ?>

    <?= $form->field($model, 'DATA') ?>

    <?= $form->field($model, 'CATEGORIA') ?>

    <?php // echo $form->field($model, 'CLAVE') ?>

    <?php // echo $form->field($model, 'ID_ALERTA') ?>

    <?php // echo $form->field($model, 'FECHA_CREACION') ?>

    <?php // echo $form->field($model, 'FECHA_INICIO_VIGENCIA') ?>

    <?php // echo $form->field($model, 'FECHA_FIN_VIGENCIA') ?>

    <?php // echo $form->field($model, 'ESTATUS') ?>

    <?php // echo $form->field($model, 'ACTIVO') ?>

    <?php // echo $form->field($model, 'ID_USUARIO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
