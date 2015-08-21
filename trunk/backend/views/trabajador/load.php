<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\FileForm;
use yii\helpers\ArrayHelper;
use backend\models\PuestoEmpresa;
use backend\models\Catalogo;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use backend\models\Trabajador;
use yii\base\Object;

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

$datalistPuesto = ArrayHelper::map(PuestoEmpresa::findAll(['ID_EMPRESA'=>$model->ID_EMPRESA]), 'ID_PUESTO', 'NOMBRE_PUESTO');

$itemsSex = [1=>'MUJER',2=>'HOMBRE'];


$dataListOcupacion=ArrayHelper::map(Catalogo::findBySql('select tcc.ID_ELEMENTO, tcc.NOMBRE, (select NOMBRE FROM tbl_cat_catalogo where tcc.ELEMENTO_PADRE = ID_ELEMENTO) PADRE
from tbl_cat_catalogo tcc where categoria=5 AND ELEMENTO_PADRE IS NOT NULL
 ')->all(), 'ID_ELEMENTO', 'NOMBRE','PADRE');

$dataListEntidad=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>1,'ACTIVO'=>1]), 'ID_ELEMENTO', 'NOMBRE');
?>

<div class="trabajador-form">

	

	 <?php $form = ActiveForm::begin([ 'options'=>['layout' => 'horizontal', 'enctype'=>'multipart/form-data', 'id'=>'form1', 'action' => ['trabajador/load']]]); ?>
	
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
						
						 <?= Yii::t('backend', 'Resumen de sus registros') ?><small> <?= Yii::t('backend', ' Por favor revise su información y confirme') ?></small> </h3>
						
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
		  					<tr>
		  						<td >Total</td>
		  						<td class="info"><?= count($workers)?></td>
		  					</tr>
		  				</table>
		  				
		  					<?php }							
							?>

    				</div>
    			
    	
			</div>
		</div>
		
		
		
		<?php if (isset($workers)){ ?>	
		
		 <?php $form = ActiveForm::begin([ 'options'=>['layout' => 'horizontal',  'id'=>'form2'],
											'action' => ['trabajador/saveall'],	]); ?>
		 
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
									<th><?=Yii::t('backend', 'Nombre')?></th>	
									<th><?=Yii::t('backend', 'CURP')?></th>
									<th><?=Yii::t('backend', 'RFC')?></th>
									<th><?=Yii::t('backend', 'NSS')?></th>
									<th><?=Yii::t('backend', 'Correo electronico')?></th>
									<th><?=Yii::t('backend', 'Telefono')?></th>
									<th><?=Yii::t('backend', 'Puesto')?></th>
									<th><?=Yii::t('backend', 'Ocupación espacifica')?></th>
									<th><?=Yii::t('backend', 'Sexo')?></th>									
									<th><?=Yii::t('backend', 'Entidad Federativa')?></th>
									<th><?=Yii::t('backend', 'Municipio')?></th>	
									<th><?=Yii::t('backend', 'Lugar de recidencia')?></th>
									<th><?=Yii::t('backend', 'Grado de estudios')?></th>			
									<th><?=Yii::t('backend', 'Institución eduativa')?></th>	
									<th><?=Yii::t('backend', 'Documento probatorio')?></th>		
												
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
									
									<td><?= $worker->NOMBRE.' '.$worker->APP.' '.$worker->APM ?>
									
										<?=$form->field($worker, "[$i]NOMBRE" )->hiddenInput()->label(false)?>
										<?=$form->field($worker, "[$i]APP" )->hiddenInput()->label(false)   ?>
										<?=$form->field($worker, "[$i]APM" )->hiddenInput()->label(false)   ?>
									</td>
									<td><?=$form->field($worker, "[$i]CURP" )->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]RFC")->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]NSS")->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]CORREO_ELECTRONICO")->textInput()->label(false)   ?></td>
									<td><?=$form->field($worker, "[$i]TELEFONO")->textInput()->label(false)   ?></td>
									<td> <?= $form->field($worker, "[$i]PUESTO")->dropDownList($datalistPuesto,['prompt'=>'-- No establecido  --','ID_PUESTO' => 'NOMBRE_PUESTO'])->label(false); ?></td>
									<td><?= $form->field($worker, "[$i]OCUPACION_ESPECIFICA")->dropDownList($dataListOcupacion,['prompt'=>'-- No establecido  --','ID_ELEMENTO' => 'NOMBRE','id'=>'drop_ocup'])->label(false); ?>  </td>
								    <td><?= $form->field($worker, "[$i]SEXO")->dropDownList($itemsSex,['prompt'=>'-- No establecido  --','id' => 'tex-sex'])->label(false); ?></td>
									<td> <?= $form->field($worker, "[$i]ENTIDAD_FEDERATIVA")->dropDownList($dataListEntidad,['prompt'=>'-- No establecido  --','id' => 'cat-entidad_'.$i])->label(false); ?></td>
									<td>
									
									<?php  
									
									if ($worker->MUNICIPIO_DELEGACION){
										$dataListMunicipios=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>Catalogo::CATEGORIA_MUNICIPIOS,'ACTIVO'=>1, 'ELEMENTO_PADRE'=>$worker->ENTIDAD_FEDERATIVA]), 'ID_ELEMENTO', 'NOMBRE');
									}else 
										$dataListMunicipios = array();
									?>
									 <?= $form->field($worker, "[$i]MUNICIPIO_DELEGACION")->widget(DepDrop::classname(), [
									    'options' => ['id' => 'subcat-id_'.$i],
									    'data'=>$dataListMunicipios,
									 		
									    'pluginOptions' => [ 'depends' => ['cat-entidad_'.$i],
									        'placeholder' => 'Seleccione ...',		
									        'url' => Url::to(['empresa/getmunicipios'])
									    ]
									])->label(false); ?></td>
									<td><?=$form->field($worker, "[$i]LUGAR_RESIDENCIA")->textInput()->label(false)   ?></td>
									<td><?php  $trabajador = new Trabajador();?>
									<?= $form->field($worker, "[$i]GRADO_ESTUDIO")->dropDownList($trabajador->GRADO_TIPO,['prompt'=>'-- No establecido  --','id' => 'grado_tipo'.$i])->label(false); ?>
									</td>
									
									<td>
											<?= $form->field($worker, "[$i]INSTITUCION_EDUCATIVA")->dropDownList($trabajador->INST_TIPO,['prompt'=>'-- No establecido  --','id' => 'inst_tipo'.$i])->label(false); ?>
									</td>
									<td>
										<?= $form->field($worker, "[$i]DOCUMENTO_PROBATORIO")->dropDownList($trabajador->DOC_TIPO,['prompt'=>'-- No establecido  --','id' => 'inst_tipo'.$i])->label(false); ?>
									</td>
									
								</tr>	
								
							<?php  $i++; endforeach;?>
							
								
							</tbody>
							<tfoot>
								<tr>
									<td colspan="16"></td>
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