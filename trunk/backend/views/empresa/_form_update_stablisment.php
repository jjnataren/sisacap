<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Empresa;
use yii\web\View;
use backend\models\Catalogo;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs("
var isChecked = $('#chk_moral').val();

if (isChecked==1){
	$('#txt_curp').val('');
	$('#txt_curp').attr('disabled',true);
}

", View::POS_READY, 'myonload');
$itemsSex = [1=>'IMSS',2=>'ISSSTE',3=>'PROPIO',4=>'NO CUENTA'];
$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');
$this->registerJs("$('#help_popup_telefono').popover('hide');", View::POS_END, 'noneoptions2345');
		$this->registerJs("$('#help_popup_correo').popover('hide');", View::POS_END, 'noneoptions25');

$dataListEntidad=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>1,'ACTIVO'=>1]), 'ID_ELEMENTO', 'NOMBRE');
$dataListMunicipios=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>2,'ACTIVO'=>1, 'ELEMENTO_PADRE'=>$model->ENTIDAD_FEDERATIVA]), 'ID_ELEMENTO', 'NOMBRE');

$dataListGiro=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>4,'ACTIVO'=>1]), 'ID_ELEMENTO', 'NOMBRE');
$this->registerJs("$('#chk_moral').change(function(){

		var ischecked = false;

		if(this.value == 1) ischecked = true;
	$('#txt_curp').val('');
   $('#txt_curp').attr('disabled',ischecked);
});", View::POS_END, 'noneoptions');
$this->registerJs("
				var seguridad= $('#esquemaSeg').val();
				if(seguridad == 4){
				
				$('#txt_nss').val('');
   				$('#txt_nss').attr('disabled','true');
				}else{
				$('#txt_nss').removeAttr('disabled');
				}
				;",View::POS_READY, 'seguridad');

$this->registerJs("$('#esquemaSeg').change(function(){
				if(this.value == 4){
				
				$('#txt_nss').val('');
   				$('#txt_nss').attr('disabled','true');
				}else{
				$('#txt_nss').removeAttr('disabled');
				}
			

				});",View::POS_END, 'seguridad');

$this->registerJs("
		var giro = $('#drop_giro').val()


		if(giro == 66666){


				//activacion
				$('#txt_giro_otro').removeAttr('disabled');
		}else{
					$('#txt_giro_otro').val('');
   				    $('#txt_giro_otro').attr('disabled','true');

		}


;", View::POS_READY, 'noneoptions_drop_functions');

$this->registerJs("$('#drop_giro').change(function(){


		if(this.value == 66666){

		
				//activacion
				$('#txt_giro_otro').removeAttr('disabled');
		}else{
					$('#txt_giro_otro').val('');
   				    $('#txt_giro_otro').attr('disabled','true');

		}


});", View::POS_END, 'noneoptions_drop_functions');



?>
<div class="row">
<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>
    
      <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3><i class="fa fa-pencil-square-o"></i>
						
						<?= Yii::t('backend', 'Editar datos') ?> <small>de mi establecimiento</small> </h3>	
					</div>
					<div class="panel-body">
		
 
    
   
     <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Datos del establecimiento') ?></h3>
                </div><!-- /.box-header -->
                <div class="panel-body">
                   
                    <?= $form->field($model, 'MORAL')->widget(CheckboxX::classname(), ['options'=>['id'=>'chk_moral'],'pluginOptions'=>['threeState'=>false]]); ?>
			
    <?= $form->field($model, 'NOMBRE_RAZON_SOCIAL')->textInput(['maxlength' => 300]) ?>
    
    <?= $form->field($model, 'RFC')->textInput(['maxlength' => 13]) ?>
    
    <?= $form->field($model, 'CURP')->textInput(['maxlength' => 18,'id'=>"txt_curp"]) ?>

    
  			
   
    	  </div>
  		</div>
	</div>

      <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Contacto del establecimiento') ?></h3>
                </div>
                <div class="panel-body">  
     
	     	
	 <?= $form->field($model, 'NOMBRE_CONTACTO')->textInput(['maxlength' => 300]) ?>
	 <?= $form->field($model, 'NUM_CONTACTO')->textArea(['maxlength' => 300]) ?>
	 <div class="row">
		<div class="col-xs-10 col-md-10">
   <?= $form->field($model, 'TELEFONO')->textArea(['maxlength' => 300]) ?>

    
    </div>
    
    
    <div class="col-xs-2 col-md-2">
    	<br />
    	
    <button id="help_popup_telefono" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content=" 
Aquí deberás incluir la clave lada. Ej. (55) 26-32-32-12.
     "><i class="fa fa-question-circle"></i>
	  </button>
    </div>
 </div>
   
     <div class="row">
    <div class="col-xs-10 col-md-10">
     	<?= $form->field($model, 'CORREO_ELECTRONICO')->textInput(['maxlength' => 300]) ?>
	     	</div>
    	<br />
    	<div class="col-xs-2 col-md-2">
    	
    	<button id="help_popup_correo" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="Aquí deberás incluir el E-mail del contacto "><i class="fa fa-question-circle"></i>
	  </button>
	</div>
    	</div>
   
       </div>
		</div>
		</div>

      <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Centro de trabajo') ?></h3>
                </div><!-- /.box-header -->
                <div class="panel-body">
						
						
						<?= $form->field($model, 'NOMBRE_CENTRO_TRABAJO')->textInput(['maxlength' => 300]) ?>
	
						<?= $form->field($model, 'NOMBRE_COMERCIAL')->textInput(['maxlength' => 300]) ?>
						 <?= $form->field($model, 'ESQUEMA_SEGURIDAD_SOCIAL')->dropDownList($itemsSex,['prompt'=>'-- Seleccione  --','id' => 'esquemaSeg']) ?>
                        <?= $form->field($model, 'GIRO_PRINCIPAL')->dropDownList($dataListGiro,['prompt'=>'-- Seleccione  --','maxlength' => 300, 'id'=>'drop_giro']) ?>
                        
    					<?= $form->field($model, 'OTRO_GIRO')->textInput(['maxlength' => 200,'id'=>'txt_giro_otro']) ?>
                        
                        <?= $form->field($model, 'NSS')->textInput(['maxlength' => 14, 'id'=>'txt_nss']) ?>
                        <div class="row">
							<div class="col-xs-9 col-md-6">
							
                       
                        </div>
                        </div>	
                        <div class="row">
							<div class="col-xs-9 col-md-6">
    							<?= $form->field($model, 'FECHA_INICIO_OPERACIONES')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
    		</div>
	
						</div>
   
				</div>
					
				</div>
		</div>
					
     
    
     
            <div class="col-lg-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Domicilio') ?></h3>
                </div><!-- /.box-header -->
                <div class="panel-body">
					
	<?= $form->field($model, 'CALLE')->textInput(['maxlength' => 300]) ?>
  
    <?= $form->field($model, 'NUMERO_EXTERIOR')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'NUMERO_INTERIOR')->textInput(['maxlength' => 100]) ?>
    
     <?= $form->field($model, 'COLONIA')->textInput(['maxlength' => 300]) ?>
    
      <?= $form->field($model, 'ENTIDAD_FEDERATIVA')->dropDownList($dataListEntidad,['prompt'=>'-- Seleccione  --','id' => 'cat-id']) ?>
  <?= $form->field($model, 'MUNICIPIO_DELEGACION')->widget(DepDrop::classname(), [
    'options' => ['id' => 'subcat-id'],
    'data'=>$dataListMunicipios,
    'pluginOptions' => [ 'depends' => ['cat-id'],
        'placeholder' => 'Seleccione ...',		
        'url' => Url::to(['empresa/getmunicipios'])
    ]
]); ?>
     <?= $form->field($model, 'CODIGO_POSTAL')->textInput(['maxlength' =>5]) ?>
  <!-- <?= $form->field($model, 'LOCALIDAD')->textInput(['maxlength' => 100]) ?>-->
<!--   <?= $form->field($model, 'DOMICILIO')->textArea(['maxlength' => 300]) ?> -->
  	
    
       </div>
</div>
       
  
       
 </div>

                
 	</div>



	

	     <div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend','Aquí puedes actualizar los datos del establecimiento de tu empresa, es importante introducir los datos correctamente en todos los campos. Presiona el botón [Guardar] y a continuación se guardaran los datos del establecimiento.') ?>"><i class="fa fa-question-circle"></i>
						</button>
             <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
  <?php ActiveForm::end(); ?>
  </div>
  
</div>
</div>
</div>


