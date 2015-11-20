<?php 

use yii\web\View;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use backend\models\Plan;
use backend\models\Constancia;
use backend\models\Catalogo;
use yii\helpers\Html;
use backend\models\ComisionMixtaCap;
use yii\widgets\ActiveForm;
use frontend\models\ContactForm;
use yii\captcha\Captcha;

$this->title = "Bienvenido instructor " . ( $model->NOMBRE ==null ) ?  Yii::$app->user->identity->username   :  strtoupper($model->NOMBRE . ' ' . $model->APP . ' ' . $model->APM) ;


$this->params['subtitle'] = 'Bienvenido';

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-graduation-cap  fa-stack-1x"></i>
							   </span>';
$this->registerJs("$('#dataTable1').dataTable( {'language': {'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json' }});", View::POS_END, 'my-options');


?>
				<!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                      <i class="fa fa-laptop fa-lg"></i>
                                        <?php  echo count($model->cursos); ?>
                                        
                                        
                                        
                                        
                                    </h3>
                                    <p>
                                                                     
                                       Cursos evaluandos
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_comision">
                                  DC-1  More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                      <i class="glyphicon glyphicon-calendar"></i>
                                                                                             
                                     
                                         
                                         <?= count(Constancia::findBySql("select * from tbl_constancia  where ID_CURSO  ")->all()); 
                                        
                                         
                                        ?>
                                   
                                    </h3>
                                    <p>
                                       Constancias por firmar
                                        
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_plan">
                                 DC-2   More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                    <i class="fa  fa-file-pdf-o"></i>
                                    
                                        <?=  8 // count(Constancia::findBySql("select * from tbl_constancia where ID_EMPRESA = $model->ID_EMPRESA AND ACTIVO = 1")->all()); 
                                        
                                        
                                        ?>
                                    </h3>
                                    <p>
                                        Constancias en revisión
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_constancia1">
                                   DC-3 More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        0
                                    </h3>
                                    <p>
                                        Listas de constancias enviadas
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_constancia">
                                    DC-4 More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    
          <h4 class="page-header" id="anchor_comision">
          
                        <small>Cursos por impartir</small>
          </h4>          
          
          
          <div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">
		 <div class="box box-info" id="controls">
				
				<div class="box-header">
					 <i class="fa fa-laptop"></i>
			    	
			    				
			   	</div>
          
          	
				<div class="box-body table-responsive">
						
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Fecha de inicio</th>
								<th>Fecha de fin</th>
								
								<th>Instructor</th>
							    <th>Número de registro agente externo</th>
							    <th>Área temática</th>
							   
							 
							
							  
							 </tr>					
						</thead>
						
						<tbody>
						
								<?php foreach ($model->cursos as $curso):?>
								<tr>
		
									 <td><?= $curso->ID_CURSO ?></td>
					
									 <td><?= $curso->NOMBRE ?></td>
										               
			                            <td><?=($curso->FECHA_INICIO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($curso->FECHA_INICIO)) ;?></td>
			                    
			                          
								     <td><?=($curso->FECHA_TERMINO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($curso->FECHA_TERMINO)) ;?></td>
			      
										
																			
									 <td>	
										<?php if (isset($curso->iDINSTRUCTOR)){?>	
											<?= $curso->iDINSTRUCTOR->NOMBRE ?>
										<?php }?>
									 </td>
										
					            	 <td>
										<?php if(isset($curso->iDINSTRUCTOR)){?>
										
										<?=$curso->iDINSTRUCTOR->NUM_REGISTRO_AGENTE_EXTERNO ?>
										
										<?php }?>
									 </td>
									
									   <td><?php 
                                    $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$curso->AREA_TEMATICA, 'CATEGORIA'=>6, 'ACTIVO'=>1]);
         			               echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?></td>
         			         		          					            	
				            			            	
							</tr>
							<?php endforeach;?>	
						</tbody>
					</table>
					
				</div>
                    </div>
                    </div></div>
                               	
    	  	   	
    	      <h4 class="page-header" id="anchor_comision">
          
                        <small>Constancias por firmar</small>
          </h4>          
                    
     		   		
                            <!-- Custom Tabs (Pulled to the right) -->
                            
                              <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-paperclip"></i>                                
                                    
                                   
                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive" >
                                
                                	<table id="dataTable1" class="table table-bordered" cellspacing="0"  width="100%">
							<thead>
							
							<tr>
									<td colspan="5"><i class="fa fa-user"></i> Datos trabajador</td>
									<td colspan="5"><i class="fa fa-file-pdf-o"></i> Datos constancia</td>
									
									
									<th></th>
							</tr>
							
								<tr>
									<th>Id</th>
									<th><?=Yii::t('backend', 'Nombre')?></th>									
									<th><?=Yii::t('backend', 'A. paterno')?></th>
									<th><?=Yii::t('backend', 'CURP')?></th>
									<th><?=Yii::t('backend', 'Ocupación')?></th>
									<th><?=Yii::t('backend', 'Establecimiento')?></th>
									<th>Curso</th>
									<th>Obtención</th>
									<th>Tipo</th>
									<th><?=Yii::t('backend', 'Fecha emisión')?></th>
									
									
								
									
									
							
									<th></th>
																											
								</tr>
							</thead>
							<tbody>
					<!--  		<?php //$i = 0; 
							
							//$constanciasItems =   $model->iDCONSTANCIAs;//Constancia::findBySql('select * from tbl_constancia where ID_TRABAJADOR in (select ID_TRABAJADOR from tbl_trabajador where ID_EMPRESA IN (SELECT ID_ESTABLECIMIENTO FROM tbl_lista_establecimiento where ID_LISTA = '.$model->ID_LISTA.')  AND ACTIVO = 1) AND ESTATUS > 1')->all();
							
							//foreach ($constanciasItems as $constancia) :?>
							//<?php// $worker = $constancia->iDTRABAJADOR;?>
							
								<tr>
									<td><?//= $constancia->ID_CONSTANCIA; ?></td>
										<td><?//= $constancia->iDTRABAJADOR->NOMBRE;?></td>
									<td><?//= $constancia->iDTRABAJADOR->APP;?></td>
									<td><?//= $constancia->iDTRABAJADOR->CURP;?></td>
									
									<td><?//= $constancia->iDTRABAJADOR->iDEMPRESA->NOMBRE_COMERCIAL;?></td>
									
									
									<td><?//= $constancia->iDCURSO->NOMBRE;?></td>
									<td><?//= isset(Constancia::getAllMetodosType()[$constancia->METODO_OBTENCION])?Constancia::getAllMetodosType()[$constancia->METODO_OBTENCION] : '<i class"text text-muted">no asignado</i>' ?></td>	
									<td><?//=// isset(Constancia::getAllContanciasType()[$constancia->TIPO_CONSTANCIA])?Constancia::getAllContanciasType()[$constancia->TIPO_CONSTANCIA] : '<i class"text text-muted">no asignado</i>'; ?></td>
									<td><?//=($constancia->FECHA_EMISION_CERTIFICADO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($constancia->FECHA_EMISION_CERTIFICADO)) ;?></td>
																	
																									
									
								
								</tr>	
								
							 //$i++; endforeach;?> -->
							</tbody>
							
						</table>	
                                
                                </div>
                           </div> 
                                             

    
    	
    	                     
                    
                    
                    
									                     <div class="box box-info">
									                                <div class="box-header ui-sortable-handle" style="cursor: move;">
									                                    <i class="fa fa-envelope"></i>
									                                    <h3 class="box-title">Enviar correo a soporte tecnico</h3>
									                                    <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div>
									                                    <!-- tools box -->
									                                   
																	                                                            
										</div>
										<div class="box-body">
										 <?php 
										 
										 $concact = new ContactForm();
										 $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($concact, 'name') ?>
                <?= $form->field($concact, 'email') ?>
                <?= $form->field($concact, 'subject') ?>
                <?= $form->field($concact, 'body')->textArea(['rows' => 6]) ?>
              
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            </div>
                        
                        </div>
                    </div>
                    </div>