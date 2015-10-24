<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */
/* @var $form yii\widgets\ActiveForm */

//$dataListArea=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>Catalogo::CATEGORIA_AREA_TEMATI,'ACTIVO'=>1]), 'ID_ELEMENTO', 'NOMBRE');
$itemsAct = [1=>'Activo',0=>'No activo'];
?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CLAVE')->textInput(['maxlength' => 100]) ?>

  
    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'ACTIVO')->dropDownList($itemsAct,['prompt'=>'-- Seleccione  --','id' => 'tex-sex']) ?>
  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

