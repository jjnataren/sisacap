<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\ComisionMixtaCap */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("$('#helppop1').popover('hide');
					$('#help_popup_alias').popover('hide');
					$('#help_popup_numero_integrantes').popover('hide');
					$('#help_popup_numero_fecha_const').popover('hide');
					$('#help_popup_numero_fecha_elab').popover('hide');
		        	$('#help_popup_lugar_elab').popover('hide');
					$('#help_popup_descrip').popover('hide');
					
					$('#userButton').click(function() { 
		
							if ($('#comisionmixtacap-numero_integrantes').val() < 50){
							
								$('#div_confirm_dialog').html
								('<div class=\'alert alert-warning\' role=\'alert\'><a href=\'#\' class=\'alert-link\'>Según la ley federal del trabajo</a>, no es necesario crear una comisión cuando los trabajadores son menores a 50. Sin embargo es posible crearla en este momento,  presione el boton [<a href=\'#\' class=\'alert-link\'>Confirmar crear comision</a>] para continuar</div>');
		
							}else{
						
							$('#div_confirm_dialog').html
								('<div class=\'alert alert-success\' role=\'alert\'><a href=\'#\' class=\'alert-link\'>Proceso correcto</a>,  presione el boton [<a href=\'#\' class=\'alert-link\'>Confirmar crear comision</a>] para continuar</div>');
		
		
							}
					});
		
					$('#btn_success').click(function() { 
						$('#legalModal').modal('hide');
					});
		
", View::POS_END, 'my-options');

?>


<div class="row">
<div class="comision-mixta-cap-form">



    <?php $form = ActiveForm::begin(['id'=>'form_comision']); ?>
     <div class=" col-xs-12 col-sm-12 col-md-3">
     </div>
    
    <div class=" col-xs-12 col-sm-12 col-md-6">
				<div <?=($model->isNewRecord)? 'class="panel panel-primary"' : 'class="panel panel-warning"' ?>>
					<div class="panel-heading">
						<h3>
						
						<?= ($model->isNewRecord)? '<i class="fa fa-plus"></i>Nueva comisión mixta' : '<i class="fa fa-pencil-square-o"></i> Actualizar comisión mixta  de capacitación, adiestramiento y productividad'   ?> </h3>
						
					</div>
					<div class="panel-body">
		

    <!--<?= $form->field($model, 'COMISION_MIXTA_PADRE')->textInput() ?>-->
    <div class="row">
		<div class="col-xs-9 col-md-9">
    <?= $form->field($model, 'ALIAS')->textInput() ?>
    </div>
    <div class="col-xs-3 col-md-3">
    	<br />
    	
    	<button id="help_popup_alias" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="Incluir un nombre, el cual  permitirá identificar esta comisión mixta, Ej. [Comisión seguridad e higiene]"><i class="fa fa-question-circle"></i>
	</button>
    </div>
    </div>
    
     <div class="row">
		<div class="col-xs-9 col-md-6">
		
    		<?= $form->field($model, 'NUMERO_INTEGRANTES')->textInput() ?>
     </div>
     
    <div class="col-xs-3 col-md-6">
		<br />
		<button id="help_popup_numero_integrantes" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Incluir el número de individuos que integraran la comisión mixta.') ?>"><i class="fa fa-question-circle"></i>
	</button>
    		
     </div>
     
    </div>
    <div class="row">
		<div class="col-xs-9 col-md-6">
<?= $form->field($model, 'FECHA_CONSTITUCION')->widget('trntv\yii\datetimepicker\DatetimepickerWidget',['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
		       </div>
         <div class="col-xs-3 col-md-6">
			<br />
			<button id="help_popup_numero_fecha_const" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Incluir la fecha en la que la comisión mixta será constituida') ?>"><i class="fa fa-question-circle"></i>
		</button>
  	 </div>
   </div>
    <div class="row">
		<div class="col-xs-9 col-md-6">
    <?= $form->field($model, 'FECHA_ELABORACION')->widget('trntv\yii\datetimepicker\DatetimepickerWidget',['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
	</div>
	
	<div class="col-xs-3 col-md-6">
			<br />
		<button id="help_popup_numero_fecha_elab" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Incluir la fecha en la que la comisión mixta será elaborada') ?>"><i class="fa fa-question-circle"></i>
		</button>
  	 </div>
		</div>
		
		    <div class="row">
		<div class="col-xs-9 col-md-6">
    		<?= $form->field($model, 'LUGAR_INFORME')->textInput() ?>
			</div>
	
	<div class="col-xs-3 col-md-6">
			<br />
		<button id="help_popup_lugar_elab" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Incluir lugar donde la comisión mixta será elaborada') ?>"><i class="fa fa-question-circle"></i>
		</button>
  	 </div>
		</div>
		
 <div class="row">
		<div class="col-xs-9 col-md-9">
    <?= $form->field($model, 'DESCRIPCION')->textArea() ?>
	</div>
	
	<div class="col-xs-3 col-md-3">
			<br />
		<button id="help_popup_descrip" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Incluir una breve descripción de la comisión mixta para identificar su objetivo.') ?>"><i class="fa fa-question-circle"></i>
		</button>
  	 </div>
		</div>
    </div>
    
   			   
  	<div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Aquí puedes crear una comisión mixta, es importante introducir los datos correctamente en todos los campos. Presiona el botón [Guardar] y a continuación se guardaran los datos de la comisión mixta.') ?>"><i class="fa fa-question-circle"></i>
						</button>
						&nbsp;
			
			 	<button type="submit" id="btn_success" <?= ($model->isNewRecord)? ' class="btn btn-success"':' class="btn btn-primary"' ?> > <?= '<i class="fa fa-floppy-o"></i> '.Yii::t('backend', ($model->isNewRecord)?'Guardar':'Guardar')?></button>
                        
    </div>

        
    </div>
    </div>
      <?php ActiveForm::end(); ?>
    </div>


</div>