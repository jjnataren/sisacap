<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use kartik\file\FileInput;
use kartik\password\PasswordInput;

/* @var $this yii\web\View */
/* @var $model app\models\RepresentanteLegal */
/* @var $form yii\widgets\ActiveForm */


$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');

$itemsAct = [1=>'Activo',0=>'No activo'];
?>

<div class="row">

  <div class=" col-xs-12 col-sm-12 col-md-12">
  
    <?php $form = ActiveForm::begin([
    		'options'=>['enctype'=>'multipart/form-data']
    		
    ]); ?>
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3><i class="fa fa-pencil"></i>
						
							<?= Yii::t('backend', 'Editar datos') ?> <small>de mi representante legal</small> </h3>	
						</div>
<div class="panel-body">
		<div class=" col-xs-12 col-sm-12 col-md-6">
    

  
    <div class="row">
		<div class="col-xs-12 col-md-9">
    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => 100]) ?>
	</div>
		</div>
		<div class="row">
		<div class="col-xs-12 col-md-9">
    <?= $form->field($model, 'APP')->textInput(['maxlength' => 100]) ?>
    </div>
		</div>
	<div class="row">
		<div class="col-xs-12 col-md-9">
    <?= $form->field($model, 'APM')->textInput(['maxlength' => 100]) ?>
    </div>
		</div>

  
    <div class="row">
		<div class="col-xs-12 col-md-7">
    <?= $form->field($model, 'CURP')->textInput(['maxlength' => 18]) ?>
    </div>
		</div>

		</div>
  <div class=" col-xs-12 col-sm-12 col-md-6">

			<div class="row">
					<div class="col-xs-12 col-md-7">
			    <?= $form->field($model, 'TELEFONO')->textArea(['maxlength' => 100]) ?>
			    </div>
			</div>
			<div class="row">
					<div class="col-xs-12 col-md-7">
			    <?= $form->field($model, 'CORREO_ELECTRONICO')->textInput(['maxlength' => 300]) ?>
			    
			    </div>
			</div>
			

			
			   <!-- <?= $form->field($model, 'NSS')->textInput(['maxlength' => 20]) ?>  --> 
			
			   
    </div>



</div>

    <div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Aquí puedes actualizar los datos del representante legal de tu empresa, es importante introducir los datos correctamente en todos los campos. Presiona el botón [Guardar] y a continuación se guardaran los datos del representante legal') ?>"><i class="fa fa-question-circle"></i>
						</button>
						&nbsp;
						
	    <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
       </div>
    
   
</div>
  <?php ActiveForm::end(); ?>
</div>
</div>
