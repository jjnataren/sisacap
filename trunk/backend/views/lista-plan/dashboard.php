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
use yii\helpers\Url;
use kartik\file\FileInput;
use yii\grid\GridView;
use backend\models\Curso;
use backend\models\EmpresaUsuario; 

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="glyphicon glyphicon-list-alt fa-stack-1x"></i>
							   </span>';

$this->title = 'Reporte de constancias emitidas: Id '.$model->ID_LISTA;
$this->params['breadcrumbs'][] = ['label' => 'Comisión ID '.$model->iDPLAN->ID_COMISION, 'url'=>['comision-mixta-cap/dashboard', 'id'=>$model->iDPLAN->ID_COMISION]];
$this->params['breadcrumbs'][] = ['label' => 'Plan ID '.$model->ID_PLAN, 'url'=>['plan/dashboard', 'id'=>$model->ID_PLAN]];
$this->params['breadcrumbs'][] = ['label' => 'Reporte constancias ID '.$model->ID_LISTA];


$this->registerJs("$('#dataTable1').dataTable( {'language': {'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json' }});", View::POS_END, 'my-options');


$constanciasItems = Constancia::findBySql('select * from tbl_constancia where ID_TRABAJADOR in (select ID_TRABAJADOR from tbl_trabajador where (ID_EMPRESA IN (SELECT ID_ESTABLECIMIENTO FROM tbl_lista_establecimiento where ID_LISTA = '.$model->ID_LISTA.') OR ID_EMPRESA = '.EmpresaUsuario::getMyCompany()->ID_EMPRESA.' ) AND ACTIVO = 1)
								AND ID_CONSTANCIA NOT IN (select ID_CONSTANCIA from tbl_lista_constancia where ID_LISTA = '.$model->ID_LISTA.') AND ESTATUS > 1;')->all();
	

$tConstanciasBox = count($model->iDCONSTANCIAs);
 
$tPaquetesBox = floor( $tConstanciasBox / 30 );


?>
				<!-- Small boxes (Stat box) -->
                    <div class="row">
                    
                        
                         <div class="col-md-3 col-xs-6 col-sm-6">
					            <div class="small-box bg-aqua">
					                <div class="inner">
					                    <h3>
					                      <?php  echo count($model->listaConstancias);?>
					                    </h3>
					                    <p>
					                        <?= Yii::t('backend', 'Constancias en el reporte') ?>
					                    </p>
					                </div>
					                <div class="icon">
					                    <i class="fa fa-file-pdf-o"></i>
					                </div>
					                  <a href="#anchor_constancias_incluidas" class="small-box-footer">
					                    Constancias listas para enviar <i class="fa fa-arrow-circle-right"></i>
					                </a>
					              
					            </div>
					        </div>         
					        
                            <div class="col-md-3 col-xs-6 col-sm-6">
					            <div class="small-box bg-yellow">
					                <div class="inner">
					                    <h3>
					                      <?php  echo count($constanciasItems);?>
					                    </h3>
					                    <p>
					                        <?= Yii::t('backend', 'Constancias en revisión') ?>
					                    </p>
					                </div>
					                <div class="icon">
					                    <i class="fa fa-file-pdf-o"></i>
					                </div>
					                   <a href="#anchor_constancias_por_incluir" class="small-box-footer">
                               			 <strong> Constancias  por incluir en el reporte <i class="fa fa-arrow-circle-right"></i></strong>
                            		    </a>
					              
					            </div>
					        </div>     
                        
                        
                               <div class="col-md-3 col-xs-6 col-sm-6">
					            <div class="small-box bg-blue">
					                <div class="inner">
					                    <h3>
					                      <?php  echo count($model->iDESTABLECIMIENTOs);?>
					                    </h3>
					                    <p>
					                        <?= Yii::t('backend', 'Establecimientos') ?>
					                    </p>
					                </div>
					                <div class="icon">
					                    <i class="fa fa-university"></i>
					                </div>
					                   <a class="small-box-footer" href="#estable">
                               			  Establecimientos considerados <i class="fa fa-arrow-circle-right"></i>
                            		    </a>
					              
					            </div>
					        </div>     
                        
       					
       					  <div class="col-md-3 col-xs-6 col-sm-6">
					            <div class="small-box bg-red">
					                <div class="inner">
					                    <h3>
					                      <?= $tPaquetesBox;?>
					                    </h3>
					                    <p>
					                        <?= Yii::t('backend', '   Paquetes de constancias') ?>
					                    </p>
					                </div>
					                <div class="icon">
					                     <i class="glyphicon glyphicon-list-alt"></i>
					                </div>
					                    <a class="small-box-footer" href="#anchor_paquetes">
                                   Paquetes listos	<i class="fa fa-arrow-circle-right"></i>
                                </a>
					              
					            </div>
					        </div>     
                        
                        
                 
                 
                    </div><!-- /.row -->
<h4 class="page-header" id="estable">
        </h4>
                    <div class="row">
	<div class="col-sm-12 col-md-6 col-xs-12">
	
		<div class="box box-success">
                <div class="box-header">
                   <i class="glyphicon glyphicon-list-alt"></i>
                    <h3 class="box-title"><?= Yii::t('backend', 'Detalles del reporte de constancias emitidas') ?></h3>
               
               <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
               
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'Id') ?></dt>
                        <dd><?= $model->ID_LISTA ?></dd>

                        <dt><?= Yii::t('backend', 'Alias') ?></dt>
                        <dd><?= $model->ALIAS ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Descripción') ?></dt>
                        <dd><i><?= $model->DESCRIPCION ?></i></dd>
				                                     
                         <dt><?= Yii::t('backend', 'N° constancias hombres') ?></dt>
                        <dd><?= $model->CONSTANCIAS_HOMBRES ?></dd>
                        
                         <dt><?= Yii::t('backend', 'N° constancias mujeres') ?></dt>
                        <dd><?= $model->CONSTANCIAS_MUJERES ?></dd>
                        
                        <dt><?= Yii::t('backend', 'N° total constancias') ?></dt>
                        <dd><?= $model->CONSTANCIAS_MUJERES +  $model->CONSTANCIAS_HOMBRES ?></dd>
                        
                        <dt><?= Yii::t('backend', 'Lugar elaboración informe') ?></dt>
                        <dd><?= $model->LUGAR_INFORME; ?></dd>
                        
                        <dt><?= Yii::t('backend', 'Fecha elaboración informe') ?></dt>
                         <dd><?=($model->FECHA_INFORME === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->FECHA_INFORME)) ;?></dd>
               
                        
                        <dt></dt>
               			<dd>&nbsp;</dd>
                        
                       
                        <dt><i><?= Yii::t('backend', 'Creado desde') ?></i></dt>
                       <dd><?=($model->FECHA_AGREGO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->FECHA_AGREGO)) ;?></dd>
                 
                                           
                        <dt><i><?= Yii::t('backend', 'Estatus') ?></i></dt>
                        <dd><span class="label label-success"><?= $model->getStatus(); ?></span></dd>
                        
                     
                        
                      
                        
                        
                        
                    </dl>
                  
                    
                </div><!-- /.box-body -->
                <div class="box-footer">
			   		 
			   		 <?= Html::a('<i class="fa fa-pencil-square-o"></i> '.Yii::t('backend', 'Actualizar reporte de constancia'), ['lista-plan/update-by-plan','id'=>$model->ID_LISTA], ['class' => 'btn btn-primary']) ?>
			   		 <?= Html::a('<i class="fa fa-print"></i> '.Yii::t('backend', 'Generar reporte DC4 (parte 1)'), ['lista-plan/report-pdf-4','id'=>$model->ID_LISTA], ['class' => 'btn btn-default','target'=>'_blank']) ?>
			   		 
			   		 
                  </div>
            </div>
	
	</div>
	
	
<div class="col-md-6 col-xs-12 col-sm-12">
            <div class="box box-success">
                <div class="box-header">
                      <i class="fa fa-university"></i>
                    <h2 class="box-title"><?= Yii::t('backend', 'Establecimientos') ?> <small>dondé fuerón emitidas las constancias.</small></h2>
              
			              <div class="box-tools pull-right">
			        		    <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
			          			  <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
			          </div><!-- /.box-tools -->
              
                </div><!-- /.box-header -->
                <div class="box-body">
                   
                
				         <table class="table table-hover" >
				         
				         <thead> 
					         <tr>
						         <th>Id</th>
						         <th>Nombre</th>  
						         <th>RFC</th>		         
						         <th>NSS</th>
						         <th>Domicilio</th>
						         <th>Entidad federativa</th>
						         <th>N° constancias emitidas</th>
						         <th></th>
					         </tr>
				         </thead>
				         
				         <tbody>
				         	
				         	<?php $i = 0; foreach ($model->iDESTABLECIMIENTOs as $establecimiento){?>
				         	<tr>
				         		<td><?= $establecimiento->ID_EMPRESA;?></td>
				         		<td><?= $establecimiento->NOMBRE_COMERCIAL?></td>
				         		<td><?= $establecimiento->RFC ?></td>
				         		<td><?= $establecimiento->NSS ?></td>
				         		<td><?= $establecimiento->CALLE .$establecimiento->	NUMERO_INTERIOR .$establecimiento->NUMERO_EXTERIOR  ?></td>
				         		<td><?= $establecimiento-> ENTIDAD_FEDERATIVA ?></td>
				         		<td><?php 

				         		$tConstancias = count( Constancia::findBySql('select count(id_constancia) from tbl_constancias where id_trabajador in 
															(select id_trabajador from tbl_trabajador where id_empresa = :id_empresa and activo = 1) and  estatus = :estatus', 
																[':id_empresa'=>$establecimiento->ID_EMPRESA, ':estatus'=>Constancia::STATUS_CREATED]) ); 
				         				

								/*$tConstancias = (new yii\db\Query())
												->from('tbl_constancia')
												->where('id_trabajador in (select  id_trabajador from tbl_trabajador where id_empresa = :id_empresa)', [':id_empresa'=>$establecimiento->ID_EMPRESA])												
												->count();*/
				         		
				         		 echo $tConstancias; 
				         		
				         		?></td>
				         	    <td><?= Html::a('<i class="fa  fa-trash-o"></i>', ['lista-plan/delete-establishment','id'=>$model->ID_LISTA,'id_est'=>$establecimiento->ID_EMPRESA], 
				         				['class' => 'btn btn-danger',  'data' => ['confirm' => '¿Realmente quiere borrar este establecimiento?',
				                												  'method' => 'post'],]) ?>
				            	</td>
				            
				         	</tr>
				         	<?php }?>
				         </tbody>
				        
				        </table>
        
                </div><!-- /.box-body -->
                
                  <div class="box-footer">
                  	  <a href="#" class="btn btn-default" data-toggle="modal" data-target="#mod_establishments" id="userButton">
			    	
						<i class="fa fa-plus"></i>&nbsp;<?= Yii::t('backend', 'Agregar')?>
			   		 </a>
                  </div>
            </div>
        </div> 	


	
</div>

<div class="row">

	<div class="col-md-6 col-xs-12 col-sm-12">
	
		<div class="box box-default">
                <div class="box-header">
                   <i class="fa fa-calendar"></i>
		                    <h3 class="box-title"><?= Yii::t('backend', 'Detalles del plan') ?></h3>
		                
		                <div class="box-tools pull-right">
		          		 	 <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
		            		<button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
		         		 </div><!-- /.box-tools -->
		                
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                           <dt><?= Yii::t('backend', 'Id') ?></dt>
                        <dd><?= $model->iDPLAN->ID_PLAN ?></dd>

                        <dt><?= Yii::t('backend', 'Alias') ?></dt>
                        <dd><?= $model->iDPLAN->ALIAS ?></dd>
                        
                          <dt><?= Yii::t('backend', 'Descripción') ?></dt>
                        <dd><?= $model->iDPLAN->DESCRIPCION_PLAN ?></dd>
                                                                        
                         <dt><?= Yii::t('backend', 'Etapas del plan') ?></dt>
                        <dd><?= $model->iDPLAN->NUMERO_ETAPAS ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Vigencia de inicio') ?></dt>
                           <dd><?=($model->iDPLAN->VIGENCIA_INICIO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->iDPLAN->VIGENCIA_INICIO)) ;?></dd>
                        
                         <dt><?= Yii::t('backend', 'Vigencia termino') ?></dt>
                         <dd><?=($model->iDPLAN->VIGENCIA_FIN === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->iDPLAN->VIGENCIA_FIN)) ;?></dd>
                              
                              
                             
                      	<dt>&nbsp;</dt>
                       	<dd>&nbsp;</dd> 
                       	                     
                        <dt><i><?= Yii::t('backend', 'Agregado desde') ?></i></dt>
                         <dd><?=($model->iDPLAN->FECHA_AGREGO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y h:i A",strtotime($model->iDPLAN->FECHA_AGREGO)) ;?></dd>
                     
                        
                          <dt><i><?= Yii::t('backend', 'Estatus') ?></i></dt>
                        <dd><span class="label label-success"><?= $model->iDPLAN->getStatus(); ?></span></dd>
                         
                        
                    </dl>
                </div><!-- /.box-body -->
                 
                      <div class= "box-footer">
				          
		                <?= Html::a('<i class="fa fa-eye"></i>  Ver plan', ['plan/dashboard', 'id' => $model->ID_PLAN], ['class' => 'btn btn-default']) ?>
                        				
				      </div>
                        
            </div>
	
	</div>
	

<div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                 <i class="fa fa-building"></i>
                
                
                    <h3 class="box-title"><?= Yii::t('backend', 'Datos de la empresa') ?> <small> que apareceran en el reporte DC-4</small></h3>
                <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'Nombre') ?></dt>
                        <dd><?= $model->iDPLAN->iDCOMISION->iDEMPRESA->NOMBRE_RAZON_SOCIAL ?></dd>
                        
                          <dt><?= Yii::t('backend', 'Clave única de registro (RFC)') ?></dt>
                          
                        <dd><?= $model->iDPLAN->iDCOMISION->iDEMPRESA->RFC ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Registro patronal (I.M.S.S)') ?></dt>
                        <dd><?= $model->iDPLAN->iDCOMISION->iDEMPRESA->NSS ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Calle') ?></dt>
                        <dd><?= $model->iDPLAN->iDCOMISION->iDEMPRESA->CALLE ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Numero interior') ?></dt>
                        <dd><?= $model->iDPLAN->iDCOMISION->iDEMPRESA->NUMERO_INTERIOR ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Numero exterior') ?></dt>
                        <dd><?= $model->iDPLAN->iDCOMISION->iDEMPRESA->NUMERO_EXTERIOR?></dd>
                    
                             <dt><?= Yii::t('backend', 'Entidad federativa') ?></dt>
                        <dd><?php 
                        $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$model->iDPLAN->iDCOMISION->iDEMPRESA-> ENTIDAD_FEDERATIVA, 'CATEGORIA'=>1, 'ACTIVO'=>1]);
         			echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?></dd>
                        
                         
                         <dt><?= Yii::t('backend', 'Municipio o delegación') ?></dt>
                        <dd><?php 
                        $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$model->iDPLAN->iDCOMISION->iDEMPRESA-> MUNICIPIO_DELEGACION, 'CATEGORIA'=>2, 'ACTIVO'=>1]);
         			echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?></dd>	
                        
                        
                         <dt><?= Yii::t('backend', 'Giro principal') ?></dt>
                        <dd><?php 
                        $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$model->iDPLAN->iDCOMISION->iDEMPRESA-> GIRO_PRINCIPAL, 'CATEGORIA'=>4, 'ACTIVO'=>1]);
         			echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?></dd>
                        
                         
                        <dt><?= Yii::t('backend', 'Codigo postal') ?></dt>
                        <dd><?= $model->iDPLAN->iDCOMISION->iDEMPRESA->	CODIGO_POSTAL ?></dd>                   
					
                     </dl>
                </div><!-- /.box-body -->
                <div class="box-footer">
                
			    	 <?= Html::a('<i class="fa fa-eye"></i>  Ver empresa', ['empresa/viewbyuser','id'=>$model->iDPLAN->iDCOMISION->ID_EMPRESA], ['class' => 'btn btn-default']) ?>
            </div>
            
        </div>  
     </div>        
	
</div>

<div class="row">
	<div class="col-md-6 col-xs-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                   <i class="fa fa-check-square"></i>
                    <h2 class="box-title"><?= Yii::t('backend', 'Documento probatorio') ?></h2>
               
               <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
               
                </div><!-- /.box-header -->
                <div class="box-body">
                   
                  <?php 
                  
                  		$pluginOptions = [];
                  		
                  		
                  		if ($model->DOCUMENTO_PROBATORIO !== null){
                  			
							$pluginOptions['initialPreview'] = ['  
											<object data="'.$model->DOCUMENTO_PROBATORIO.'" type="application/pdf" width="300px" height="160px">
											 <param name="movie" value="{caption}" />
													<div class="file-preview-other">
														<i class="glyphicon glyphicon-file"></i>
													</div>
											 </object>
											 <div class="file-thumbnail-footer">
											    <div class="file-caption-name">'.$model->NOMBRE_DOC_PROB.'</div>
											    <div class="file-actions">
											</div>
											</div>
									'];

							$pluginOptions['initialPreviewConfig'] =[['url'=>Url::to(['deletedocument','id'=>$model->ID_LISTA, 'document'=>1])]];
							
							
                  		}
                  		
                  		
                  		$pluginOptions['uploadUrl'] = Url::to(['uploaddocument','id'=>$model->ID_LISTA, 'document'=>1]);
                  		
                  		
                  		
                  ?> 
                   
                 <?= FileInput::widget([
					  	 		
					  	 		'name' => 'DOCUMENTO_PROBATORIO',
								'options'=>[
								],
								'pluginOptions' => $pluginOptions
								
						]); ?>
    
        
                </div><!-- /.box-body -->
                
                 
                <?php if ($model->DOCUMENTO_PROBATORIO !== null):?>
                 <div class="box-footer">
			    		<a href="<?= $model->DOCUMENTO_PROBATORIO ?>" target="_blank" class="btn btn-default">Descargar documento</a>
        	        
                  </div>
              <?php endif;?>
     
</div>
</div>

	<div class="col-md-6 col-xs-12 col-sm-12">
		 <div class="box box-info" id="controls">
				
				<div class="box-header">
					 <i class="fa fa-laptop"></i>
			    	
			    								
								<div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
							
			    	
			    	 <h3 class="box-title">   
							
							<?= Yii::t('backend', 'Cursos') ?><small>   impartidos en el  plan de capacitación y adiestramiento</small> 
							
							
							
					 </h3>
			   	</div>
				
				<div class="box-body table-responsive">
						
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Fecha de inicio</th>
								<th>Fecha de fin</th>
							    
							    <th>Área temática</th>
							   
							 
							    <th>  </th>
							  
							 </tr>					
						</thead>
						
						<tbody>
						
								<?php foreach ($model->iDPLAN->cursos as $curso):?>
								<tr>
		
									 <td><?= $curso->ID_CURSO ?></td>
					
									 <td><?= $curso->NOMBRE ?></td>
										               
			                         <td><?=($curso->FECHA_INICIO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($curso->FECHA_INICIO)) ;?></td>
			                          
								        <td><?=($curso->FECHA_TERMINO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($curso->FECHA_TERMINO)) ;?></td>
			                          
								
										
								
									   	<td><?php 
		                                    $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$curso->AREA_TEMATICA, 'CATEGORIA'=>6, 'ACTIVO'=>1]);
		         			               echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?>
         			               
         			               		</td>
         			
         			             
         			   
							   <td>
				            	
				                     <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['constancias/createbycourse','id'=>$curso->ID_CURSO], 
				         			     ['class' => 'btn btn-info btn-xs'])?>
				         		</td>
										
				            	
							</tr>
							<?php endforeach;?>	
						</tbody>
					</table>
					
				</div>
				
				<div class="box-footer">			
				</div>
				
			</div>
  </div>
</div>



 <h4 class="page-header" id="anchor_constancias_por_incluir">
          Constancias emitidas en los establecimientos
   		<small>Estas constancias pueden ser presentadas en el reporte</small>
   </h4>     
    
 <div class="row">
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!-- Custom Tabs (Pulled to the right) -->
                            
                              <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-dot-circle-o"></i>                                    
                                    <h3 class="box-title">Constancias para incluir en el reporte </h3>
                                   <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive" >
                                
                                	<table id="dataTable1" class="table" >
											<thead>
											
											
											<tr>
													
													<td colspan="6"><i class="fa fa-file-pdf-o"></i> Datos constancia</td>
													<td colspan="4"><i class="fa fa-user"></i> Datos trabajador</td>
													
													<th></th>
											</tr>
											
											
												<tr>
													<th>Id</th>
													<th>Curso</th>
													<th>Obtención</th>
													<th>Tipo</th>
													<th>Estatus</th>
													<th><?=Yii::t('backend', 'Fecha emisión')?></th>
													<th><?=Yii::t('backend', 'Establecimiento')?></th>
													<th><?=Yii::t('backend', 'Nombre ');?></th>									
													<th><?=Yii::t('backend', 'CURP')?></th>
													<th><?=Yii::t('backend', 'Ocupación')?></th>
													<th></th>
																															
												</tr>
											</thead>
							<tbody>
							<?php $i = 0; 
							
							
							foreach ($constanciasItems as $constancia) :?>
							<?php $worker = $constancia->iDTRABAJADOR;?>
							
								<tr>
									<td><?= $constancia->ID_CONSTANCIA; ?></td>
									<td><?= $constancia->iDCURSO->NOMBRE;?></td>
									<td><?= isset( Constancia::getAllMetodosType()[$constancia->METODO_OBTENCION] )? Constancia::getAllMetodosType()[$constancia->METODO_OBTENCION]: '<i class="text text-muted">no establecido</i>' ?></td>	
									<td><?= isset(Constancia::getAllContanciasType()[$constancia->TIPO_CONSTANCIA])?Constancia::getAllContanciasType()[$constancia->TIPO_CONSTANCIA]: '<i class="text text-muted">no establecido</i>' ?></td>
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
									<td><span class="<?=$labelType ?>"><?= isset(Constancia::getAllEstatusType()[$constancia->ESTATUS])? Constancia::getAllEstatusType()[$constancia->ESTATUS]: '<i class="text text-muted">no establecido</i>' ?></span></td>
									<td><?= $constancia->FECHA_EMISION_CERTIFICADO?></td>
									<td><?= $constancia->iDTRABAJADOR->iDEMPRESA->NOMBRE_COMERCIAL;?></td>									
									<td><?= $constancia->iDTRABAJADOR->NOMBRE . ' '. $constancia->iDTRABAJADOR->APP;?></td>
									<td><?= $constancia->iDTRABAJADOR->CURP;?></td>
									<td>
									<?php $ocupacionEspecifica = Catalogo::findOne($constancia->iDTRABAJADOR->OCUPACION_ESPECIFICA);?>
									<?= isset($ocupacionEspecifica)?$ocupacionEspecifica->NOMBRE: '<i class="text text-muted">no establecido</i>';?>
									</td>
									
									
									<td>
									<?= Html::a('<i class="fa fa-arrow-circle-down"></i>', ['lista-plan/add-constancia','id'=>$model->ID_LISTA, 'id_const'=>$constancia->ID_CONSTANCIA], ['class' => 'btn btn-xs btn-success', 'title'=>'Incluir al reporte', 'method' => 'post']) ?>
									<?= Html::a('<i class="fa  fa-eye"></i>', ['constancias/dashboard','id'=>$constancia->ID_CONSTANCIA], 
				         				['class' => 'btn btn-info btn-xs', 'title'=>'Ver detalle de la constancia']) ?>
									
									</td>
									
								</tr>	
								
							<?php  $i++; endforeach;?>
							</tbody>
							
						</table>	
                                
                                </div>
                           </div> 
                            
                         
                        </div>
                        
    </div>
    
    
    <h4 class="page-header" id="anchor_constancias_incluidas">
          Constancias incluidas
   		<small>Estas constancias estan incluidas en el reporte</small>
   </h4>     
    
 	 <div class="row">
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!-- Custom Tabs (Pulled to the right) -->
                            
                              <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-paperclip"></i>                                
                                    <h3 class="box-title">Resumen de constancias incluidas en el reporte DC4 (parte 2)</h3>
                                   
                                   <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
                                   
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive" >
                                
                                	<table id="dataTable1" class="table table-bordered" cellspacing="0"  width="100%">
							<thead>
							
							<tr>
									
									<td colspan="5"><i class="fa fa-file-pdf-o"></i> Datos constancia</td>
									<td colspan="5"><i class="fa fa-user"></i> Datos trabajador</td>
									
									<th></th>
							</tr>
							
								<tr>
									<th>Id</th>
									<th>Curso</th>
									<th><?=Yii::t('backend', 'Fecha emisión')?></th>
									<th>Obtención</th>
									<th>Tipo</th>
									
								
									<th><?=Yii::t('backend', 'Nombre')?></th>									
									<th><?=Yii::t('backend', 'A. paterno')?></th>
									<th><?=Yii::t('backend', 'CURP')?></th>
									<th><?=Yii::t('backend', 'Ocupación')?></th>
									<th><?=Yii::t('backend', 'Establecimiento')?></th>
							
									<th></th>
																											
								</tr>
							</thead>
							<tbody>
							<?php $i = 0; 
							
							$constanciasItems =   $model->iDCONSTANCIAs;//Constancia::findBySql('select * from tbl_constancia where ID_TRABAJADOR in (select ID_TRABAJADOR from tbl_trabajador where ID_EMPRESA IN (SELECT ID_ESTABLECIMIENTO FROM tbl_lista_establecimiento where ID_LISTA = '.$model->ID_LISTA.')  AND ACTIVO = 1) AND ESTATUS > 1')->all();
							
							foreach ($constanciasItems as $constancia) :?>
							<?php $worker = $constancia->iDTRABAJADOR;?>
							
								<tr>
									<td><?= $constancia->ID_CONSTANCIA; ?></td>
									<td><?= $constancia->iDCURSO->NOMBRE;?></td>
									<td><?=($constancia->FECHA_EMISION_CERTIFICADO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($constancia->FECHA_EMISION_CERTIFICADO)) ;?></td>
									<td><?= isset(Constancia::getAllMetodosType()[$constancia->METODO_OBTENCION])?Constancia::getAllMetodosType()[$constancia->METODO_OBTENCION] : '<i class"text text-muted">no asignado</i>' ?></td>	
									<td><?= isset(Constancia::getAllContanciasType()[$constancia->TIPO_CONSTANCIA])?Constancia::getAllContanciasType()[$constancia->TIPO_CONSTANCIA] : '<i class"text text-muted">no asignado</i>'; ?></td>
																	
									<td><?= $constancia->iDTRABAJADOR->NOMBRE;?></td>
									<td><?= $constancia->iDTRABAJADOR->APP;?></td>
									<td><?= $constancia->iDTRABAJADOR->CURP;?></td>
									<td>
									<?php $ocupacionEspecifica = Catalogo::findOne($constancia->iDTRABAJADOR->OCUPACION_ESPECIFICA);?>
									<?= isset($ocupacionEspecifica)?$ocupacionEspecifica->NOMBRE: '<i class="text text-muted">no establecido</i>';?>
									</td>
										<td><?= $constancia->iDTRABAJADOR->iDEMPRESA->NOMBRE_COMERCIAL;?></td>
									
									<td>
									
										<?= Html::a('<i class="fa fa-file-pdf-o"></i>', ['lista-plan/report-pdf-part2','id'=>$model->ID_LISTA,'id_const'=>$constancia->ID_CONSTANCIA], 
				         				['class' => 'btn btn-primary btn-xs',
				            				'target'=>'_blank',
										 'data' => [				           				 	
										 'title'=>'Generar reporte DC4 segunda parte'	
				            		],]) ?>
									
									
									<?= Html::a('<i class="fa  fa-eye"></i>', ['constancias/dashboard','id'=>$constancia->ID_CONSTANCIA], 
				         				['class' => 'btn btn-info btn-xs']) ?>
									
									<?= Html::a('<i class="fa  fa-trash-o"></i>', ['lista-plan/delete-constancia','id'=>$model->ID_LISTA,'id_const'=>$constancia->ID_CONSTANCIA], 
				         				['class' => 'btn btn-danger btn-xs',  
										 'data' => ['confirm' => '¿Realmente quiere quitar esta constancia?',
				           				 'method' => 'post',
										 'title'=>'Borrar esta constancia'	
				            		],]) ?>
				            		
				            		
				            	
				            		</td>
									
								</tr>	
								
							<?php  $i++; endforeach;?>
							</tbody>
							
						</table>	
                                
                                </div>
                           </div> 
                            
                         
                        </div>
                        
    </div>    
    
    
  <h4 class="page-header" id="anchor_paquetes">
    Información de  paquetes de constancias  disponibles
   		<small>Estos paquetes  agruparan a las constancias de los trabajadores</small>
  </h4>     
    
    
	
	<div class="row">
	<div class="col-sm-12 col-md-6 col-xs-12">
	
		<div class="box box-primary">
                <div class="box-header">
                   <i class="glyphicon glyphicon-list-alt"></i>
                    <h3 class="box-title"><?= Yii::t('backend', 'Paquetes de constancias') ?></h3>
               
               <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
               
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                       <?php 
                    
                    	$tConstancias = count($model->iDCONSTANCIAs);
                    	
                    	$tPaquetes = floor( $tConstancias / 30 );
                    	
                    	$tPaquetes += ($tConstancias%30)? 1 : 0 ;
                    	
                    
                    ?>
                    
                    <?php if($tPaquetes):?>
                    
                    <table class="table">
                    		<thead>
                    			<tr>
                    				<th colspan="3">Reportes disponibles</th>
                    			</tr>
                    			<tr>
                    				<th>Paquete</th>
                    				<th>Descripción</th>
                    				<th></th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    		<?php for($x = 0; $x<$tPaquetes; $x++):?>
                    			<tr>
                    				<td><?= $x +1; ?></td>
                    				<td>constancias: <?=($x * 20 ) +1 ?> - <?= ($x+1 == $tPaquetes) ? $tConstancias :  ($x+1) *20 	?></td>
                    				<td><?= Html::a('<i class="fa fa-print"></i> ', ['lista-plan/report-pdf-all','id'=>$model->ID_LISTA, 'paquete'=>$x+1], ['class' => 'btn btn-default','target'=>'_blank']) ?></td>
                    			</tr>
                    		<?php endfor; ?>	
                    		</tbody>
                    		
                    		
                    </table>
                    <?php endif;?>
    
                    
                </div><!-- /.box-body -->
                <div class="box-footer">
			   		
			   			 <span>Total constancias: <?= $tConstancias ?></span>
			   			 <span>Total paquetes: <?= $tPaquetes ?></span>
			   		 
                  </div>
            </div>
	
	</div>
</div>	    
    
      
                 
    
    
    <!-- Modals implementation -->
    
    <!-- Avaliable establishments  for lista plan -->
    <div class="modal fade" id="mod_establishments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i>&nbsp;<?=Yii::t('backend', 'Agregar un establecimiento a este reporte de constancias') ?></h4>
                                        </div>
	                                        <div class="modal-body">
												
											    <?= GridView::widget([
											        'dataProvider' => $establishmentsDataProvider,
											        'filterModel' => $establishmentsSearchModel,
											        'columns' => [
											            ['class' => 'yii\grid\SerialColumn'],
											
											            //'ID_EMPRESA',
											            //'ID_REPRESENTANTE_LEGAL',
											            'NOMBRE_COMERCIAL',
											            'RFC',
											            'NSS',
											            // 'CURP',
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
															
														return  Html::a(Yii::t('backend', 'Agregar') .'&nbsp;<i class="fa fa-check-circle-o"></i>',['add-establishment','id'=>Yii::$app->request->get('id'),'id_est'=>$data->ID_EMPRESA],
																['class' => 'btn btn-primary',
																'data-loading-text'=>"Loading...",
																'id'=>'legal_'.$data->ID_EMPRESA,
																'onclick'=>"
																//$('#legal_$data->ID_EMPRESA').removeAttr('href');
																$('#legal_$data->ID_EMPRESA').fadeIn(300);
																$('#legal_$data->ID_EMPRESA').text('...');
																$('#legal_$data->ID_EMPRESA').removeClass('btn btn-primary').addClass('btn btn-success');
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