<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\grid\GridView;
use backend\models\Instructor;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("$('#help_popup_alias').popover('hide');", View::POS_END, 'my-options');
$this->registerJs("$('#help_popup_registro_externo').popover('hide');", View::POS_END, 'my-options1');

$this->registerJs("
			
		var tipoInstructor = $('#drop_instructor').val();
		
		if(tipoInstructor == 1){

				$('#txt_numero_reg_age_ext').val('');
   				$('#txt_numero_reg_age_ext').attr('disabled','true');
		
				
				$('#txt_nombre_reg_age_ext').val('');
   				$('#txt_nombre_reg_age_ext').attr('disabled','true');
		
		}else if(tipoInstructor == 2){

					$('#txt_nombre_reg_age_ext').val('');
   					$('#txt_nombre_reg_age_ext').attr('disabled','true');
				
   				$('#txt_numero_reg_age_ext').removeAttr('disabled');
		
		}else if(tipoInstructor == 3){

				$('#txt_nombre_reg_age_ext').removeAttr('disabled');
				
   				$('#txt_numero_reg_age_ext').removeAttr('disabled');
		
		}else if(tipoInstructor == 4){

				$('#txt_nombre_reg_age_ext').removeAttr('disabled');
				
   				$('#txt_numero_reg_age_ext').val('');
   				$('#txt_numero_reg_age_ext').attr('disabled','true');
		
		
		}
		
		
		
		", View::POS_READY, 'my_onload');

$this->registerJs("$('#drop_instructor').change(function(){

		var TIPO_AGENTE_CAP_INTERNO = 1;
		
		if(this.value == TIPO_AGENTE_CAP_INTERNO){

				$('#txt_numero_reg_age_ext').val('');
   				$('#txt_numero_reg_age_ext').attr('disabled','true');
		
				
				$('#txt_nombre_reg_age_ext').val('');
   				$('#txt_nombre_reg_age_ext').attr('disabled','true');
		
		}else if(this.value == 2){

					$('#txt_nombre_reg_age_ext').val('');
   					$('#txt_nombre_reg_age_ext').attr('disabled','true');
				
   				$('#txt_numero_reg_age_ext').removeAttr('disabled');
		
		}else if(this.value == 3){

				$('#txt_nombre_reg_age_ext').removeAttr('disabled');
				
   				$('#txt_numero_reg_age_ext').removeAttr('disabled');
		
		}else if(this.value == 4){

				$('#txt_nombre_reg_age_ext').removeAttr('disabled');
				
   				$('#txt_numero_reg_age_ext').val('');
   				$('#txt_numero_reg_age_ext').attr('disabled','true');
		
		
		}
		
		
});", View::POS_END, 'noneoptions');


$usuario = Yii::$app->user->getIdentity();

?>


    <?php $form = ActiveForm::begin(); ?>
<div class="row">  
    
 <div class="col-md-12 col-xs-12 col-sm-12">   
    <div class="panel <?=  ($model->isNewRecord) ? 'panel-primary': 'panel-primary'  ?>">
			<div class="panel-heading">
						<h3><i class="glyphicon glyphicon-plus"></i>
						<?= Yii::t('backend', 'Mis datos') ?> </h3>	
			</div>

    			<div class="panel-body">
				
				<div class="row">
				
				 <div class="col-md-5 col-xs-12 col-sm-12">
			            <div class="panel">
			                <div class="panel-heading text-primary">
			                    
			                    <h3 class="panel-title"><?= Yii::t('backend', 'Datos del instructor') ?></h3>
			                </div>
			                <div class="panel-body">
								    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => 100]) ?>
				
								    <?= $form->field($model, 'APP')->textInput(['maxlength' => 100]) ?>
				
				    				<?= $form->field($model, 'APM')->textInput(['maxlength' => 100]) ?>
				
				                    <?= $form->field($model, 'RFC')->textInput(['maxlength' => 100]) ?>
				 
								    <?= $form->field($model, 'DOMICILIO')->textArea(['maxlength' => 300]) ?>
								
								    <?= $form->field($model, 'TELEFONO')->textInput(['maxlength' => 100]) ?>
								
								    <?= $form->field($model, 'CORREO_ELECTRONICO')->textInput(['maxlength' => 300,'readOnly'=>'readOnly','value'=>($usuario)?$usuario->email:'']) ?>
							
							</div>
					</div>
				</div>		
				
			 <div class="col-md-7 col-xs-12 col-sm-12">
	            <div class="panel">
	                <div class="panel-heading text-primary">
	                    
	                    <h3 class="panel-title"><?= Yii::t('backend', 'Tipo de instructor') ?></h3>
	                </div>
	                <div class="panel-body">
			    
				     <?= $form->field($model, 'TIPO_INSTRUCTOR')->dropDownList(Instructor::getTypeInstructor(),['prompt'=>'-- Seleccione  --','maxlength' => 300, 'id'=>'drop_instructor']) ?>
				 
					 				
			
				 	<div class="row">
						<div class="col-xs-9 col-md-9">
					    <?= $form->field($model, 'NOMBRE_AGENTE_EXTERNO')->textInput(['maxlength' => 100, 'id'=>'txt_nombre_reg_age_ext']) ?>
					    </div>
					    <div class="col-xs-3 col-md-3">
	    					<br />
					
							<button id="help_popup_alias" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="Un nombre de personas fisicas o morales tales como instituciones escuelas especializados en impartir capacitacion, "><i class="fa fa-question-circle"></i>
							</button>
	    				</div>
				</div>	
				
				
				 
				<div class="row">
				<div class="col-xs-9 col-md-9">
				<?= $form->field($model, 'NUM_REGISTRO_AGENTE_EXTERNO')->textInput(['maxlength' =>100, 'id'=>'txt_numero_reg_age_ext']) ?>
				</div>
				
				<div class="col-xs-3 col-md-3">
				<br/>
				
				<button id="help_popup_registro_externo" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="Es un identificador que asigna la secretaria del trabajo a las instituciones, escuelas para que puedan impartir cursos ejemplo(CIS8803057Z6-0013), "><i class="fa fa-question-circle"></i>
							</button>
				
				</div>
			
				<div class="col-xs-9 col-md-12">
				 <?= $form->field($model, 'COMENTARIOS')->textArea(['maxlength' => 200]) ?>
					 				
				   </div>
				   </div>
    		</div>
    		</div>
    		</div>
    		</div>
		</div>		
				 <div class="panel-footer">

             <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				    				</div>
		</div>	
	
</div>   
     
     

    <?php ActiveForm::end(); ?>

</div>