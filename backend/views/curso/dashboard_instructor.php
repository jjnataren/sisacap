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

$this->title = 'Bienvenido ' .strtoupper($model->NOMBRE_RAZON_SOCIAL);


$this->params['subtitle'] = '';

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-building fa-lg  fa-stack-1x"></i>
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
                                      <i class="glyphicon glyphicon-copyright-mark"></i>
                                        <?=  count(ComisionMixtaCap::findBySql('select * from tbl_comision_mixta_cap where id_empresa ='.$model->ID_EMPRESA.' AND activo = 1')->all()); ?>
                                    </h3>
                                    <p>
                                                                     
                                        Comisiones activas en la organización
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
                                                <?= count (Plan::findBySql("select * from tbl_plan  where ID_COMISION IN (select ID_COMISION_MIXTA from tbl_comision_mixta_cap where ID_EMPRESA =$model->ID_EMPRESA AND ACTIVO = 1 ) AND ACTIVO = 1")->all()); ?>
                                    </h3>
                                    <p>
                                        Planes  en ejecución
                                        
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
                                    
                                        <?= count(Constancia::findBySql("select * from tbl_constancia where ID_EMPRESA = $model->ID_EMPRESA AND ACTIVO = 1")->all()); 
                                        
                                        
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
          
                        <small>Comisiones mixtas de capacitación y adiestramiento</small>
          </h4>          
                    
               <div class="row">     
                <div class="col-md-6 col-sm-12 col-xs-12">
                            <!-- Custom Tabs (Pulled to the right) -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs pull-right">
                                    
                                    <?php $i=0; foreach($model->comisionMixtaCaps as $comision):?>
                                    <li class="<?= (!$i++)?'active':'' ?>"><a data-toggle="tab" href="#tab_1_comision_<?= $comision->ID_COMISION_MIXTA?>">#<?= $comision->ID_COMISION_MIXTA ?></a></li>
                                   
                                    <?php endforeach;?>
                                    <li class="pull-left header"><i class="glyphicon glyphicon-copyright-mark"></i> Últimas comisiones</li>
                                </ul>
                                <div class="tab-content">
                                   <?php $i=0; foreach($model->comisionMixtaCaps as $comision):?> 
                                    <div id="tab_1_comision_<?= $comision->ID_COMISION_MIXTA?>" class="tab-pane <?= (!$i++)?'active':''?>">
                                        
                                      <dl class="dl-horizontal">
                                        <dt><h3>ID</h3></dt>
                                        <dd><h3><?=$comision->ID_COMISION_MIXTA ?></h3></dd>
                                        <dt>Alias</dt>
                                        <dd><?=$comision->ALIAS ?></dd>
                                        <dd><small><?=$comision->DESCRIPCION ?></small></dd>
                                        <dt>No. integrantes</dt>
                                        <dd><?=$comision->NUMERO_INTEGRANTES; ?></dd>
                                        <dt>No. establecimientos dondé rige</dt>
                                        <dd><?=count($comision->iDESTABLECIMIENTOs); ?></dd>
                                        <dt>Fecha constitución</dt>
                                        <dd><?=($comision->FECHA_CONSTITUCION === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($comision->FECHA_CONSTITUCION)) ;?></dd>
                                        <dt>Fecha elaboración</dt>
                                        <dd><?=($comision->FECHA_ELABORACION === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($comision->FECHA_ELABORACION)) ;?></dd>
                                        <dt></dt>
                                        <dd>&nbsp;</dd>
                                        <dt><i>Fecha creación</i></dt>
                                        <dd><?=($comision->FECHA_AGREGO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y H:i",strtotime($comision->FECHA_AGREGO)) ;?></dd>
                                        <dt><i>Estatus</i></dt>
                                        <dd><span class="label label-success"><?= $comision->getStatus(); ?></span></dd>
                                    </dl> 
                                    
                                    <p class="text-right">
                                    <?= Html::a('<i class="fa fa-cogs"></i> Administrar', ['comision-mixta-cap/dashboard','id'=>$comision->ID_COMISION_MIXTA], ['class' => 'btn btn-primary btn-flat btn-sm']) ?>
                                    </p>   
                                     </div><!-- /.tab-pane -->
                                     <?php endforeach;?>
                                     
                                   </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div>
                     <div class="col-md-6 col-xs-12 col-sm-12">
                            <!-- AREA CHART -->
                            <div class="box box-primary">
                                <div class="box-header">
                                   <i class="glyphicon glyphicon-copyright-mark"></i>
                                    <h3 class="box-title">Comisiones en la organización</h3>
                                     <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div>
                                </div>
                                <div class="box-body">
                                <?php 
                                
                                $categories =[];
                                $establecimientos =[];
                                $integrantes = [];
                                
                                foreach($model->comisionMixtaCaps as $comision){
                                	
                                	$categories[] = 'ID '.$comision->ID_COMISION_MIXTA;  
                                	$establecimientos[] = count ($comision->iDESTABLECIMIENTOs);
                                	$integrantes[] = $comision->NUMERO_INTEGRANTES;
                                }
                                
                              echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => [
            'text' => 'Comisiones dentro de la organización',
        ],
        'xAxis' => [
            'categories' =>$categories,
        ],
        
        'series' => [
           
            [
                'type' => 'column',
                'name' => 'No. establecimientos',
                'data' => $establecimientos
            ],
            [
                'type' => 'column',
                'name' => 'No. integrantes',
                'data' => $integrantes
            ],
            [
                'type' => 'spline',
                'name' => 'Promedio establecimientos',
                'data' => $establecimientos,
                'marker' => [
                    'lineWidth' => 2,
                    'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
                    'fillColor' => 'white',
                ],
            ],
				[
				'type' => 'spline',
				'name' => 'Promedio integrantes',
				'data' => $integrantes,
				'marker' => [
				'lineWidth' => 2,
				'lineColor' => new JsExpression('Highcharts.getOptions().colors[2]'),
				'fillColor' => 'white',
				],
				],
           
        ],
    ]
]);
                                   ?>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                 

                        </div>
                    </div>
                    
  <h4 class="page-header" id="anchor_plan">
          Planes 
   		<small>Planes y programas de capacitación, adiestramiento y productividad</small>
   </h4>                     
                    
                    <div class="row">
   						<div class="col-md-5 col-sm-12 col-xs-12">
                            <!-- Custom Tabs (Pulled to the right) -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs pull-right">
                                    
                                    
                                    
                                    
                                    <?php $i=0; 
                                    
                                    	$plansItems = Plan::findBySql('SELECT * FROM tbl_plan WHERE ID_COMISION IN (SELECT ID_COMISION_MIXTA from tbl_comision_mixta_cap WHERE ID_EMPRESA = '.$model->ID_EMPRESA.' )')->all();
                                    
                                    foreach($plansItems as $plan):?>
                                    <li class="<?= (!$i++)?'active':'' ?>"><a data-toggle="tab" href="#tab_1_plan_<?= $plan->ID_PLAN?>">#<?= $plan->ID_PLAN ?></a></li>
                                    <?php endforeach;?>
                                    <li class="pull-left header"><i class="fa fa-calendar"></i> Últimos planes</li>
                                </ul>
                                
                                
                                <div class="tab-content">
                                  
                                   <?php $i=0; foreach($plansItems as $plan):?> 
                                    <div id="tab_1_plan_<?= $plan->ID_PLAN?>" class="tab-pane <?= (!$i++)?'active':''?>">
                                        
                                      <dl class="dl-horizontal">
                                        <dt><h3>ID</h3></dt>
                                        <dd><h3><?=$plan->ID_PLAN ?></h3></dd>
                                        <dt>Alias</dt>
                                        <dd><?=$plan->ALIAS ?></dd>
                                        <dd><small><?=$plan->DESCRIPCION_PLAN ?></small></dd>
                                      
                                        <dt>No. establecimientos</dt>
                                        <dd><?=count($plan->iDESTABLECIMIENTOs); ?></dd>
                                        
                                        <dt>No.Trabajadores hombres</dt>
                                        <dd><?=$plan->TOTAL_HOMBRES ?></dd>
                                        
                                        <dt>No. Trabajadores mujeres</dt>
                                        <dd><?=$plan->TOTAL_MUJERES ?></dd>
                                        
                                          <dt>TOTAL</dt>
                                        <dd><?=$plan->TOTAL_MUJERES + $plan->TOTAL_MUJERES ?></dd>
                                        
                                        <dt>Puestos trabajador <span class="label label-info"><?= count($plan->iDPUESTOs) ?></span></dt>
                                        <dd>
                                        <ul>
	                                        <?php 
	                                        foreach ($plan->iDPUESTOs as $puesto)                                        	
	                    						echo '<li>'. $puesto->NOMBRE_PUESTO .'</li>';      
	                    						                                  
	                                        ?>
                                        </ul>
                                        </dd>
                                        
                                        <dt>Cursos <span class="label label-info"><?= count($plan->cursos) ?></span></dt>
                                        <dd>
                                        <ol>
                                        <?php 
                                        foreach ($plan->cursos as $curso)                                        	
                    						 echo '<li>'.$curso->NOMBRE.  '</li>' ;      
                    						                                  
                                        ?>
                                        </ol>
                                        </dd>
                                        
                                        <dt>Vigencia inicio</dt>
                                        <dd><?=($plan->VIGENCIA_INICIO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($plan->VIGENCIA_INICIO)) ;?></dd>
                                        <dt>Vigencia fin</dt>
                                        <dd><?=($plan->VIGENCIA_FIN === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($plan->VIGENCIA_FIN)) ;?></dd>
                                        <dt></dt>
                                        <dd>&nbsp;</dd>
                                        <dt><i>Fecha creación</i></dt>
                                        <dd><?=($plan->FECHA_AGREGO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y H:i",strtotime($plan->FECHA_AGREGO)) ;?></dd>
                                        <dt><i>Estatus</i></dt>
                                        <dd><span class="label label-success"><?= 'cualquiera' ?></span></dd>
                                    </dl>  
                                    <p class="text-right">
                                    	<?= Html::a('<i class="fa fa-cogs"></i> Administrar', ['plan/dashboard','id'=>$plan->ID_PLAN], ['class' => 'btn btn-primary btn-flat btn-sm']) ?>
                                    </p>     
                                     </div><!-- /.tab-pane -->
                                     <?php endforeach;?>
                                     
                                   </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div>
                        
                          <div class="col-md-7 col-sm-12 col-xs-12">
                            <!-- AREA CHART -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Comparativa de planes</h3>
                                     <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div>
                                </div>
                                <div class="box-body">
                                
                                	 <?php 
                                
                                $categories =[];
                                $establecimientos =[];
                                $integrantes = [];
                                $hombres = [];
                                $mujeres = [];
                                $trabajadores = [];
                                
                                foreach($plansItems as $plan){
                                	
                                	$categories[] = 'ID '.$plan->ID_PLAN;  
                                	$trabajadores[] = $plan->TOTAL_HOMBRES +  $plan->TOTAL_MUJERES;
                                	$hombres[] = $plan->TOTAL_HOMBRES;
                                	$mujeres[] = $plan->TOTAL_MUJERES;
                                	//$integrantes[] = $comision->NUMERO_INTEGRANTES;
                                }
                                
                              echo Highcharts::widget([
										    'scripts' => [
										        'modules/exporting',
										        'themes/grid-light',
										    ],
										    'options' => [
										        'title' => [
										            'text' => 'Trabajadores que seran capacitados por plan',
										        ],
										        'xAxis' => [
										            'categories' =>$categories,
										        ],
										        
										        'series' => [
										           
										            [
										                'type' => 'column',
										                'name' => 'Total trabajadores',
										                'data' => $trabajadores
										            ],
										            [
										                'type' => 'column',
										                'name' => 'Total hombres',
										                'data' => $hombres
										            ],
													[
													'type' => 'column',
													'name' => 'Total mujeres',
													'data' => $mujeres
													],
										            [
										                'type' => 'spline',
										                'name' => 'Promedio trabajadores',
										                'data' => $trabajadores,
										                'marker' => [
										                    'lineWidth' => 2,
										                    'lineColor' => new JsExpression('Highcharts.getOptions().colors[4]'),
										                    'fillColor' => 'white',
										                ],
										            ],
														/*[
														'type' => 'spline',
														'name' => 'Promedio hombres',
														'data' => $hombres,
														'marker' => [
														'lineWidth' => 2,
														'lineColor' => new JsExpression('Highcharts.getOptions().colors[6]'),
														'fillColor' => 'white',
														],
														],
														[
														'type' => 'spline',
														'name' => 'Promedio mujeres',
														'data' => $mujeres,
														'marker' => [
														'lineWidth' => 2,
														'lineColor' => new JsExpression('Highcharts.getOptions().colors[1]'),
														'fillColor' => 'white',
														],
												
														],*/
										           
										        ],
										    ]
										]);
                                   ?>
                                
                                </div>
                            </div>
                          </div>      
                    
                    </div>
                    
 <h4 class="page-header" id="anchor_constancia">
          Constancias 
   		<small>Constancias emitidas a los trabajadores</small>
   </h4>     
    
                    
                    <div class="row">
                        <!-- Left col -->
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!-- Custom Tabs (Pulled to the right) -->
                            
                              <div class="box box-primary">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">Resumen de constancias </h3>
                                     <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div>
                                   
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive" >
                                
                                	<table id="dataTable1" class="table table-bordered" cellspacing="0"  width="100%">
							<thead>
								<tr>
									<th>Id</th>
									<th>Plan</th>
									<th>Curso</th>
									<th><?=Yii::t('backend', 'Nombre')?></th>									
									<th><?=Yii::t('backend', 'A. paterno')?></th>
									<th><?=Yii::t('backend', 'CURP')?></th>
									<th><?=Yii::t('backend', 'Ocupación')?></th>
									<th><?=Yii::t('backend', 'Fecha emisión')?></th>
									<th>Obtención</th>
									<th>Tipo</th>
									<th>Estatus</th>
																											
								</tr>
							</thead>
							<tbody>
							<?php $i = 0; 
							
							$constanciasItems = Constancia::findBySql('SELECT * FROM tbl_constancia WHERE ID_EMPRESA = '.$model->ID_EMPRESA.' AND ACTIVO = 1 AND ID_CURSO > 0')->all();
							
							foreach ($constanciasItems as $constancia) :?>
							<?php $worker = $constancia->iDTRABAJADOR;?>
							
								<tr>
									<td><?= Html::a('<i class="fa  fa-arrow-circle-right"></i> '.$constancia->ID_CONSTANCIA, ['constancias/dashboard','id'=>$constancia->ID_CONSTANCIA], ['class' => 'btn']) ?></td>
									<td><?= $constancia->iDCURSO->iDPLAN->ALIAS;?></td>
									<td><?= $constancia->iDCURSO->NOMBRE;?></td>
									<td><?= $constancia->iDTRABAJADOR->NOMBRE?></td>
									<td><?= $constancia->iDTRABAJADOR->APP?></td>
									<td><?= $constancia->iDTRABAJADOR->CURP?></td>
									<td>
									<?php $ocupacionEspecifica = Catalogo::findOne($constancia->iDTRABAJADOR->OCUPACION_ESPECIFICA);?>
									<?= isset($ocupacionEspecifica)?$ocupacionEspecifica->NOMBRE: '<i class="text text-muted">no establecido</i>';?>
									</td>
									<td><?= $constancia->FECHA_EMISION_CERTIFICADO?></td>
									<td><?= isset(Constancia::getAllMetodosType()[$constancia->METODO_OBTENCION])? Constancia::getAllMetodosType()[$constancia->METODO_OBTENCION]: '<i>no establecido</i>' ?></td>	
									<td><?= isset(Constancia::getAllContanciasType()[$constancia->TIPO_CONSTANCIA])? Constancia::getAllContanciasType()[$constancia->TIPO_CONSTANCIA] : '<i>no establecido</i>' ?></td>
									<?php

									$labelType = '';
										switch ($constancia->ESTATUS){
											case 1:
												$labelType = 'label label-warning';
												break;
											case 2:
												$labelType = 'label label-success';
												break;
											default:
												$labelType = 'label';
										}
									?>
									<td><span class="<?=$labelType ?>"><?= $constancia->getCurrentStatus() ?></span></td>
									
								</tr>	
								
							<?php  $i++; endforeach;?>
							</tbody>
							
						</table>	
                                
                                </div>
                           </div> 
                            
                         
                        </div>
                        
                      </div>  
                        
                         <h4 class="page-header" id="anchor_constancia1">
       
   </h4> 
                      <div class="row">  
                        
                       <div class="col-md-12 col-xs-12 col-sm-12">
                            <!-- AREA CHART -->
                            <div class="box box-primary">
                                <div class="box-header" >
                                    <h3 class="box-title">Constancias [emitidas/en proceso] por plan de capacitación</h3>
                                     <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div>
                                </div>
                                <div class="box-body">
                                
                                
                                   	 <?php 
                                
                                $categories = [];
                                $constanciasEmitidas =[];
                                $constanciasProceso = [];
                                $constanciasTotal = [];
                                $constanciasCertificadas = [];
                                $constanciasComprobante = [];
                                $mujeres = [];
                               
                                
                                foreach($plansItems as $plan){
                                	
									$totalConstancias = 0;
									$totalConstanciasEmitidas = 0;
									$totalConstanciasProceso = 0;
									$totalConstanciasCertificadas = 0;
									$totalConstanciasComprobante = 0;
                                	$categories[] = 'ID '.$plan->ID_PLAN;
								  	foreach ($plan->cursos as $curso){
                                		
											$totalConstancias+= count($curso->constancias);
											
											foreach ($curso->constancias as $tmp_constancia){
											
													switch($tmp_constancia->ESTATUS){
														case 1:
															$totalConstanciasProceso++;
														break;
														case 2:
															$totalConstanciasEmitidas++; 
													}
													
													switch($tmp_constancia->TIPO_CONSTANCIA){
														case 1:
															$totalConstanciasCertificadas++;
															break;
														case 2:
															$totalConstanciasComprobante++;
													}
													
											
											}
											
                                	}
                                	
                                	
                                	$constanciasTotal[] = $totalConstancias;
                                	$constanciasEmitidas [] = $totalConstanciasEmitidas;
                                	$constanciasProceso [] = $totalConstanciasProceso;
                                	$constanciasCertificadas[] = $totalConstanciasCertificadas;
                                	$constanciasComprobante[] = $totalConstanciasComprobante;
                                	//$trabajadores[] = $plan->TOTAL_HOMBRES +  $plan->TOTAL_MUJERES;
                                	//$hombres[] = $plan->TOTAL_HOMBRES;
                                	//$mujeres[] = $plan->TOTAL_MUJERES;
                                	//$integrantes[] = $comision->NUMERO_INTEGRANTES;
                                }
                                
                              echo Highcharts::widget([
										    'scripts' => [
										        'modules/exporting',
										        'themes/grid-light',
										    ],
										    'options' => [
										        'title' => [
										            'text' => 'Total constancias por plan',
										        ],
										        'xAxis' => [
										            'categories' =>$categories,
										        ],
										        
										        'series' => [
										           
										            [
										                'type' => 'column',
										                'name' => 'Total constancias',
										                'data' => $constanciasTotal
										            ],
										            [
										                'type' => 'column',
										                'name' => 'Constancias emitidas',
										                'data' => $constanciasEmitidas
										            ],
													[
													'type' => 'column',
													'name' => 'Constancias proceso',
													'data' => $constanciasProceso
													],
										         /*   [
										                'type' => 'spline',
										                'name' => 'Promedio trabajadores',
										                'data' => $trabajadores,
										                'marker' => [
										                    'lineWidth' => 2,
										                    'lineColor' => new JsExpression('Highcharts.getOptions().colors[4]'),
										                    'fillColor' => 'white',
										                ],
										            ],*/
														
										           
										        ],
										    ]
										]);
                                   ?>
                                
               					</div>
               				</div>		
                        </div>
                        </div>
                        
                        
                     <div class="row">  
                        
                       <div class="col-md-12 col-xs-12 col-sm-12">
                            <!-- AREA CHART -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Constancias [Certificadas/comprobante] por plan de trabajo</h3>
                                     <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div>
                                </div>
                                <div class="box-body">
                                <?php 
                                
                                echo Highcharts::widget([
                                		'scripts' => [
                                		'modules/exporting',
                                		'themes/grid-light',
                                		],
                                		'options' => [
                                		'title' => [
                                		'text' => 'Total constancias certificadas (DC-3) por plan',
                                		],
                                		'xAxis' => [
                                		'categories' =>$categories,
                                		],
                                
                                		'series' => [
                                		 
                                		[
                                		'type' => 'column',
                                		'name' => 'Total constancias',
                                		'data' => $constanciasTotal
                                		],
                                		[
                                		'type' => 'column',
                                		'name' => 'Constancias certificadas',
                                		'data' => $constanciasCertificadas
                                		],
                                		[
                                		'type' => 'column',
                                		'name' => 'Constancias comprobante',
                                		'data' => $constanciasComprobante
                                		],
                                		/*   [
                                		 'type' => 'spline',
                                'name' => 'Promedio trabajadores',
                                'data' => $trabajadores,
                                'marker' => [
                                'lineWidth' => 2,
                                'lineColor' => new JsExpression('Highcharts.getOptions().colors[4]'),
                                'fillColor' => 'white',
                                ],
                                ],*/
                                
                                		 
                                		],
                                		]
                                		]);
                                
                                ?>
                        		</div>
                        	</div>
                        </div>
                        
                        		
                   
                    
                    </div>

                
    <h4 class="page-header">
          Soporte y Ayuda
                        <small>Contenido de ayuda</small>
    </h4>    
                

                <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Información util</h3>
                                     <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div id="accordion" class="box-group">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse">
                                                                                                   
                                                     <h3>  <b> DC-1 Comisiones Mixtas de Capacitacion y Adiestramiento</b></h3>
                                                  
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse in" id="collapseOne">
                                                <div class="box-body">
 <h4>Artículo 7. Las Comisiones Mixtas de Capacitación, Adiestramiento y Productividad deberán constituirse en cada empresa que cuente con más de 50 trabajadores, e integrarse de manera bipartita y paritaria, por igual número de representantes de los trabajadores y del patrón.</h4>
                                                <h4>Las Comisiones Mixtas de Capacitación, Adiestramiento y Productividad, deberán realizar las siguientes funciones:</h4>
                                                <br>
                                                <h4><br>I.	Vigilar, instrumentar, operar y mejorar los sistemas y los programas de capacitación y adiestramiento;</br>
                                                    <br>II.	Proponer los cambios necesarios en la maquinaria, los equipos, la organización del trabajo y las relaciones laborales, de conformidad con las mejores prácticas tecnológicas y organizativas que incrementen la productividad en función de su grado de desarrollo actual;</br>
                                                    <br>III.	Proponer las medidas acordadas, con el propósito de impulsar la capacitación, medir y elevar la productividad, así como garantizar el reparto equitativo de sus beneficios;</br>
                                                   <br> IV.	Vigilar el cumplimiento de los acuerdos de productividad;</br>
                                                  <br>  V.	Resolver las objeciones que, en su caso, presenten los trabajadores con motivo de la distribución de los beneficios de la productividad;</br>
                                                                                                 		                         
                                                
                                                </h4>                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel box box-danger">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse">
                                                       <h3>  <b> DC-2 Planes y Programas de Capacitación, Adiestramiento y Productividad</b></h3>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="collapseTwo">
                                                <div class="box-body">
                                                <h4><br>Artículo 9. Los planes y programas de capacitación se elaborarán mediante el formato DC-2 “Elaboración del plan y programas de capacitación, adiestramiento y productividad”, según el modelo anexo, dentro de los sesenta días hábiles siguientes al inicio de operaciones en el centro de trabajo</br>
                                                
                                                <br>Artículo 10. Para la elaboración de los planes y programas se deberá:</br>
<br>I.	Tomar en cuenta las necesidades de capacitación y adiestramiento de todos los puestos y niveles de trabajo existentes en la empresa;</br>
<br>II.	Precisar el número de etapas durante las cuales se impartirán;</br>
<br>III.	Indicar si se trata de planes y programas de capacitación y adiestramiento específicos para una empresa; comunes para varias empresas o bien si se encuentran adheridos a un sistema general de capacitación y adiestramiento por rama o actividad; y, en su caso, los establecimientos en los que  se aplica;</br>
<br>IV.	Establecer periodos no mayores de dos años;	</br>
<br>V.	Considerar la impartición de la capacitación o adiestramiento por conducto del personal de la propia empresa, instructores especialmente contratados, instituciones, escuelas u organismos especializados;</br>
                                                
                                                                                                    
                                                </h4>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                                 <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a href="#collapseThree" data-parent="#accordion" data-toggle="collapse">
                                                        <h3>  <b> DC-3 Agentes Capacitadores Externos</b></h3>
                                                    </a>
                                                    
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="collapseThree">
                                                <div class="box-body">
                                                <h4>
                                                
                                                <br>
                                                Artículo 16. Los Agentes Capacitadores Externos deberán solicitar su autorización y registro ante la Secretaría, así como el registro de los programas y cursos de capacitación que deseen impartir de conformidad con lo siguiente:
                                                </br>
                                                <br>I.	Cuando se trate de instituciones, escuelas u organismos especializados de capacitación deberán presentar el Formato DC-5 “Solicitud de Registro de Agente Capacitador Externo”, según modelo anexo y acompañar la siguiente documentación:</br>
                                                <br> II.	Cuando se trate de instructores independientes, deberán presentar el formato DC-5 “Solicitud de Registro de Agente Capacitador Externo”, según modelo anexo y la siguiente documentación:</br>
                                                <br>Artículo 17. Cuando se hayan presentado de forma personal los documentos correspondientes, la Secretaría entregará de forma inmediata el acuse de recibo correspondiente.
Si la solicitud se presentó por correo certificado o servicios de mensajería, el acuse de recibo será enviado al solicitante el día hábil siguiente a la fecha de recepción de la solicitud, devolviendo la documentación original que hubiese acompañado, de conformidad con lo establecido en el artículo 27, segundo párrafo del presente Acuerdo.
                                                </br>
                                                </h4>
                                              <br>   
                                                </div>
                                            </div>
                                        </div>
                                                                                                                        
                                        <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a href="#collapseFour" data-parent="#accordion" data-toggle="collapse">
                                                        <h3>  <b> DC-4 Listas de Constancias de Competencias o de Habilidades Laborales</b></h3>
                                                    </a>
                                                    
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="collapseFour">
                                                <div class="box-body">
                                                <h4>
                                                
                                                <br>
                                            


<h4>Artículo 24. La constancia de competencias o de habilidades laborales deberá:<br>

<br><b>I.	Expedirse por:<br></b>

     <br>a.	La entidad instructora cuando se trate de agentes capacitadores externos;<br>

     <br>b.	Por la empresa, cuando se trate de instructores internos;<br>

     <br>c.	Las empresas de las que se haya adquirido un bien o servicio;<br>

     <br>d.	Extranjeros que impartan capacitación a trabajadores mexicanos en territorio nacional o cuando la capacitación se realice en el extranjero, y<br>

     <br>e.	Autoridades competentes de la Secretaría.<br>

<br><b>II.	Autentificarse por la Comisión Mixta de Capacitación, Adiestramiento y Productividad en las empresas con más de 50 trabajadores o por el patrón o representante legal en las empresas hasta con 50 trabajadores; en este último caso se omitirá la firma del representante de los trabajadores</b><br>
  
  <br>	La Comisión Mixta de Capacitación, Adiestramiento y Productividad por unanimidad de sus integrantes, podrá acordar la forma en que autentificará las constancias de habilidades laborales.
	Se podrá hacer uso de firmas en imagen digitalizada en sustitución de firmas autógrafas. En caso de elegir esta última opción, se deberán conservar en los archivos de la empresa, a disposición de la Secretaría, los convenios respectivos de la Comisión respecto del uso de las firmas autógrafas autorizadas para ser digitalizadas, así como las especificaciones para comprobar su veracidad y para garantizar su adecuado uso.<br>

	<br><b>III.	Entregarse a los trabajadores que:</b><br>
	
<br> a.	Aprueben el curso de capacitación, mediante la evaluación  correspondiente, dentro de los veinte días hábiles siguientes al término del mismo, o
<br> b.	Aprueben el examen de suficiencia, aplicado por el agente capacitador, cuando se nieguen a recibir capacitación.
<br><b>IV.	Elaborarse utilizando cualquiera de las siguientes opciones:</b><br>
<br> a.	El formato DC-3 “Constancia de competencias o de habilidades laborales”, según modelo anexo.<br>
<br>b.	El formato disponible en el sistema informático ubicado en la página de Internet www.stps.gob.mx.<br>

<br> De seleccionar esta opción, las empresas tendrán la posibilidad de emitir las constancias de competencias o de habilidades laborales de sus trabajadores a través del sistema informático, así como elaborar la lista de constancias de competencias o de habilidades laborales, incluyendo únicamente los datos faltantes.<br>
<br> c.	Un documento elaborado por la empresa al que se denominará “Constancia de Competencias o de Habilidades Laborales”, y que deberá contener, al menos, la información siguiente:<br>
<br>1.	Del trabajador: apellido paterno, materno y nombre(s); Clave Única de Registro de Población y ocupación específica en la empresa (según Catálogo);<br>
<br>2.	De la empresa: nombre o razón social (en caso de ser persona física anotar apellido paterno, materno y nombre(s) y Registro Federal de Contribuyentes con homoclave;<br>
<br>3.	Del programa de capacitación, adiestramiento y productividad: nombre del curso; duración en horas; periodo de ejecución; área temática del curso (según Catálogo);<br>
<br>4.	Nombre del Agente Capacitador Externo, cuando se trate de una institución, escuela u organismo; o nombre de la empresa cuando se trate de un instructor interno de la misma;<br>
<br>5.	Nombre y firma del instructor, en el caso de cursos a distancia, será suficiente anotar el nombre del tutor en línea, y<br>
<br>6.	Nombre y firma de los representantes de los trabajadores y de la empresa, integrantes de la Comisión Mixta de Capacitación, Adiestramiento y Productividad o en su caso del patrón o representante legal.<br>
<br>La información de los catálogos relativos a la ocupación específica del trabajador en la empresa y a las áreas temáticas del curso, para las empresas que no expidan las constancias a través del sistema informático, se encuentran disponibles en el propio sistema ubicado en la página de Internet www.stps.gob.mx, en caso contrario dichos catálogos se encuentran en el reverso del formato DC-3 “Constancia de Competencias o de Habilidades Laborales”, según modelo anexo .<br>
<br>Artículo 25. En todos los casos, se podrán incluir en las constancias de competencias o de habilidades laborales solamente los logotipos, imágenes o membretes que identifiquen a la empresa y, en su caso, al agente capacitador. A excepción de las constancias emitidas por la Secretaría, no se deberán utilizar imágenes, ni textos que identifiquen o hagan referencia a que la Secretaría avala el desarrollo, contenido o calidad de los cursos y/o que cuenta con el reconocimiento o validez por parte de la misma.<br>
<br>Artículo 26. Las empresas deberán hacer del conocimiento de la Secretaría, para su registro y control, las listas de las constancias de competencias o de habilidades laborales, que contendrán la información de la capacitación o adiestramiento otorgado a los trabajadores como resultado de las acciones realizadas conforme al plan y programas de capacitación, adiestramiento y productividad, tomando en consideración  lo siguiente:<br>
<br><b>I.	Dentro de los sesenta días hábiles posteriores al término de cada año de los planes y programas de capacitación, adiestramiento y productividad y al finalizar el mismo, aun cuando no haya cumplido un año completo, las empresas deberán presentar la información correspondiente a los siguientes rubros :</b><br>
<br>a.	Los datos generales de la empresa;<br>
<br>b.	La vigencia del plan y programas de capacitación, adiestramiento y productividad;<br>
<br>c.	Los datos generales del trabajador;<br>
<br>d.	La información de los cursos de capacitación recibidos por los trabajadores;<br>
<br>e.	Las certificaciones en Normas Técnicas de Competencia Laboral o su equivalente que, en su caso, comprueben tener los trabajadores, opcionalmente, y<br>
<br>f.	El grado máximo de estudios terminados con reconocimiento de validez oficial que los trabajadores proporcionen al patrón.<br>
	<br>Las empresas que tengan hasta 50 trabajadores podrán presentar su lista de constancias de competencias o de habilidades laborales por medios impresos o de forma electrónica.<br>
	Las empresas con más de 50 trabajadores deberán presentar su lista de constancias de competencias o de habilidades laborales, de forma electrónica.<br>
	Las empresas que no hayan registrado algún plan y programas de capacitación y adiestramiento de sus trabajadores ante la Secretaría, deberán observar lo establecido en el Artículo Primero Transitorio del presente Acuerdo.
	Cuando las empresas opten por realizar el trámite a través de medios electrónicos, deberán ingresar a la página de Internet de la Secretaría en la dirección www.stps.gob.mx, y seguir las instrucciones que se indiquen en la liga referente a la presentación de las listas de constancias de competencias o de habilidades laborales. En caso de realizarlo de manera personal, deberán presentar el formato DC-4 “Lista de constancias de competencias o de habilidades laborales”, según modelo anexo. De utilizar la primera opción, la información se incorporará a la base de datos de la Secretaría con el propósito de que en lo sucesivo sólo se hagan las actualizaciones correspondientes.<br>
<br><b>II.	De proceder la solicitud en tiempo y forma, la Secretaría emitirá un acuse de recibo el mismo día en que se realice la presentación de las listas de constancias, ya sea que ésta se efectúe en ventanilla o bien por medios electrónicos, en cuyo caso se proporcionará el acuse por esta misma vía;<br>
<br><b>III.	Las empresas deberán tener a disposición de la Secretaría, como parte de sus registros internos, copia de las constancias de competencias o de habilidades laborales expedidas a sus trabajadores durante el último año, ya  sea en papel o en archivos electrónicos que conserven la imagen de la constancia entregada, y<br>
<br><b>IV.	La Secretaría incluirá y administrará en la base de datos del Padrón de Trabajadores Capacitados, la información de los trabajadores presentada por las em
<br>presas en las listas de constancias de competencias o de habilidades laborales.</b><br>
<br>   
                                             
</h4>
                                                </h4>
                                             
                           
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
       
                                        
                                        
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">    
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