<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\grid\GridView;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\base\Model;

/* @var $this yii\web\View */
/* @var $model backend\models\Curso */
/* @var $form yii\widgets\ActiveForm */

$dataListAreaTematica=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>6,'ACTIVO'=>1]), 'ID_ELEMENTO', 'NOMBRE');
$dataListCourse=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>11,'ACTIVO'=>1]), 'ID_ELEMENTO', 'NOMBRE');

$dataListCourse [66666] = '--Personalizado--';


$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');
$this->registerJs("$('#help_instructor').popover('hide');", View::POS_END, 'my-options3');
$this->registerJs("$('#helpmodalidad').popover('hide');", View::POS_END, 'my-options1');
$this->registerJs("$('#helpObjetivo').popover('hide');", View::POS_END, 'my-options2');

$this->registerJs("
 
				var personalizado = $('#drop_giro').val();
				if( personalizado == 66666){
		
				//activacion
				$('#txt_giro_otro').removeAttr('disabled');
		}else{
					$('#txt_giro_otro').val('');
   				    $('#txt_giro_otro').attr('disabled','true');

		}

         ", View::POS_READY, 'my_lod');

$this->registerJs("$('#drop_giro').change(function(){

		if(this.value == 66666){
		
				//activacion
				$('#txt_giro_otro').removeAttr('disabled');
		}else{
					$('#txt_giro_otro').val('');
   				    $('#txt_giro_otro').attr('disabled','true');

		}


});", View::POS_END, 'noneoptions_drop_functions');




$itemsModalidad = [1=>'Presencial',2=>'En linea',3=>'Mixta'];
$itemsObjetivo = [1=>'Actualizar y perfeccionar conocimientos y habilidades y proporcionar información de nuevas tecnologías'
		         ,2=>'Prevenir riesgos de trabajo'
		         ,3=>'Incrementar la productividad '
		         ,4=>'Mejorar el nivel educativo'
		         ,5=>'Preparar para ocupar vacantes o puestos de nueva creación'];


?>

<div class="curso-form">

<?php $form = ActiveForm::begin(); ?>

	<div class="panel panel-primary">
			<div class="panel-heading">
						<h3><i class="fa fa-plus-square"></i>
						<?= Yii::t('backend', 'Formulario curso') ?> </h3>	
			</div>
	<div class="panel-body">
			<div class=" col-xs-12 col-sm-12 col-md-6">
				<div class="panel panel-default">
			 		<div class="panel-body">	
			 								
			 		
 <?= $form->field($model, 'OTRO_NOMBRE')->dropDownList($dataListCourse,['prompt'=>'-- Seleccione  --','maxlength' => 300, 'id'=>'drop_giro']) ?>
	
		   
 <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => 200,'id'=>'txt_giro_otro']) ?>
  
  
  		
    					
<b>Modalidad de capacitación
	</b>
	
 <?= $form->field($model, 'MODALIDAD_CAPACITACION')->dropDownList($itemsModalidad,  ['prompt'=>'-- Seleccione--']) ->label(false) ?>
  
				
	<b>Objetivo de capacitación
	</b>
	
      <?= $form->field($model, 'OBJETIVO_CAPACITACION')->dropDownList($itemsObjetivo,  ['prompt'=>'-- Seleccione--']) ->label(false) ?>
  
  <?= $form->field($model, 'AREA_TEMATICA')->dropDownList($dataListAreaTematica,['prompt'=>'-- Seleccione  --','' => '']) ?> 
											
	<?= $form->field($model, 'DURACION_HORAS')->textInput() ?>
						
    <?= $form->field($model, 'FECHA_INICIO')->widget('trntv\yii\datetimepicker\DatetimepickerWidget',['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
                        
   <?= $form->field($model, 'FECHA_TERMINO')->widget('trntv\yii\datetimepicker\DatetimepickerWidget',['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
                                            
   <?= $form->field($model, 'DESCRIPCION')->textArea() ?>						  					
						
				<!--		<div class="row">
	   
	    <div class=" col-xs-12 col-sm-12 col-md-10">
     </div>
	     <div class=" col-xs-12 col-sm-12 col-md-2">
		     <br />
				<button id="help_popup_ocupacion" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'modificar. ') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
		</div>
    </div> 
    --> 
  
						
						
					</div>
				</div>
			</div>	
		<div class=" col-xs-12 col-sm-12 col-md-6">		
		<div class="panel panel-default">
		 <div class="panel-body">	
		   
		    
		    	<?= $form->field($model, 'ID_INSTRUCTOR')->hiddenInput(['id'=>'hid_id_instructor'])->label(false) ?>
		    	
		    	
		    	<table class="table">
		    	
		    	
		    		<thead>
		    		
		    		
		    			<tr><th colspan="2"><h4><i class="fa fa-graduation-cap"></i>&nbsp;Instructor<small> del curso</small></h4><th></tr>
		    		</thead>
		    		
		    	
		    		<tr>
		    			<td>Id</td>
		    			<td><label id="lbl_id_instructor" > 
		    			
		    			  <?php  if (isset($model->iDINSTRUCTOR )){ ?>
		    			  
		    			<?= $model->iDINSTRUCTOR->ID_INSTRUCTOR?>
		    			<?php  }?>
		    			</label>
		    			</td>
		    			
		    		</tr>
		    		<tr>
		    			<td>Nombre</td>
		    			<td><label id="lbl_nombre_instructor" > 
		    			<?php if (isset($model->iDINSTRUCTOR)){?>	
		    			 <?= $model->iDINSTRUCTOR->NOMBRE?>
		    			 <?php }?>
		    			 </label></td>
		    		</tr>
		    		
		    		<tr>
		    			<td>Correo</td>
		    			<td><label id="lbl_correo_electronico" > 
		    			<?php if(isset($model->iDINSTRUCTOR)){?>
		    			<?= $model->iDINSTRUCTOR->CORREO_ELECTRONICO ?>
		    			<?php }?>
		    			</label>
		    			</td>
		    		</tr>
		    		
		    		<tr>
		    			<td>Telefono</td>
		    			<td><label id="lbl_telefono" >
		    			<?php  if(isset($model->iDINSTRUCTOR)) {?>
		    			
		    			 <?=$model->iDINSTRUCTOR->TELEFONO?> 
		    			 <?php  }?>
		    			 </label>
		    			 </td>
		    		</tr>
		    		
		    		<tr>
		    			<td>N° registro agente externo </td>
		    			<td><label id="lbl_num_registro_agente_externo" > 
		    			<?php if(isset($model->iDINSTRUCTOR)) {?>
		    			<?= $model->iDINSTRUCTOR->NUM_REGISTRO_AGENTE_EXTERNO?>
		    			<?php } ?>
		    			</label>
		    			</td>
		    		</tr>
		    	
		    	</table>
		    
		   </div> 
		   <div class="panel-footer">
		  		 
		  		
				<button id="help_instructor" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', ' Aquí podrás seleccionar un instructor para el curso. ') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
		 
			    <a href="#" class="btn btn-default" data-toggle="modal" data-target="#userModal" id="userButton">
			    	
					<i class="fa fa-graduation-cap"></i>&nbsp;<?= Yii::t('backend', 'Seleccionar')?>
					
					
					
			    </a>
		   </div>
		  </div>
</div>
		  
		 </div>

    
     <div class="panel-footer">
							<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Aquí podrás crear nuevos cursos para la empresa, Es importante llenar todos los campos correctamente. Presiona el botón [Crear] para guardar sus datos') ?>"><i class="fa fa-question-circle"></i>
						</button>
             <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
     
     </div>
   




 <?php ActiveForm::end(); ?>
 
 </div>

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-graduation-cap"></i>&nbsp;<?=Yii::t('backend', 'Agregar instructor al curso	') ?></h4>
                                            
                                            
                                        </div>
	                                        <div class="modal-body">
											 <?= GridView::widget([
										        'dataProvider' => $dataProvider,
										        'filterModel' => $searchModel,
										        'columns' => [
										            ['class' => 'yii\grid\SerialColumn'],
										
										            'ID_INSTRUCTOR',
										            'NOMBRE',
										            'NUM_REGISTRO_AGENTE_EXTERNO',
										            // 'APM',
										            // 'DOMICILIO',
										             'TELEFONO',
										             'CORREO_ELECTRONICO',
										            // 'LOGOTIPO',
										            // 'NUM_REGISTRO_AGENTE_EXTERNO',
													[
														'label'=>'',
														'format'=>'raw',
														'value' => function($data){
																
															return  Html::a('<i class="fa fa-plus"></i>', '#',
																	['class' => 'btn btn-primary',
																	'data-loading-text'=>"Loading...",
																	'data-dismiss'=>'modal',	
																	'id'=>'user_'.$data->ID_EMPRESA,
																	'onclick'=>"
																	$('#user_$data->ID_EMPRESA').fadeIn(300);
																	$('#lbl_id_instructor').text('$data->ID_INSTRUCTOR');
																	$('#lbl_nombre_instructor').text('$data->NOMBRE');
																	$('#lbl_correo_electronico').text('$data->CORREO_ELECTRONICO');
																	$('#lbl_telefono').text('$data->TELEFONO');
																	$('#lbl_num_registro_agente_externo').text('$data->NUM_REGISTRO_AGENTE_EXTERNO');
																	$('#hid_id_instructor').val('$data->ID_INSTRUCTOR');
																	$('#userModal').modal('hide')	
																	return true;
																	",
																	]
															);
														}
																	]
																								         
										        ],
										    ]); ?>
										    </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> <?= Yii::t('backend', 'Salir')?></button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
