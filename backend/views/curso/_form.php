<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Curso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-form">

<?php $form = ActiveForm::begin(); ?>
    
      <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3><i class="glyphicon glyphicon-plus"></i>
						
						<?= Yii::t('backend', 'Agregar datos') ?> <small>Curso</small> </h3>	
					</div>
					<div class="panel-body">
		

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'ID_CURSO')->textInput() ?>  -->


    <?= $form->field($model, 'ID_INSTRUCTOR')->textInput() ?>
	<?= $form->field($model, 'NOMBRE')->textInput() ?>
	<?= $form->field($model, 'DURACION_HORAS')->textInput() ?>
	 <?= $form->field($model, 'FECHA_INICIO')->widget('trntv\yii\datetimepicker\DatetimepickerWidget',['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
                        
                        <?= $form->field($model, 'FECHA_TERMINO')->widget('trntv\yii\datetimepicker\DatetimepickerWidget',['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
                        
	<?= $form->field($model, 'AREA_TEMATICA')->textInput() ?>
	<?= $form->field($model, 'MODALIDAD_CAPACITACION')->textInput() ?>

 
<div class=" col-xs-12 col-sm-12 col-md-12
">		
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
    
     <div class="panel-footer">
							<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Aqu� podr�s crear nuevos cursos para la empresa, Es importante llenar todos los campos correctamente. Presiona el bot�n [Crear] para guardar sus datos') ?>"><i class="fa fa-question-circle"></i>
						</button>
             <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Crear', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
     
    <?php ActiveForm::end(); ?>

</div>
