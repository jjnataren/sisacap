<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\FileForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t ( 'backend', 'Cargar trabajadores por archivo' );

$this->params ['breadcrumbs'] [] = ['label' => Yii::t ( 'backend', 'Trabajadores' ),'url' => ['indexcompany','id_company'=>$model->ID_EMPRESA,'action' => ['trabajador/load', 'id_company'=>$model->ID_EMPRESA],]
		];

$this->params ['breadcrumbs'] [] = $this->title;


/*Java script*/
$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options-button');
$this->registerJs("$('#dataTable1').dataTable( {'language': {'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json' }});", View::POS_END, 'my-options');



?>

<div class="trabajador-form">

	

	 <?php $form = ActiveForm::begin([ 'options'=>['layout' => 'horizontal', 'enctype'=>'multipart/form-data', 'id'=>'form1']]); ?>
	
		<div class="col-xs-12 col-sm-12 col-md-5">
				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3><i class="fa fa-upload"></i>
						
						 <?= Yii::t('backend', 'Archivo para proceso') ?><small></small> </h3>
						
					</div>
					<div class="panel-body">
		
	
   
						
						 		<?= $form->field($fileModel, 'file')->fileInput() ?>
								
								
								<p class="help-block"><?= Yii::t('backend', 'Por favor seleccione el archivo que desea procesar ')?></p>
						
						

   

    				</div>
    				<div class="panel-footer">
    						   
						    	<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', '1.- Elija el archivo y presione el boton [Preview] 2.- Revise los registros 3.- Seleccione [Cargar] para guardar los trabajadores') ?>"><i class="fa fa-question-circle"></i>
								</button>
						        <?= Html::submitButton(Yii::t('backend', '<i class="fa fa-eye"></i> Vista previa'), ['class' => 'btn btn-primary', 'name'=>'preview' ]) ?>
						            
    				</div>
    	
			</div>
		</div>
		
		 <?php ActiveForm::end(); ?>	
		
		<div class=" col-xs-12 col-sm-12 col-md-7">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						
						 <?= Yii::t('backend', 'Hoja de vida de sus registros') ?><small> <?= Yii::t('backend', '  Por favor consulte sus datos y confirme') ?></small> </h3>
						
					</div>
					<div class="panel-body">
						<?php 
						if (isset($workers)){

						$errors  = 0;
						$success = 0;
						
						foreach ($workers as $worker){
								
								  if($worker->hasErrors())
								  	$errors++;
								  else 
								  	$success++;
									
								} ?>
						
		
		  				<table class="table table-bordered">
		  					<tr>
		  						<td >Registros con error</td>
		  						<td class="danger"><?= $errors?:0 ?></td>
		  					</tr>		  					
		  					<tr>
		  						<td >Registros correctos</td>
		  						<td class="success"><?= $success?:0 ?></td>
		  					</tr>
		  				</table>
		  				
		  					<?php }							
							?>

    				</div>
    			
    	
			</div>
		</div>
		
		
		
		<?php if (isset($workers)){ ?>	
		
		 <?php $form = ActiveForm::begin([ 'options'=>['layout' => 'horizontal',  'id'=>'form2'],
											'action' => ['trabajador/saveallbyestablishment', 'id'=>$model->ID_EMPRESA],	]); ?>
		 
			<div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3><i class="fa fa-table"></i>
						
						
						 <?= Yii::t('backend', 'Users preview') ?><small>&nbsp;<?= Yii::t('backend', 'Please check your records in order to validate your data') ?></small> </h3>
						
					</div>
					<div class="panel-body table-responsive">		
					
								
						<table id="dataTable1" class="table table-hover" cellspacing="0"  width="100%">
							<thead>
								<tr >
									<th>#</th>
									<th><?=Yii::t('backend', 'Full Name')?></th>									
									<th><?=Yii::t('backend', 'CURP')?></th>
									<th><?=Yii::t('backend', 'RFC')?></th>
									<th><?=Yii::t('backend', 'NSS')?></th>
									<th><?=Yii::t('backend', 'Domicilio')?></th>
									<th><?=Yii::t('backend', 'Correo electronico')?></th>
									<th><?=Yii::t('backend', 'Telefono')?></th>
									<th><?=Yii::t('backend', 'Puesto')?></th>
									<th><?=Yii::t('backend', 'Ocupación')?></th>									
								</tr>
							</thead>
							<tbody>
							<?php $i = 0; foreach ($workers as $worker) :?>
							
								<?php 
									  if($worker->hasErrors() )
									  	$rowClass =  'danger'; 
									  elseif (! $worker->isNewRecord) 
									  	$rowClass =  'warning';
									  else
									  	$rowClass =  'success';
								?>
						
								<tr >
									<td class="<?= $rowClass ?>"><?= $i+1?></td>
									<td><?= $worker->NOMBRE.' '.$worker->APP.' '.$worker->APM  ?>
										<?=$form->field($worker, "[$i]NOMBRE" )->hiddenInput()->label(false)?>
										<?=$form->field($worker, "[$i]APP" )->hiddenInput()->label(false)   ?>
										<?=$form->field($worker, "[$i]APM" )->hiddenInput()->label(false)   ?>
										
									</td>
									
									<td><?=$form->field($worker, "[$i]CURP" )->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]RFC")->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]NSS")->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]DOMICILIO")->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]CORREO_ELECTRONICO")->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]TELEFONO")->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]PUESTO")->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]OCUPACION_ESPECIFICA")->textInput()->label(false)   ?></td>
									
								</tr>	
								
							<?php  $i++; endforeach;?>
							
								
							</tbody>
							<tfoot>
								<tr>
									<td colspan="11"></td>
								</tr>
							</tfoot>
						</table>					
					</div>
						<div class="panel-footer">
								<button id="helppop2" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', '1.- Elija el archivo y presione el boton [Preview] 2.- Revise los registros 3.- Seleccione [Cargar] para guardar los trabajadores') ?>"><i class="fa fa-question-circle"></i>
								</button>
						       
						        <?= Html::submitButton('<i class="fa fa-floppy-o"></i>' .'&nbsp;'.Yii::t('backend', 'Load'), ['class' => 'btn btn-success', 'name'=>'proccess' ]) ?>   
						</div>
					</div>
				</div>
				
				 <?php ActiveForm::end(); ?>	
				 
				<?php }?>
					
    
</div>