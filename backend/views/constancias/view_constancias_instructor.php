<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\Constancia;
use backend\models\Trabajador;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;
use backend\models\PuestoEmpresa;
use yii\grid\GridView;
use kartik\checkbox\CheckboxX;
use backend\models\EmpresaUsuario;
use backend\models\Curso;

/* @var $this yii\web\View */
/* @var $model backend\models\ComisionMixtaCap */


$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-laptop fa-stack-1x"></i>
							   </span>';
$this->title =   'Curso  '.'Id ' . $model->ID_CURSO .'-'. $model->NOMBRE ;//-  Plan( '.$model->iDPLAN->ALIAS.' ), Curso ('.$model->NOMBRE.')';


$this->params['breadcrumbs'][] = ['label' => 'Curso ID'.$model->ID_CURSO];

$companyModel = EmpresaUsuario::getMyCompany();


/*Java script*/
$this->registerJs("$('#helppop1').popover('hide');
		$('#helppop2').popover('hide');
		", View::POS_END, 'my-options-button');
$this->registerJs("$('#dataTable1').dataTable( {'language': {'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json' }});", View::POS_END, 'my-options');


//$this->registerJs('location.hash = "#"+$("#constancias").val();',View::POS_READY,'anunload');



$dataListEntidad=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>1,'ACTIVO'=>1]), 'ID_ELEMENTO', 'NOMBRE');
$dataListOcupacion=ArrayHelper::map(Catalogo::findBySql('select tcc.ID_ELEMENTO, tcc.NOMBRE, (select NOMBRE FROM tbl_cat_catalogo where tcc.ELEMENTO_PADRE = ID_ELEMENTO) PADRE
from tbl_cat_catalogo tcc where categoria=5 AND ELEMENTO_PADRE IS NOT NULL
 ')->all(), 'ID_ELEMENTO', 'NOMBRE','PADRE');
 
if($model->iDPLAN->TIPO_PLAN){
	$datalistPuesto = ArrayHelper::map(PuestoEmpresa::findAll(['ID_EMPRESA'=>$model->iDPLAN->iDCOMISION->ID_EMPRESA]), 'ID_PUESTO', 'NOMBRE_PUESTO');
}else{
	
	$datalistPuesto = ArrayHelper::map(PuestoEmpresa::findBySql('select * from tbl_puesto_empresa where id_puesto in (select id_puesto from tbl_plan_puesto where id_plan = :id_plan)', [':id_plan'=>$model->ID_PLAN])->all(), 'ID_PUESTO', 'NOMBRE_PUESTO');	
	
}
$itemsSex = [1=>'MUJER',2=>'HOMBRE'];
$itemsGrado = [1=>'Primaria',2=>'Secundaria',3=>'Bachillerato',4=>'Carrera tecnica',5=>'Licenciatura',6=>'Especialidad',7=>'Maestría',8=>'Doctorado'];
$itemsInstitucion =[1=>'Publica', 2=>'Privada'];
$itemsDocumentos = [1=>'Titulo',2=>'Certificado',3=>'Diploma',4=>'Otro'];
/*$itemsPromedio = [1=>'1',2=>'1.5',3=>'2',4=>'2.5',5=>'3',6=>'3.5',7=>'4',8=>'4.5',9=>'5',10=>'5.5',
11=>'6',12=>'6.5',13=>'7',14=>'7.5',15=>'8',16=>'8.5',17=>'9',18=>'9.5',19=>'10'];
*/

$tabs= [];

foreach ($model->iDPLAN->planEstablecimientos as $establecimiento){
	
	
	$tabs[]=[
			'label' =>'<i class="fa fa-university">
							 </i> ID ' .$establecimiento->ID_EMPRESA .'- ' . $establecimiento->NOMBRE_COMERCIAL .'',
			
            'url' => ['/constancias/course-by-instructor', 'id'=>$model->ID_CURSO, 'id_est'=>$establecimiento->ID_EMPRESA, '#'=>'constancias'],
            'linkOptions' => [],
        ]; 
	
}


$tabs[]=[
'label' =>'<i class="fa fa-building">
							 </i> Empresa matriz',
							 	
							 'url' => ['/constancias/course-by-instructor', 'id'=>$model->ID_CURSO,'is_company'=>true, '#'=>'constancias'],
							 'linkOptions' => [],
							 ];


$tabs[] =    '<li class="pull-left header"><i class="fa fa-file-pdf-o"></i>Constancias </li>'; 




?>



<div class="row">


<div class="col-md-6 col-xs-12 col-sm-12">

<div class="box box-success">
        <div class="box-header with-border">
	        <i class="fa fa-laptop"></i>
          <h3 class="box-title">Detalles del curso</h3>
          <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" >
  
  				<dl class="dl-horizontal">
  				
  				 <dt><?= Yii::t('backend', 'Id') ?></dt>
                        <dd><?= $model->ID_CURSO?></dd>
                                                
                        <dt><?= Yii::t('backend', 'Nombre') ?></dt>
                        <dd><?= $model->NOMBRE ?></dd>
                        
                        

                        <dt><?= Yii::t('backend', 'Fecha de inicio') ?></dt>
                        <dd><?=($model->FECHA_INICIO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->FECHA_INICIO)) ;?></dd>
                     
                
                        
                        <dt><?= Yii::t('backend', 'Fecha de termino') ?></dt>
                         <dd><?=($model->FECHA_TERMINO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->FECHA_TERMINO)) ;?></dd>
                  
                        
                        <dt><?= Yii::t('backend', 'Duracion horas') ?></dt>
                        <dd><?= $model->DURACION_HORAS?></dd>
                        
                                          
                        <dt><?= Yii::t('backend', 'Area temática') ?></dt>         
                          <dd><?php
						$cur = \backend\models\Catalogo:: findone(['ID_ELEMENTO'=>$model-> AREA_TEMATICA, 'CATEGORIA'=>6, 'ACTIVO'=>1]);
         			echo isset($cur)?$cur->NOMBRE: 'no asignado'; ?>
						</dd>
                                                   
                                                     
                        <dt><?= Yii::t('backend', 'Descripción') ?></dt>
                        <dd><?= $model->DESCRIPCION	?></dd>
                        
                       <dt><?= Yii::t('backend', 'Estatus') ?></dt>
                      <dd><span class="label label-success"><?= Curso::statusDescription()[ $model->getCurrentStatus() ]; ?></span></dd>
                                               
                                                     
                   </dl>
          </div><!-- /.box-body -->
          
      	
</div><!-- /.box -->
</div>

  <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                      <i class="fa fa-university"></i>
                    <h2 class="box-title"><?= Yii::t('backend', 'Establecimiento(s) ') ?> <small>donde se impartirá el curso</small></h2>
                    
                    <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
                    
                </div><!-- /.box-header -->
                <div class="box-body">
                   
                <div class="box-body table-responsive">
         <table class="table table-hover" >
         
         <thead> 
	         <tr>
		         <th>No.</th>
		         <th>Id</th>
		         <th>Nombre comercial</th>  
		         		      
		         
		         <th>Domicilio</th>
	         </tr>
         </thead>
         
         <tbody>
         	
         	<?php $i = 0; foreach ($model->iDPLAN->planEstablecimientos as $establecimiento){?>
         	<tr>
         		<td><?= ++$i?></td>
         		
         		<td><?= $establecimiento->ID_EMPRESA?></td>
         		
         		<td><?= $establecimiento->NOMBRE_COMERCIAL?></td>
         	
         		<td><?= $establecimiento->CALLE .$establecimiento->NUMERO_INTERIOR .$establecimiento->NUMERO_EXTERIOR  ?></td>
         	           	
         	</tr>
         	
         	
         	<?php }?>
         </tbody>
        
        </table>
        </div>
        
                </div><!-- /.box-body -->
                
                
            </div>
        </div>   

</div>


 			<h4 class="page-header">
          Constancias de los trabajadores
                        <small> que deberá calificar en la fecha indicada  </small>
          </h4>   
<a name="constancias"></a>
 
          
          
          
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	
		<div class="nav-tabs-custom">
		
		<?php echo Nav::widget([
		    'items' => $tabs,
		    'options' => ['class' =>'nav nav-tabs pull-right'], // set this to nav-tab to get tab-styled navigation
			'encodeLabels' => false,
		]);
		
		
		?>
		
		<div class="tab-content">
		
		<?php $form = ActiveForm::begin([ 'options'=>['layout' => 'horizontal',  'id'=>'form2'],]); ?>
		
					<div class="table-responsive">		
						<table id="dataTable1" class="table table-condensed" cellspacing="0" >
							<thead>
								
								<tr >
									<th colspan="4" style="text-align: left;" ><i class="fa fa-user fa-lg"></i> &nbsp; <small class="text-muted">Datos trabajador</small></th>	
								</tr>
								<tr >
									<th>Id</th>
									<th><?=Yii::t('backend', 'Nombre')?></th>									
									<th><?=Yii::t('backend', 'CURP')?></th>
									<th><?=Yii::t('backend', 'Puesto')?></th>
								 	
																		
								</tr>
							</thead>
							<tbody>
							<?php $i = 0; foreach ($constancias as $constancia) :?>
							<?php $worker = $constancia->iDTRABAJADOR;?>
							   				
									<?php if ($constancia->ESTATUS === Constancia::STATUS_ASIGNADA || 
												$constancia->ESTATUS  ===  Constancia::STATUS_REJECTED ||  
													$constancia->ESTATUS  ===  Constancia::STATUS_RECHAZADA_MANAGER || 
														$constancia->ESTATUS  ===  Constancia::STATUS_SIGNED_INSTRUCTOR  ) :?>
							 
							
							<?php $avaliableStatus = Constancia::getAvaliableStatusByRol($constancia->ESTATUS, 7); ?>
								<tr>
									<td ><?= $worker->ID_TRABAJADOR?><?= $form->field($constancia, "[$i]ID_TRABAJADOR")->hiddenInput(['id'=>'hid_id_instructor'])->label(false) ?></td>
									<td><?= $worker->NOMBRE.' '. $worker->APP ?></td>
									<td><?= $worker->CURP?></td>
									<td><?= isset($worker->pUESTO)?$worker->pUESTO->NOMBRE_PUESTO: ''?></td>
									
                                
						  		   
								        	
								   
                									
									
										<span class="fa-stack fa-lg">
  											<i class="fa fa-download fa-stack-1x"></i>
  											<i class="fa fa-ban fa-stack-1x text-danger"></i>
										</span>
							
								
								
									
									</td>
								</tr>	
								
								<?php endif;?>
								
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
								
						      
						       <?php $id_establishment = Yii::$app->request->get('id_est'); ?> 
						       
						       <?php
						      
						       
						       		if ( $id_establishment !== null ) :   ?>
						       
						       		
						       
						     <?php else :     ?>
						       
						  
			   					
			   				<?php endif;?>	
						       
						        
						       
						   
						</div>
			
			 <?php ActiveForm::end(); ?>
		
		</div>
		
		</div>
	</div>

</div>





<!-- Modal  implementations -->

    					       
						

 <div class="modal fade" id="mod_worker_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i>&nbsp;<?=Yii::t('backend', 'Agregar un nuevo trabajador') ?></h4>
                                        </div>
	                                        <div class="modal-body">
	                                        
	                                        
	                                        
												<?php $form2 = ActiveForm::begin(['action'=>['trabajador/create-from-const-company','id_course'=>$model->ID_CURSO, ], 'options'=>['layout' => 'horizontal',  'id'=>'worker-form-company'],]); ?>
															
															<?php $trabajador = new Trabajador();?>
															
													<div class="col-md-6 col-xs-12 col-sm-12">		
												    <?= $form2->field($trabajador, 'NOMBRE')->textInput(['maxlength' => 100]) ?>

													    <?= $form2->field($trabajador, 'APP')->textInput(['maxlength' => 100]) ?>
													
													    <?= $form2->field($trabajador, 'APM')->textInput(['maxlength' => 100]) ?>
													       
													    <?= $form2->field($trabajador, 'SEXO')->dropDownList($itemsSex,['prompt'=>'- Seleccione -','id' => 'cat-id']) ?>
													    
													      
														            <?= $form2->field($trabajador, 'OCUPACION_ESPECIFICA')->dropDownList($dataListOcupacion,['prompt'=>'- Seleccione -','ID_ELEMENTO' => 'NOMBRE']) ?>
													     
														
													    
													</div>    
													 <div class="col-md-6 col-xs-12 col-sm-12">  
													    <?= $form2->field($trabajador, 'CURP')->textInput(['maxlength' => 18]) ?>
													
													     <?= $form2->field($trabajador, 'RFC')->textInput(['maxlength' => 13]) ?>
													
													     <?= $form2->field($trabajador, 'NSS')->textInput(['maxlength' => 20]) ?>
													     
													      <div class="row">
														     <div class=" col-xs-12 col-sm-12 col-md-10">
														        <?= $form2->field($trabajador, 'PUESTO')->dropDownList($datalistPuesto,['prompt'=>'-- Seleccione  --','ID_PUESTO' => 'NOMBRE_PUESTO']) ?>
													     	</div>
														     <div class=" col-xs-12 col-sm-12 col-md-2">
															     <br />
																	<button id="help_popup_puesto" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Lugar o espacio específico en el que la persona deberá desarrollar su actividad.. ') ?>"><i class="fa fa-question-circle"></i>
																</button>	   
															</div>
													    </div> 
													 </div>    
													       
													    
									<div class="row">
																					
										    </div>
										    
										    <?= Html::submitButton('<i class="fa fa-check-circle-o"></i>' .'&nbsp;'.Yii::t('backend', 'Guardar'), ['class' => 'btn btn-success', 'name'=>'newuser', 'id'=>'newuser' ]) ?>
										    <?php ActiveForm::end(); ?>
										    </div>
                                        <div class="modal-footer">
                                        	
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> <?= Yii::t('backend', 'cerrar')?></button>
                                            
                                        </div>
                                    </div>
                                </div>
</div>


     
 <div class="modal fade" id="mod_worker_establishment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i>&nbsp;<?=Yii::t('backend', 'Agregar un nuevo trabajador') ?></h4>
                                        </div>
	                                        <div class="modal-body">
	                                        
	                                        
	                                        <?php $id_est = Yii::$app->request->get('id_est'); ?>
												<?php $form2 = ActiveForm::begin(['action'=>['trabajador/createfromconst','id_course'=>$model->ID_CURSO, 'id_est'=>$id_est], 'options'=>['layout' => 'horizontal',  'id'=>'worker-form'],]); ?>
															
															<?php $trabajador = new Trabajador();?>
															
													<div class="col-md-6 col-xs-12 col-sm-12">		
												    <?= $form2->field($trabajador, 'NOMBRE')->textInput(['maxlength' => 100]) ?>

													    <?= $form2->field($trabajador, 'APP')->textInput(['maxlength' => 100]) ?>
													
													    <?= $form2->field($trabajador, 'APM')->textInput(['maxlength' => 100]) ?>
													       
													    <?= $form2->field($trabajador, 'SEXO')->dropDownList($itemsSex,['prompt'=>'- Seleccione -','id' => 'cat-id']) ?>
													    
													      
														            <?= $form2->field($trabajador, 'OCUPACION_ESPECIFICA')->dropDownList($dataListOcupacion,['prompt'=>'- Seleccione -','ID_ELEMENTO' => 'NOMBRE']) ?>
													     
														
													    
													</div>    
													 <div class="col-md-6 col-xs-12 col-sm-12">  
													    <?= $form2->field($trabajador, 'CURP')->textInput(['maxlength' => 18]) ?>
													
													     <?= $form2->field($trabajador, 'RFC')->textInput(['maxlength' => 13]) ?>
													
													     <?= $form2->field($trabajador, 'NSS')->textInput(['maxlength' => 20]) ?>
													     
													      <div class="row">
														     <div class=" col-xs-12 col-sm-12 col-md-10">
														        <?= $form2->field($trabajador, 'PUESTO')->dropDownList($datalistPuesto,['prompt'=>'-- Seleccione  --','ID_PUESTO' => 'NOMBRE_PUESTO']) ?>
													     	</div>
														     <div class=" col-xs-12 col-sm-12 col-md-2">
															     <br />
																	<button id="help_popup_puesto" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Lugar o espacio específico en el que la persona deberá desarrollar su actividad.. ') ?>"><i class="fa fa-question-circle"></i>
																</button>	   
															</div>
													    </div> 
													 </div>    
													       
													    
									<div class="row">
																					
										    </div>
										    
										    <?= Html::submitButton('<i class="fa fa-check-circle-o"></i>' .'&nbsp;'.Yii::t('backend', 'Guardar'), ['class' => 'btn btn-success', 'name'=>'newuser', 'id'=>'newuser' ]) ?>
										    <?php ActiveForm::end(); ?>
										    </div>
                                        <div class="modal-footer">
                                        	
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> <?= Yii::t('backend', 'cerrar')?></button>
                                            
                                        </div>
                                    </div>
                                </div>
</div>



<div class="modal fade" id="mod_workers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i>&nbsp;<?=Yii::t('backend', 'Crear una constancia para el trabajador') ?></h4>
                                        </div>
	                                        <div class="modal-body">
										 <?php \yii\widgets\Pjax::begin(['id' => 'workers-ajax','timeout' => false, 'enablePushState' => false, ]); ?>	
											    <?= GridView::widget([
											        'dataProvider' => $dataProvider,
											        'filterModel' => $searchModel,
											        'columns' => [
											            ['class' => 'yii\grid\SerialColumn'],
											
											            //'ID_EMPRESA',
											            //'ID_REPRESENTANTE_LEGAL',
											        		[
											        		'attribute'=>'PUESTO',
											        		'content'=>function($data){
											        		
											        			$tmpModel = PuestoEmpresa::findOne(['ID_PUESTO'=>$data->PUESTO, 'ACTIVO'=>1]);
											        		
											        			return isset($tmpModel)?$tmpModel->NOMBRE_PUESTO: $data->PUESTO;
											        		
											        		},
											        		'filter'=>ArrayHelper::map(PuestoEmpresa::findAll([ 'ACTIVO'=>1,'ID_EMPRESA'=>$companyModel->ID_EMPRESA]), 'ID_PUESTO','NOMBRE_PUESTO'),
											        		],
											            'ID_TRABAJADOR',
											            'NOMBRE',
														'APP',
											            'RFC',
											            //'NSS',
											            'CURP',
											            // 'MORAL',
											            // 'CALLE',
											            // 'NUMERO_EXTERIOR',
											            // 'NUMERO_INTERIOR',
											            // 'COLONIA',
											            // 'ENTIDAD_FEDERATIVA',
											            // 'LOCALIDAD',
											            // 'TELEFONO',
											            // 'MUNICIPIO_DELEGACION',
											            // 'GIRO_PRINCIPAL',
											            // 'NUMERO_TRABAJADORES',
											            // 'CODIGO_POSTAL',
											            // 'FAX',
											            // 'CORREO_ELECTRONICO',
										  	            // 'ACTIVO',
													[
														'label'=>'',
														'format'=>'raw',
														'value' => function($data){
															
														return  Html::a('<i class="fa fa-check-circle-o"></i>&nbsp; Crear',['add-constancia','id'=>Yii::$app->request->get('id'),'id_trab'=>$data->ID_TRABAJADOR],
																['class' => 'btn btn-primary',
																'data-loading-text'=>"Loading...",
																'id'=>'legal_'.$data->ID_TRABAJADOR,
																'onclick'=>"
																//$('#legal_$data->ID_TRABAJADOR').removeAttr('href');
																$('#legal_$data->ID_TRABAJADOR').fadeIn(300);
																$('#legal_$data->ID_TRABAJADOR').text('...');
																$('#legal_$data->ID_TRABAJADOR').removeClass('btn btn-primary').addClass('btn btn-success');
																return true;
																",
																]
														);
													}
																]										
											           
											        ],
											    ]); ?>
												<?php \yii\widgets\Pjax::end(); ?>
										    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> <?= Yii::t('backend', 'Salir')?></button>
                                            
                                        </div>
                                    </div>
                                </div>
