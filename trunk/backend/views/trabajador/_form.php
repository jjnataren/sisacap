<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');

?>

<div class="trabajador-form">

    <?php $form = ActiveForm::begin(); ?>
    
      <div class=" col-xs-12 col-sm-12 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3><i class="glyphicon glyphicon-plus"></i>
						
						<?= Yii::t('backend', 'Agregar datos') ?> <small>Trabajador</small> </h3>	
					</div>
					<div class="panel-body">
		
    

    <?php if( Yii::$app->user->can('administrator') ){ ?>
    
    <?= $form->field($model, 'ID_EMPRESA')->textInput() ?>
    
    <?php }?>

    <?= $form->field($model, 'ROL')->textInput() ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'APP')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'APM')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'CURP')->textInput(['maxlength' => 18]) ?>

     <?= $form->field($model, 'RFC')->textInput(['maxlength' => 13]) ?>

     	   <?= $form->field($model, 'NSS')->textInput(['maxlength' => 20]) ?>
    </div>
    </div>
    </div>
    
     <div class=" col-xs-12 col-sm-12 col-md-6">
				<div class="panel panel-primary">
					
					
					
					<div class="panel-body">



   
					
    <?= $form->field($model, 'DOMICILIO')->textArea(['maxlength' => 300]) ?>
    
    <?= $form->field($model, 'CORREO_ELECTRONICO')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'TELEFONO')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'PUESTO')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'OCUPACION_ESPECIFICA')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'FECHA_AGREGO')->textInput() ?>

    <?= $form->field($model, 'ACTIVO')->textInput() ?>

    
    	<div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Aquí podras crear nuevos trabajadores para la empresa, Es importante llenar todos los campos correctamente. Presiona el botón [Crear] para guardar sus datos') ?>"><i class="fa fa-question-circle"></i>
						</button>
             <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Crear', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    
   
    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
