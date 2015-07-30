<?php
/**
 * Author: Eugine Terentev <eugine@terentev.net>
 * @var $this \yii\web\View
 */
use common\models\User;
use backend\models\Catalogo;
use trntv\systeminfo\SI;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Tabs;
use kartik\file\FileInput;
use yii\base\Model;
use backend\models\Empresa;




$this->title = Yii::t('backend', '
		
Comisión mixta...	').'ID '.$model->ID_COMISION_MIXTA .' - '.$model->ALIAS;

$this->params['subtitle'] = '';
  
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-copyright  fa-stack-1x"></i>
							   </span>';

$this->params['breadcrumbs'][] = $this->title;
/**
 * Items for menu tabs
 * 
 */


$planItems  = [];
$i = 0;

foreach ($model->plans as $planModel){
	
$planItems[]= 	[
	'label' => ($planModel->ALIAS===null)?'Plan #'.$planModel->ID_PLAN:$planModel->ALIAS,
	'content' => \Yii::$app->view->renderFile('@app/views/plan/_plan_detail.php',
			 ['id'=>1, 'model'=>$planModel,'searchPlanEstablecimientoModel'=>$searchPlanEstablecimientoModel,
			'dataproviderPlanEstablecimiento'=>$dataproviderPlanEstablecimiento]),
	'active' => !$i++
	];
	
	
}?>


<div class="row">
 <div class="col-md-3 col-xs-6 col-sm-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>
                       <?php 
                       echo count($model->comisionEstablecimientos);
                       
                        
                        // todo: change after #5146 will be implemented ?>
                    </h3>
                    <p>
                        <?= Yii::t('backend', 'Establecimientos') ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-university"></i>
                </div>
                <div class="small-box-footer">
                   Regidos por la comisión
                </div>
            </div>
        </div>
        
 
  <div class="col-md-3 col-xs-6 col-sm-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                       <?php 
							
                       $trajaEstab=0;
                       
                       foreach ($model->iDESTABLECIMIENTOs as $tes){

                        $trajaEstab += count ($tes->trabajadors);
                        
                           }
                           
                         $trajaEstab +=  count($model->iDEMPRESA->trabajadors);
                           
                       echo  $trajaEstab;
                        // todo: change after #5146 will be implemented ?>
                    </h3>
                    <p>
                        <?= Yii::t('backend', 'Trabajadores') ?>
                        
                        
                        
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="small-box-footer">
                   Relacionados a la comisión
                </div>
            </div>
        </div>  
      
 
            <!-- small box -->
             <div class="col-md-3 col-xs-6 col-sm-6">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>
                       <?php 
							echo count($model->plans)
                        
                        // todo: change after #5146 will be implemented ?>
                    </h3>
                    <p>
                        <?= Yii::t('backend', 'Planes') ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <div class="small-box-footer">
                  Creados en esta comisión
                </div>
            </div>
        </div>    
   </div>
        
        

  <div class="row">
		<div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                
                <span class="glyphicon glyphicon-copyright-mark ">
							 </span>
                    <h3 class="box-title"><?= Yii::t('backend', 'Detalles de la comisión ') ?><small>que aparecerán en el formato DC-1
                    </small></h3>
                    <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'ID') ?></dt>
                        <dd><?= $model->ID_COMISION_MIXTA ?></dd>

                        <dt><?= Yii::t('backend', 'Alias') ?></dt>
                        <dd><?= $model->ALIAS ?></dd>
                        <dt><?= Yii::t('backend', 'Descripción') ?></dt>
                        <dd><?= $model->DESCRIPCION ?></dd>
                        
                        <dt><?= Yii::t('backend', 'Fecha de constitución') ?></dt>
                        <dd><?=($model->FECHA_CONSTITUCION === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->FECHA_CONSTITUCION)) ;?></dd>
                                                          
                        <dt><?= Yii::t('backend', 'Numero de Integrantes') ?></dt>
                        <dd><?= $model->NUMERO_INTEGRANTES ?></dd>
                            
                        <dt><?= Yii::t('backend', 'Lugar elaboración del informe') ?></dt>
                        <dd><?= $model->LUGAR_INFORME ?></dd>
                        
                        <dt><?= Yii::t('backend', 'Fecha elaboración del informe') ?></dt>
                       <dd><?=($model->FECHA_ELABORACION === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->FECHA_ELABORACION)) ;?></dd>
                                                    
                        <dt>&nbsp;</dt>
                        <dd></dd>                                        
                                           
                        <dt><i><?= Yii::t('backend', 'Creado desde') ?></i></dt>
                        <dd><?= $model->FECHA_AGREGO ?></dd>
                        
                        <dt><i><?= Yii::t('backend', 'Estatus') ?></i></dt>
                        <dd><span class="label label-success"><?= $model->getStatus(); ?></span></dd>
                    </dl>
                    
                   
                    
                </div><!-- /.box-body -->
                 <div class="box-footer">
			    	<?= Html::a('<i class="fa fa-pencil-square-o"></i>Actualizar comision', ['comision-mixta-cap/updatebyuser','id'=>$model->ID_COMISION_MIXTA], ['class' => 'btn btn-primary']) ?>
        	         <?= Html::a('<i class="fa fa-print" ></i> Generar reporte DC-1', ['comision-mixta-cap/reportpdf','id'=>$model->ID_COMISION_MIXTA], ['class' => 'btn btn-default', 'target'=>'_blank']) ?>
                  </div>
                
            </div>
        </div>      
      
        <div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
              <i class="fa fa-university"></i>	
                    <h2 class="box-title"><?= Yii::t('backend', 'Establecimientos') ?><small> que seran regidos por esta comisión</small></h2>
                    <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                
                <div class="box-body">
                   
                
         <table class="table table-hover" >
       
         <thead> 
	         <tr>
	         
		         <th>No.</th>
		         <th>Nombre comercial</th>  
		         <th>Entidad federativa</th>		         
		         <th>Municipio</th>
		         <th>Calle</th>
		         <th> Contacto</th>
		         
	         </tr>
	         <tr>
	         </tr>
         </thead>
         
         <tbody>
         	
         	<?php $i = 0; foreach ($model->iDESTABLECIMIENTOs as $establecimiento){?>
         	
         	<tr>
         		<td><?= ++$i?></td>
         		<td><?= $establecimiento->NOMBRE_COMERCIAL;?></td>
         		<td><?php 
         			$catalogo = Catalogo::findOne(['ID_ELEMENTO'=>$establecimiento-> ENTIDAD_FEDERATIVA, 'CATEGORIA'=>1, 'ACTIVO'=>1]);
         			echo isset($catalogo)?$catalogo->NOMBRE: 'no asignado'; 
	         		?>
         		</td>
    
         		<td><?php
         		$cat =Catalogo::findOne(['ID_ELEMENTO'=>$establecimiento-> MUNICIPIO_DELEGACION, 'CATEGORIA'=>2, 'ACTIVO'=>1]);
         		echo isset($cat) ? $cat->NOMBRE: 'no asignado';
         		 ?></td>
         		
         		<td><?= $establecimiento->CALLE  . $establecimiento->NUMERO_EXTERIOR . $establecimiento->NUMERO_INTERIOR  ?></td>
         		<td><?= $establecimiento-> NOMBRE_CONTACTO?></td>
         	    <td><?= Html::a('<i class="fa  fa-trash-o"></i>', ['comision-mixta-cap/deletestablecimiento','id'=>$model->ID_COMISION_MIXTA,'id_establesimiento'=>$establecimiento->ID_EMPRESA], 
         				['class' => 'btn btn-danger',  'data' => ['confirm' => '¿Realmente quiere borrar este establecimiento?',
                												  'method' => 'post',
            		],]) ?>
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
        	<div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                  <i class="fa fa-check-square"></i>
                    <h2 class="box-title"><?= Yii::t('backend', 'Documento probatorio') ?><small> </small></h2>
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

							$pluginOptions['initialPreviewConfig'] =[['url'=>Url::to(['deletedocument','id'=>$model->ID_COMISION_MIXTA, 'document'=>1])]];
							
							
                  		}
                  		
                  		
                  		$pluginOptions['uploadUrl'] = Url::to(['uploaddocument','id'=>$model->ID_COMISION_MIXTA, 'document'=>1]);
                  		
                  		
                  		
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
			    		<a href="<?= $model->DOCUMENTO_PROBATORIO ?>" target="_blank" class="btn btn-default"><i class="fa fa-download"> </i> Descargar documento</a>
        	        
                  </div>
              <?php endif;?>
            </div>
        </div>     
        
   
                   
             
        
       
          <div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                 <i class="fa fa-building"></i>
                
                
                    <h3 class="box-title"><?= Yii::t('backend', 'Datos de la empresa') ?> <small> que apareceran en el reporte DC-1</small></h3>
                <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'Nombre') ?></dt>
                        <dd><?= $model->iDEMPRESA->NOMBRE_RAZON_SOCIAL ?></dd>
                        
                          <dt><?= Yii::t('backend', 'Clave única de registro (RFC)') ?></dt>
                          
                        <dd><?= $model->iDEMPRESA->RFC ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Registro patronal (I.M.S.S)') ?></dt>
                        <dd><?= $model->iDEMPRESA->NSS ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Calle') ?></dt>
                        <dd><?= $model->iDEMPRESA->CALLE ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Numero interior') ?></dt>
                        <dd><?= $model->iDEMPRESA->NUMERO_INTERIOR ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Numero exterior') ?></dt>
                        <dd><?= $model->iDEMPRESA->NUMERO_EXTERIOR?></dd>
                        
                             <dt><?= Yii::t('backend', 'Colonia') ?></dt>
                        <dd><?= $model->iDEMPRESA->COLONIA ?></dd>
                        
                             <dt><?= Yii::t('backend', 'Entidad federativa') ?></dt>
                        <dd><?php 
                        $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$model->iDEMPRESA-> ENTIDAD_FEDERATIVA, 'CATEGORIA'=>1, 'ACTIVO'=>1]);
         			echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?></dd>
                        
                         
                         <dt><?= Yii::t('backend', 'Telefono') ?></dt>
                        <dd><?= $model->iDEMPRESA->TELEFONO ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Municipio o delegación') ?></dt>
                        <dd><?php 
                        $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$model->iDEMPRESA-> MUNICIPIO_DELEGACION, 'CATEGORIA'=>2, 'ACTIVO'=>1]);
         			echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?></dd>	
                        
                          <dt><?= Yii::t('backend', 'Numero de trabajadores') ?></dt>
                        <dd><?= $model->iDEMPRESA->	  NUMERO_TRABAJADORES ?></dd>	
                       
                         <dt><?= Yii::t('backend', 'Giro principal') ?></dt>
                        <dd><?php 
                        $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$model->iDEMPRESA-> GIRO_PRINCIPAL, 'CATEGORIA'=>4, 'ACTIVO'=>1]);
         			echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?></dd>
                        
                         
                        <dt><?= Yii::t('backend', 'Codigo postal') ?></dt>
                        <dd><?= $model->iDEMPRESA->	CODIGO_POSTAL ?></dd>                   
					<dt><?= Yii::t('backend', 'Mas') ?></dt>
					<dd><?php  echo '. . . . .';?></dd>
					
                     </dl>
                </div><!-- /.box-body -->
                <div class="box-footer">
                
			    	 <?= Html::a('<i class="fa fa-eye"> </i> Ver empresa ', ['empresa/viewbyuser','id'=>$model->ID_COMISION_MIXTA], ['class' => 'btn btn-default']) ?>
            </div>
            
        </div>  
     </div>        
       </div>
      <div class="row"> 
       
            <div class="col-md-6  col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                  <i class="fa fa-users "></i>
                    <h2 class="box-title"><?= Yii::t('backend', 'Trabajadores') ?><small> que están relacionados en esta comisión </small></h2>
                <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
           
           <table class="table table-hover" >
            <thead> 
            <tr> 	<td colspan="3"  style="text-align: center;" >Empresa</td></tr>
	         <tr>
		         <th>Nombre empresa matriz</th>  
		         <th>Numero de trabajadores</th>		         
	         </tr>
	         <tr>
	         </tr>
         </thead>
         <tbody>
          
         	<tr>
         		<td><?= $model->iDEMPRESA->NOMBRE_RAZON_SOCIAL;?></td>
         		<td><?php 
         			echo    count ($model->iDEMPRESA->trabajadors);
	         		?>
         		</td>
            	</tr>
            	
         
         </tbody>
         </table>
       <table class="table table-hover" >
         <thead> 
         <tr>
         	<td colspan="3" style="text-align: center;">Establecimientos</td>
         </tr>
	         <tr>
		   
		         <th>ID Establecimiento</th>
		         <th>Nombre comercial</th>  
		         <th>Numero de trabajadores</th>		         
		         
	         </tr>
	         <tr>
	         </tr>
         </thead>
         
         
          <tbody>
          
         	
         	<?php $u = 0; foreach ($model->iDESTABLECIMIENTOs as $establecimiento){?>
         	
         	<tr>
         		
         	
         		<td><?= $establecimiento->ID_EMPRESA;?></td>
         		<td><?= $establecimiento->NOMBRE_COMERCIAL;?></td>
         		<td><?php 
         			                                         
                           
         			echo    count ($establecimiento->trabajadors);
	         		?>
         		</td>
      		
         		
            	</tr>
            	
         	<?php }?>
         </tbody>
         </table>
         
          </div><!-- /.box-body -->
                
                  <div class="box-footer">
                  	  <td><h5>total de trabajadores   <span class="badge bg-yellow">
                          
                       <?php echo  $trajaEstab;?>  </span></td>
               
                  </div>
          
                </div><!-- /.box-primary -->
              
               </div>
        
      <div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                 <i class="fa fa-male"></i>               
                    <h3 class="box-title"><?= Yii::t('backend', 'Representante de los trabajadores') ?><br /> <small>que revisara las actividades a desarrollar en la comisión </small></h3>
                <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
            		
            		<?php if (isset($model->iDREPRESENTANTETRABAJADORES)):?>
            		
            		<dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'Nombre') ?></dt>
                        <dd><?= $model->iDREPRESENTANTETRABAJADORES->NOMBRE ?></dd>
                     
                        <dt><?= Yii::t('backend', 'Apellido paterno') ?></dt>
                        <dd><?= $model->iDREPRESENTANTETRABAJADORES->APP ?></dd>
            		
                        <dt><?= Yii::t('backend', 'Apellido materno') ?></dt>
                        <dd><?= $model->iDREPRESENTANTETRABAJADORES->APM ?></dd>
            		
                        <dt><?= Yii::t('backend', 'RFC') ?></dt>
                        <dd><?= $model->iDREPRESENTANTETRABAJADORES->RFC ?></dd>
                     
                        <dt><?= Yii::t('backend', 'Empresa origen') ?></dt>
                        <dd><?= isset($model->iDREPRESENTANTETRABAJADORES->iDEMPRESA)? $model->iDREPRESENTANTETRABAJADORES->iDEMPRESA->NOMBRE_COMERCIAL : '' ?></dd>
                     </dl>
            		
            		<?php else :?>
            		
            		<p class="text text-muted text-right"> <i class="fa fa-warning"></i> <i>No se ha seleccionado representante de los trabajadores</i> </p>
            		
            		<?php endif;?>
            		
        		</div>
        		
        	    <div class="box-footer">
    	              	  <a href="#" class="btn btn-default" data-toggle="modal" data-target="#mod_trabajadores" id="userButton">
							<i class="fa fa-check-square-o"></i>&nbsp;<?= Yii::t('backend', 'Seleccionar')?>
				   		 </a>
                </div>	
       </div>
      </div>  
        
  </div>  
        

   <div class="row">
        
 		<div class="col-md-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                       
                           <i class="fa fa-calendar"></i>
                      <h3 class="box-title"><?= Yii::t('backend', 'Resumen de planes en esta comisión') ?>
                      <span class="badge bg-yellow">
                            <?= count($model->plans)?:0 ?>
                        </span>
                        </h3>
                        <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
                 </div><!-- /.box-header -->
                             <div class="box-body">
                               
                               <div class ="table-responsive">
                               
   <table class="table table-hover" >
         
         <thead> 
         	<tr>
	         	<th>Id plan </th>  
	         	<th>N°etapas</th> 
	         	<th>Alias</th>
	         	<th> Total hombres</th> 
	         	<th> Total mujeres</th> 
	         	<th>cursos</th> 
	         	<th> <i><?= Yii::t('backend', 'Estatus') ?></i></th> 
         	</tr>
         </thead>
          
         <tbody>
     
              	<?php $i = 0; foreach ($model->plans as $plan){?>  	
         	<tr>
                <td><?= $plan->ID_PLAN?></td>
         		<td><?= $plan->NUMERO_ETAPAS?></td>
         	    <td><?= $plan->ALIAS?>
         		<td><?= $plan->TOTAL_HOMBRES?></td>
         		<td><?= $plan->TOTAL_MUJERES?></td>
         		<td><?= count($plan->cursos)?:0 ?></td>
                <td><span class="label label-success"><?= $plan->getStatus()?></span></td>
		
         	</tr>
         	<?php }?>
         </tbody>
        
        </table>
        </div> 
        
        
         </div><!-- /.box-body -->
                
         <div class="box-footer">
		 
		 	 <?= Html::a('<i class="fa fa-plus-square"></i> Crear nuevo plan', ['plan/createbycomision','id'=>$model->ID_COMISION_MIXTA], ['class' => 'btn btn-success']) ?>
		 
		 </div>	
                
            </div>
        </div> 
     </div>     
        
 <div class="row">
 	<div class="col-md-12 col-xs-12 col-sm-12">
 	<div class="box box-primary">
			  <div class="box-header">
						    <i class="fa fa-calendar"></i>
						<h3 class="box-title"><?= Yii::t('backend', 'Planes y programas de capacitación') ?>  <small>relacionados a la comisión</small>  
						
						</small></h3>	
						<div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
				</div>
			<div class="box-body">
			
			
			
			<?php 
				echo Tabs::widget([
				    'items' =>$planItems
				]);
			?>
			
			</div>
			
	
			
	</div>
	</div>			
</div>      
        
       
        
<!-- Modal implementation -->   
     
 <div class="modal fade" id="mod_establishments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-university"></i>&nbsp;<?=Yii::t('backend', 'Agregar un establecimiento a esta comisión mixta de capacitación, adiestramiento y productividad.') ?></h4>
                                        </div>
	                                        <div class="modal-body">
											 <?php \yii\widgets\Pjax::begin(); ?>	
											    <?= GridView::widget([
											        'dataProvider' => $dataproviderEstablecimiento,
											        'filterModel' => $searchEstablecimientoModel,
											        'columns' => [
											            ['class' => 'yii\grid\SerialColumn'],
											
											            //'ID_EMPRESA',
											            //'ID_REPRESENTANTE_LEGAL',
											            'NOMBRE_COMERCIAL',
											            //'NOMBRE_CENTRO_TRABAJO',
											            //'NOMBRE_RAZON_SOCIAL',
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
															
														return  Html::a(Yii::t('backend', 'Agregar ') .'&nbsp;<i class="fa fa-check-circle-o"></i>',['addestablishment','id'=>Yii::$app->request->get('id'),'id_establishment'=>$data->ID_EMPRESA],
																['class' => 'btn btn-primary',
																'data-loading-text'=>"Loading...",
																'id'=>'legal_'.$data->ID_EMPRESA,
																'onclick'=>"
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
												<?php \yii\widgets\Pjax::end(); ?>
										    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> <?= Yii::t('backend', 'Salir')?></button>
                                            
                                        </div>
                                    </div>
                                </div>
</div>


<div class="modal fade" id="mod_trabajadores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-male"></i>&nbsp;<?=Yii::t('backend', 'Agregar un representante de los trabajadores a esta comisión mixta de capacitación, adiestramiento y productividad.') ?></h4>
                                        </div>
	                                        <div class="modal-body">
											 <?php \yii\widgets\Pjax::begin(); ?>	
											    <?= GridView::widget([
											        'dataProvider' => $dataproviderTrabajadores,
											        'filterModel' => $trabajadorSearch,
											        'columns' => [
											            ['class' => 'yii\grid\SerialColumn'],
											
											            //'ID_EMPRESA',
											            //'ID_REPRESENTANTE_LEGAL',
											            'NOMBRE',
											            //'NOMBRE_CENTRO_TRABAJO',
											            //'NOMBRE_RAZON_SOCIAL',
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
															
														return  Html::a(Yii::t('backend', 'Agregar ') .'&nbsp;<i class="fa fa-check-circle-o"></i>',['select-representante','id'=>Yii::$app->request->get('id'),'id_trabajador'=>$data->ID_TRABAJADOR],
																['class' => 'btn btn-primary',
																'data-loading-text'=>"Loading...",
																'id'=>'trabajador_'.$data->ID_TRABAJADOR,
																'onclick'=>"
																$('#trabajador_$data->ID_TRABAJADOR').fadeIn(300);
																$('#trabajador_$data->ID_TRABAJADOR').text('...');
																$('#trabajador_$data->ID_TRABAJADOR').removeClass('btn btn-primary').addClass('btn btn-success');
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
</div>


