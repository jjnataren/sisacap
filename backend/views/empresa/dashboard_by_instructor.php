<?php
use yii\web\View;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use backend\models\Plan;
use kartik\checkbox\CheckboxX;
use backend\models\Constancia;
use backend\models\Catalogo;
use yii\helpers\Html;
use backend\models\ComisionMixtaCap;
use yii\widgets\ActiveForm;
use frontend\models\ContactForm;
use yii\captcha\Captcha;
use backend\models\Curso;

$this->title = "Bienvenido instructor " . ($model->NOMBRE == null) ? Yii::$app->user->identity->username : strtoupper ( $model->NOMBRE . ' ' . $model->APP . ' ' . $model->APM );

$this->params ['subtitle'] = 'Bienvenido';

$this->params ['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-graduation-cap  fa-stack-1x"></i>
							   </span>';
$this->registerJs ( "$('#dataTable1').dataTable( {'language': {'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json' }});", View::POS_END, 'my-options' );
  
/* aarays cursos */

$cursosPorIniciar = [ ]; // cursos creados
$cursosProceso = [ ]; // cursos inciados
$cursosFinalizados = [ ]; // cursos terminados

/* arrays constancias */  
$constanciasEnRevision = [ ];
$constanciasAsignadas = [ ];
$constanciasFirmadas = [ ];

/* foreach course */

foreach ( $model->cursos as $curso ) {
	
	if ($curso->getCurrentStatus () === Curso::STATUS_INICIADO) {
		$cursosProceso [] = $curso;
	} 

	elseif ($curso->getCurrentStatus () === Curso::STATUS_CREADO) {
		$cursosPorIniciar [] = $curso;
	} elseif ($curso->getCurrentStatus () === Curso::STATUS_CONCLUIDO) {
		$cursosFinalizados [] = $curso;
	}
	
	
	/**
	 * Here we can filter all constancias by  its type
	 */
	
	foreach ($curso->constancias as $constancia){
		
		if ($constancia->ESTATUS === Constancia::STATUS_ASIGNADA)
			$constanciasAsignadas[] = $constancia;
			elseif  ($constancia->ESTATUS === Constancia::STATUS_RECHAZADA_MANAGER || $constancia->ESTATUS === Constancia::STATUS_REJECTED	)
				$constanciasEnRevision[] = $constancia;
				elseif ($constancia->ESTATUS === Constancia::STATUS_SIGNED_INSTRUCTOR)
					$constanciasFirmadas[] = $constancia;
				
	}
	
	
}
/* foreach constancias */

/*
 * foreach ($model-> cursos-> constancias as $constancia)
 *
 * if($constancia->ESTATUS === Constancia::STATUS_REJECTED ){
 * $constanciasAsignadas[] = $constancia;
 *
 * } elseif ($constancia->ESTATUS === Constancia::STATUS_ASUGNADA){
 * $constanciasEnRevision[] =$constancia;
 *
 * }elseif ($constancia->ESTATUS === Constancia::STATUS_SIGNED_INSTRUCTOR){
 * $constanciasFirmadas[] =$constancia;
 * }
 */

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
				<p>Cursos relacionados al instructor</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a class="small-box-footer" href="#anchor_comision"> Mas información <i
				class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-md-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>
					<i class="glyphicon glyphicon-calendar"></i>
                                                                                             
                                   
                                         
                                         <?php  echo count($constanciasAsignadas); ?>
                                        




				</h3>
				<p>Constancias por firmar</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a class="small-box-footer" href="#anchor_constancias">Más información <i
				class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-md-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<i class="glyphicon glyphicon-warning-sign""></i>
					
					
                                    
                                        <?php  echo count($constanciasEnRevision); ?>
                      </h3>                  
				<p>Constancias en revisión</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a class="small-box-footer" href="#anchor_constanciasrev"> Más información <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-md-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-orange">
			<div class="inner">
				<h3>
				<i class="fa  fa-file-pdf-o"></i>
				
				<?php  echo count($constanciasFirmadas); ?>
                                        </h3>
				<p>constancias firmadas</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a class="small-box-footer" href="#anchor_constanciasfirm"> Más información 
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
</div>
<!-- /.row -->


<h1 >
	Información de cursos  
	<small> relacionados al instructor </small>
</h1>
<br />

<h4 class="page-header" id="anchor_comision">
	

<span class="fa-stack">
  <i class="fa fa-laptop fa-stack-2x"></i>
  <i class="glyphicon glyphicon-play"></i>
</span>
	 Cursos por impartir  
	<small>cursos que deberá impartir en la fecha de inicio indicada</small>
</h4>

<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">
		<div class="box box-info" id="controls">

		
			<div class="box-header">
				<i class="fa fa-laptop"></i> 
				 <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
			</div>

			<div class="box-body table-responsive">

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Fecha de inicio</th>
							<th>Fecha de fin</th>
							<th>Numero de horas</th>
							<th>Area tematica</th>
							<th>Modalidad</th>
							<th>Ver</th>


						</tr>
					</thead>
					<tbody>	  	
												         																
						<?php  foreach ($cursosPorIniciar as $ci){ ?>
								 					
							<tr>
							<td><a href="#"><i class="fa fa-arrow-right"></i><strong> <?= $ci->ID_CURSO?> </strong> </a></td>
							<td><?=$ci->NOMBRE;?></td>
							<td><?=$ci->FECHA_INICIO;?></td>
							<td><?=$ci->FECHA_TERMINO;?></td>
							<td><?=$ci->DURACION_HORAS; ?></td>
							
							
							 <td><?php 
                                    $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$ci->AREA_TEMATICA, 'CATEGORIA'=>6, 'ACTIVO'=>1]);
         			               echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?></td>
         			
							
							
							 <td><?php
										
										$modalidades = Curso::getModalidad();
						    			  echo  isset($modalidades[$ci->MODALIDAD_CAPACITACION])?$modalidades[$ci->MODALIDAD_CAPACITACION]:'no asignado'; 
									        ?>
									 </td>
                           <td>
                            <?= Html::a('<i class="fa fa-eye"></i>', ['constancias/view-course-instructor', 'id'=>$ci->ID_CURSO],  [ 'class' => 'btn btn-info btn-xs' ] ) ?>
                           </td>
						</tr>
				         	<?php }?>      																		
																						
						</tbody>
					<tfoot>
						<tr>
							<td colspan="8" style="text-align: right;">
								Total <span class="badge bg-white"><?= count($cursosPorIniciar); ?></span>
							</td>
						</tr>
					</tfoot>
				</table>

			</div>
		</div>
	</div>

</div>


<h3 class="page-header" id="anchor_comision">
<span class="fa-stack">
  <i class="fa fa-laptop fa-stack-2x"></i>
  <i class="fa fa-spinner"></i>
</span>
  
  

	Cursos siendo impartidos
	<small>cursos que estan siendo impartidos a la fecha actual</small>
</h3>



<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">
		<div class="box box-warning" id="controls">

			<div class="box-header">
				<i class="fa fa-laptop"></i>
 <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->

			</div>


			<div class="box-body table-responsive">

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Fecha de inicio</th>
							<th>Fecha de fin</th>
							<th>Numero de horas</th>
							<th>Area tematica</th>
							<th>Modalidad</th>
							<th>Ver</th>

						</tr>
					</thead>
					<tbody>											
																	
							<?php  foreach ($cursosProceso as $cp): ?>
							<tr>
							<td><a href="#"><i class="fa fa-arrow-right"></i><strong> <?= $cp->ID_CURSO?> </strong> </a></td>
							<td><?= $cp->NOMBRE?></td>
							<td><?= $cp->FECHA_INICIO?></td>
							<td><?= $cp->FECHA_TERMINO?></td>
							<td><?=$cp->DURACION_HORAS; ?></td>
						 <td><?php 
                                    $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$cp->AREA_TEMATICA, 'CATEGORIA'=>6, 'ACTIVO'=>1]);
         			               echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?></td>
         			
                         <td><?php
										
										$modalidades = Curso::getModalidad();
						    			  echo  isset($modalidades[$cp->MODALIDAD_CAPACITACION])?$modalidades[$cp->MODALIDAD_CAPACITACION]:'no asignado'; 
									        ?>
									 </td>
                           <td>
                           <?= Html::a('<i class="fa fa-eye"></i>', ['constancias/course-by-instructor', 'id'=>$cp->ID_CURSO],  [ 'class' => 'btn btn-info btn-xs' ] ) ?>
                           
                           </td>

						</tr>
				         	<?php endforeach;?>	    
																	
			    	</tbody>
			    	<tfoot>
						<tr>
							<td colspan="8" style="text-align: right;">
								Total <span class="badge bg-white"><?= count($cursosProceso); ?></span>
							</td>
						</tr>
					</tfoot>
				</table>

			</div>
		</div>
	</div>
</div>


<h4 class="page-header" id="anchor_comision">
<span class="fa-stack">
  <i class="fa fa-laptop fa-stack-2x"></i>
  <i class="glyphicon glyphicon-stop"></i>
</span>
	 Cursos finalizados  
	<small>cursos que fueron impartidos </small>
</h4>

<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">
		<div class="box box-success" id="controls">

			<div class="box-header">
				<i class="fa fa-laptop"></i>
				 <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
			</div>

			<div class="box-body table-responsive">

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Fecha de inicio</th>
							<th>Fecha de fin</th>
							<th>Numero de horas</th>
							<th>Area tematica</th>
							<th>Modalidad</th>
							<th>Ver</th>
						</tr>
					</thead>
					<tbody>											
												         																
							<?php $i = 0; foreach ($cursosFinalizados as $cf) {?>
							<tr>
							<td><a href="#"><i class="fa fa-arrow-right"></i><strong> <?= $cf->ID_CURSO?> </strong> </a></td>
							<td><?= $cf->NOMBRE?></td>
							<td><?= $cf->FECHA_INICIO?></td>
							<td><?= $cf->FECHA_TERMINO?></td>
								<td><?=$cf->DURACION_HORAS; ?></td>
							 <td><?php 
                                    $catalog = Catalogo::findOne(['ID_ELEMENTO'=>$cf->AREA_TEMATICA, 'CATEGORIA'=>6, 'ACTIVO'=>1]);
         			               echo isset($catalog)?$catalog->NOMBRE: 'no asignado'; ?></td>
         			 <td><?php
										
										$modalidades = Curso::getModalidad();
						    			  echo  isset($modalidades[$cf->MODALIDAD_CAPACITACION])?$modalidades[$cf->MODALIDAD_CAPACITACION]:'no asignado'; 
									        ?>
									 </td>
                           <td> <?= Html::a('<i class="fa fa-eye"></i>', ['constancias/view-course-constancia', 'id'=>$cf->ID_CURSO],  [ 'class' => 'btn btn-info btn-xs' ] ) ?>
                            </td>                                            	

						</tr>
				         	<?php }?>	    
																	
					</tbody>
					<tfoot>
						<tr>
							<td colspan="8" style="text-align: right;">
								Total <span class="badge bg-white"><?= count($cursosFinalizados); ?></span>
							</td>
						</tr>
					</tfoot>
					
				</table>

			</div>
		</div>
	</div>
</div>




<h4 class="page-header" id="anchor_constancias">

<h1 >
Información  de constancias  
	<small> asignadas al instructor</small>
</h1></h4>
<br />


<h4 class="page-header" id="anchor_constancias">
<span class="fa fa-file-o">
 
</span>
	 Constancias por evaluar y firmar  
	<small>constancias que estan pendiente de evaluacion y firma por instructor</small>
</h4>


<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">

<div class="box box-primary">
	<div class="box-header">
		<i class="fa fa-paperclip"></i>
 <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->


	</div>
	<div class="box-body table-responsive">

		<table id="dataTable1" class="table table-condensed" cellspacing="0"
			width="100%">
			<thead>

				<tr>
					<td colspan="5"><i class="fa fa-user"></i> Datos trabajador</td>
					<td colspan="3"><i class="fa fa-file-pdf-o"></i> Datos constancia</td>
				</tr>

				<tr>
					 				<th>Id</th>
									<th><?=Yii::t('backend', 'Nombre') ?></th>									
									<th><?=Yii::t('backend', 'CURP')?></th>
									<th><?=Yii::t('backend', 'Puesto')?></th>
									<th><?=Yii::t('backend', 'Establecimiento')?></th>
									<th>Id constancia</th>
									<th>Curso</th>
									<th></th>
									
																			
				</tr>
							</thead>
							<tbody>
											
			<!---->
					 	<?php  foreach ($constanciasAsignadas as $coa) {?>		
											
								
							<tr>
				         		<td><?= $coa->iDTRABAJADOR->ID_TRABAJADOR;?></td>
				         		<td><?= $coa->iDTRABAJADOR->NOMBRE . ' ' . $coa->iDTRABAJADOR->APP. ' ' . $coa->iDTRABAJADOR->APM;?></td>
					         	<td><?= $coa->iDTRABAJADOR->CURP;?></td>
					         	<td><?=  ($coa->iDTRABAJADOR->pUESTO)?$coa->iDTRABAJADOR->pUESTO->NOMBRE_PUESTO : 'no asignado';?></td>
					         	<td><?= $coa->iDTRABAJADOR->iDEMPRESA->NOMBRE_COMERCIAL;?></td>
					         	<td><?= $coa->ID_CONSTANCIA?></td>
					         	<td><?= $coa->iDCURSO->NOMBRE?></td>
					         	<td>   <?= Html::a('<i class="fa fa-eye"></i>', ['constancias/dashboard-by-instructor', 'id'=>$coa->ID_CONSTANCIA],  [ 'class' => 'btn btn-info btn-xs' ] ) ?></td>
				         	</tr>
								
						<?php } ?>
			
			
			</tbody>
			
				<tfoot>
						<tr>
							<td colspan="10" style="text-align: right;">
								Total <span class="badge bg-blue"><?= count($constanciasAsignadas); ?></span>
							</td>
						</tr>
					</tfoot>
		</table>

	</div>
</div>

</div>
</div>



<h4 class="page-header" id="anchor_constanciasrev">
<span class="fa fa-file-o">

</span>
	 Constancias con observaciones  
	<small>constancias que tubieron alguna obervacion por parte de la empresa o por el propio instructor</small>
</h4>


<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">

<div class="box box-primary">
	<div class="box-header">
		<i class="fa fa-paperclip"></i>

 <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->

	</div>
	<div class="box-body table-responsive">

		<table id="dataTable_con2" class="table table-bordered" >
			<thead>

				<tr>
					<td colspan=5"><i class="fa fa-user"></i> Datos trabajador</td>
					<td colspan="8"><i class="fa fa-file-pdf-o"></i> Datos constancia</td>
				</tr>

				<tr>
					 				<th>Id</th>
									<th><?=Yii::t('backend', 'Nombre') ?></th>									
									<th><?=Yii::t('backend', 'CURP')?></th>
									<th><?=Yii::t('backend', 'Puesto')?></th>
									<th><?=Yii::t('backend', 'Establecimiento')?></th>
									<th>Id constancia</th>
									<th>Curso</th>
									<th>Aprobado</th>
									<th>Tipo</th>
									<th>Promedio</th>
									<th colspan="2">Último comentario</th>
									<th colspan="1">Ver</th>
															
																
				</tr>
							</thead>
							<tbody>
										
					 	<?php  foreach ($constanciasEnRevision as $cor) {?>		
											
							<tr>
				         		<td><?= $cor->iDTRABAJADOR->ID_TRABAJADOR;?></td>
				         		<td><?= $cor->iDTRABAJADOR->NOMBRE . ' ' . $cor->iDTRABAJADOR->APP. ' ' . $cor->iDTRABAJADOR->APM;?></td>
					         	<td><?= $cor->iDTRABAJADOR->CURP;?></td>
					         <td><?=  ($cor->iDTRABAJADOR->pUESTO)?$cor->iDTRABAJADOR->pUESTO->NOMBRE_PUESTO : 'no asignado';?></td>
					         	<td><?= $cor->iDTRABAJADOR->iDEMPRESA->NOMBRE_COMERCIAL;?></td>
					         	<td><?= $cor->ID_CONSTANCIA?></td>
					         	<td><?= $cor->iDCURSO->NOMBRE?></td>
					            	<td><?= ($cor->APROBADO==1) ? 'Aprobado' : 'Reprobado'?></td>
					         	<td><?= ($cor->TIPO_CONSTANCIA ==1)?'Certificada':'Comprobante'?></td>
					         			         
					         	<td><?= $cor->PROMEDIO ?></td>
					                               
					         	<td colspan="2"><?= $cor->COMENTARIO?></td>
					         	<td>  <?= Html::a('<i class="fa fa-eye"></i>', ['constancias/dashboard-by-instructor', 'id'=>$cor->ID_CONSTANCIA],  [ 'class' => 'btn btn-info btn-xs' ] ) ?></td>
                               
					         	
				         	</tr>
								
						<?php } ?>			
			
			</tbody>
					<tfoot>
						<tr>
							<td colspan="13" style="text-align: right;">
								Total <span class="badge bg-blue"><?= count($constanciasEnRevision); ?></span>
							</td>
						</tr>
					</tfoot>
		</table>

	</div>
</div>
 <?php if (isset($constancias) && count>0) :?>
							        <?= Html::submitButton('<i class="fa fa-floppy-o"></i>' 
				  		.'&nbsp;'.Yii::t('backend', 'Guardar cambios'),
					  		 ['class' => 'btn btn-success', 'name'=>'proccess' ]) ?>
						        <?php endif;?>  
</div>


</div>



<h4 class="page-header" id="anchor_constanciasfirm">
<span class="fa  fa-file-pdf-o">
  
 
</span>
	 Constancias firmadas  
	<small>constancias que ya fueron firmadas por el instructor</small>
</h4>


<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">

<div class="box box-primary">
	<div class="box-header">
		<i class="fa fa-paperclip"></i>

 <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->

	</div>
	<div class="box-body table-responsive">

		<table id="dataTable_con3" class="table table-bordered" >
			<thead>

				<tr>
					<td colspan="5"><i class="fa fa-user"></i> Datos trabajador</td>
					<td colspan="7"><i class="fa fa-file-pdf-o"></i> Datos constancia</td>
				</tr>

				<tr>
					 				<th>Id</th>
									<th><?=Yii::t('backend', 'Nombre') ?></th>									
									<th><?=Yii::t('backend', 'CURP')?></th>
									<th><?=Yii::t('backend', 'Puesto')?></th>
									<th><?=Yii::t('backend', 'Establecimiento')?></th>
									<th>Id constancia</th>
									<th>Curso</th>
									<th>Aprobado</th>
									<th>Tipo</th>
									<th colspan="2">Último comentario</th>
									<th>Ver </th>
								
																
				</tr>
							</thead>
							<tbody>
											
										
					 	<?php  foreach ($constanciasFirmadas as $cof) {?>		
											
							<tr>
				         		<td><?= $cof->iDTRABAJADOR->ID_TRABAJADOR;?></td>
				         		<td><?= $cof->iDTRABAJADOR->NOMBRE . ' ' . $cof->iDTRABAJADOR->APP. ' ' . $cof->iDTRABAJADOR->APM;?></td>
					         	<td><?= $cof->iDTRABAJADOR->CURP;?></td>
					         	<td><?=  ($cof->iDTRABAJADOR->pUESTO)?$cof->iDTRABAJADOR->pUESTO->NOMBRE_PUESTO : 'no asignado';?></td>
					         	<td><?= $cof->iDTRABAJADOR->iDEMPRESA->NOMBRE_COMERCIAL;?></td>
					         	<td><?= $cof->ID_CONSTANCIA?></td>
					         	<td><?= $cof->iDCURSO->NOMBRE?></td> 
					         	<td><?= ($cof->APROBADO==1) ? 'Aprobado' : 'Reprobado'?></td>
					         	<td><?= ($cof->TIPO_CONSTANCIA ==1)?'Certificada':'Comprobante'?></td>
					         	<td colspan="2"><?= $cof->COMENTARIO?></td>
					         	<td>  <?= Html::a('<i class="fa fa-eye"></i>', ['constancias/constancia-firmada', 'id'=>$cof->ID_CONSTANCIA],  [ 'class' => 'btn btn-info btn-xs' ] ) ?></td>
					         	
					         	
				         	</tr>
								
						<?php } ?>
			
			
			</tbody>
					<tfoot>
						<tr>
							<td colspan="12" style="text-align: right;">
								Total <span class="badge bg-blue"><?= count($constanciasFirmadas); ?></span>
							</td>
						</tr>
					</tfoot>
		</table>

	</div>
</div>

</div>
</div>



<h1 >
Ayuda y soporte  
	<small> </small>
</h1>
<br />


<div class="box box-info">
	<div class="box-header ui-sortable-handle" style="cursor: move;">
		<i class="fa fa-envelope"></i>
		<h3 class="box-title">Enviar correo a soporte tecnico</h3>
		<div class="box-tools pull-right">
			<button title="ocultar/mostrar" data-toggle="tooltip"
				data-widget="collapse" class="btn btn-default btn-xs"
				data-original-title="Collapse">
				<i class="fa fa-minus"></i>
			</button>
			<button title="" data-toggle="tooltip" data-widget="remove"
				class="btn btn-default btn-xs" data-original-title="Remove">
				<i class="fa fa-times"></i>
			</button>
		</div>
		<!-- tools box -->


	</div>
	<div class="box-body">
										 <?php
											
											$concact = new ContactForm ();
											$form = ActiveForm::begin ( [ 
													'id' => 'contact-form' 
											] );
											?>
                <?= $form->field($concact, 'name')?>
                <?= $form->field($concact, 'email')?>
                <?= $form->field($concact, 'subject')?>
                <?= $form->field($concact, 'body')->textArea(['rows' => 6])?>
              
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button'])?>
                </div>
            <?php ActiveForm::end(); ?>
            </div>

</div>




