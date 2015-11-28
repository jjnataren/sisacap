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
				<p>Cursos relacionados</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a class="small-box-footer" href="#anchor_comision"> DC-1 More info <i
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
                                                                                             
                                     
                                         
                                         <?=count ( Constancia::findBySql ( 'select * from tbl_constancia where ID_CURSO in 
                                         		
                                         		(select ID_INSTRUCTOR from tbl_curso where ID_INSTRUCTOR )' ) );?>
                                        
                                        <!--  ('select * from tbl_indicador_curso where id_curso in 
                            		(select id_curso from tbl_curso where id_plan in 
                            			(select id_plan from tbl_plan where id_comision in 
                            				(select id_comision from tbl_comision_mixta_cap where id_empresa = '. $id.') ))' );
    										-->




				</h3>
				<p>Constancias por firmar</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a class="small-box-footer" href="#anchor_plan"> DC-2 More info <i
				class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-md-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>
					<i class="fa  fa-file-pdf-o"></i>
                                    
                                        <?=8; // count(Constancia::findBySql("select * from tbl_constancia where ID_EMPRESA = $model->ID_EMPRESA AND ACTIVO = 1")->all());                                    </h3>
                                        ?>
				<p>Constancias en revisión</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a class="small-box-footer" href="#anchor_constancia1"> DC-3 More
				info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-md-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>10</h3>
				<p>Listas de constancias enviadas</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a class="small-box-footer" href="#anchor_constancia"> DC-4 More info
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
</div>
<!-- /.row -->


<h4 class="page-header" id="anchor_comision">
	

<span class="fa-stack">
  <i class="fa fa-laptop fa-stack-2x"></i>
  <i class="fa fa-play fa-stack-1x text-success"></i>
</span>
	 Curos por imartir  
	<small>cursos que debera impartir en la fecha de inicio indicada</small>
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


						</tr>
					</thead>
					<tbody>	  	
												         																
						<?php  foreach ($cursosPorIniciar as $ci){ ?>
								 					
							<tr>
							<td><a href="#"><i class="fa fa-arrow-right"></i><strong> <?= $ci->ID_CURSO?> </strong> </a></td>
							<td><?=$ci->NOMBRE;?></td>
							<td><?=$ci->FECHA_INICIO;?></td>
							<td><?=$ci->FECHA_TERMINO;?></td>

						</tr>
				         	<?php }?>      																		
																						
						</tbody>
					<tfoot>
						<tr>
							<td colspan="4" style="text-align: right;">
								Total <span class="badge bg-white"><?= count($cursosPorIniciar); ?></span>
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
  <i class="fa fa-pause fa-stack-1x text-warning"></i>
</span>
	Curos siendo impartidos
	<small>cursos que estan siendo impartidos a la fecha actual</small>
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

						</tr>
					</thead>
					<tbody>											
																	
							<?php  foreach ($cursosProceso as $cp): ?>
							<tr>
							<td><a href="#"><i class="fa fa-arrow-right"></i><strong> <?= $cp->ID_CURSO?> </strong> </a></td>
							<td><?= $cp->NOMBRE?></td>
							<td><?= $cp->FECHA_INICIO?></td>
							<td><?= $cp->FECHA_TERMINO?></td>

						</tr>
				         	<?php endforeach;?>	    
																	
			    	</tbody>
			    	<tfoot>
						<tr>
							<td colspan="4" style="text-align: right;">
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
  <i class="fa fa-stop fa-stack-1x text-danger"></i>
</span>
	 Curos finalizados  
	<small>cursos que fueron impartidos </small>
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
						</tr>
					</thead>
					<tbody>											
												         																
							<?php $i = 0; foreach ($cursosFinalizados as $cf) {?>
							<tr>
							<td><a href="#"><i class="fa fa-arrow-right"></i><strong> <?= $cf->ID_CURSO?> </strong> </a></td>
							<td><?= $cf->NOMBRE?></td>
							<td><?= $cf->FECHA_INICIO?></td>
							<td><?= $cf->FECHA_TERMINO?></td>

						</tr>
				         	<?php }?>	    
																	
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4" style="text-align: right;">
								Total <span class="badge bg-white"><?= count($cursosFinalizados); ?></span>
							</td>
						</tr>
					</tfoot>
					
				</table>

			</div>
		</div>
	</div>
</div>


<h1 >
Relación de constancias  
	<small> asignadas</small>
</h1>



<h4 class="page-header" id="anchor_constancias">
<span class="fa-stack">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-stop fa-stack-1x text-info"></i>
</span>
	 Constancias por evaluar y firmar  
	<small>constancias que estan pendiente de evaluacion y firma por instructor</small>
</h4>


<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">

<div class="box box-primary">
	<div class="box-header">
		<i class="fa fa-paperclip"></i>



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
					         	<td><?= $coa->iDTRABAJADOR->pUESTO->NOMBRE_PUESTO;?></td>
					         	<td><?= $coa->iDTRABAJADOR->iDEMPRESA->NOMBRE_COMERCIAL;?></td>
					         	<td><?= $coa->ID_CONSTANCIA?></td>
					         	<td><?= $coa->iDCURSO->NOMBRE?></td>
					         	<td></td>
				         	</tr>
								
						<?php } ?>
			
			
			</tbody>
			
				<tfoot>
						<tr>
							<td colspan="8" style="text-align: right;">
								Total <span class="badge bg-blue"><?= count($constanciasAsignadas); ?></span>
							</td>
						</tr>
					</tfoot>
		</table>

	</div>
</div>

</div>
</div>



<h4 class="page-header" id="anchor_constancias_observaciones">
<span class="fa-stack">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-stop fa-stack-1x text-danger"></i>
</span>
	 Constancias con observaciones  
	<small>constancias que tubieron alguna obervacion por parte de la empresa o por el propio instructor</small>
</h4>


<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">

<div class="box box-primary">
	<div class="box-header">
		<i class="fa fa-paperclip"></i>



	</div>
	<div class="box-body table-responsive">

		<table id="dataTable_con2" class="table table-bordered" >
			<thead>

				<tr>
					<td colspan="5"><i class="fa fa-user"></i> Datos trabajador</td>
					<td colspan="6"><i class="fa fa-file-pdf-o"></i> Datos constancia</td>
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
																			
				</tr>
							</thead>
							<tbody>
											
					 	<?php  foreach ($constanciasEnRevision as $cor) {?>		
											
							<tr>
				         		<td><?= $cor->iDTRABAJADOR->ID_TRABAJADOR;?></td>
				         		<td><?= $cor->iDTRABAJADOR->NOMBRE . ' ' . $cor->iDTRABAJADOR->APP. ' ' . $cor->iDTRABAJADOR->APM;?></td>
					         	<td><?= $cor->iDTRABAJADOR->CURP;?></td>
					         	<td><?= $cor->iDTRABAJADOR->pUESTO->NOMBRE_PUESTO;?></td>
					         	<td><?= $cor->iDTRABAJADOR->iDEMPRESA->NOMBRE_COMERCIAL;?></td>
					         	<td><?= $cor->ID_CONSTANCIA?></td>
					         	<td><?= $cor->iDCURSO->NOMBRE?></td>
					         	<td><?= $cor->APROBADO?></td>
					         	<td><?= $cor->TIPO_CONSTANCIA?></td>
					         	<td colspan="2"><?= $cor->COMENTARIO?></td>
					         	
				         	</tr>
								
						<?php } ?>
			
			
			</tbody>
					<tfoot>
						<tr>
							<td colspan="9" style="text-align: right;">
								Total <span class="badge bg-blue"><?= count($constanciasEnRevision); ?></span>
							</td>
						</tr>
					</tfoot>
		</table>

	</div>
</div>

</div>
</div>



<h4 class="page-header" id="anchor_constancias_observaciones">
<span class="fa-stack">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-stop fa-stack-1x text-danger"></i>
</span>
	 Constancias firmadas  
	<small>constancias que tubieron alguna obervacion por parte de la empresa o por el propio instructor</small>
</h4>


<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">

<div class="box box-primary">
	<div class="box-header">
		<i class="fa fa-paperclip"></i>



	</div>
	<div class="box-body table-responsive">

		<table id="dataTable_con3" class="table table-bordered" >
			<thead>

				<tr>
					<td colspan="5"><i class="fa fa-user"></i> Datos trabajador</td>
					<td colspan="6"><i class="fa fa-file-pdf-o"></i> Datos constancia</td>
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
																
				</tr>
							</thead>
							<tbody>
											
										
					 	<?php  foreach ($constanciasFirmadas as $cof) {?>		
											
							<tr>
				         		<td><?= $cof->iDTRABAJADOR->ID_TRABAJADOR;?></td>
				         		<td><?= $cof->iDTRABAJADOR->NOMBRE . ' ' . $cof->iDTRABAJADOR->APP. ' ' . $cof->iDTRABAJADOR->APM;?></td>
					         	<td><?= $cof->iDTRABAJADOR->CURP;?></td>
					         	<td><?= $cof->iDTRABAJADOR->pUESTO->NOMBRE_PUESTO;?></td>
					         	<td><?= $cof->iDTRABAJADOR->iDEMPRESA->NOMBRE_COMERCIAL;?></td>
					         	<td><?= $cof->ID_CONSTANCIA?></td>
					         	<td><?= $cof->iDCURSO->NOMBRE?></td>
					         	<td><?= $cof->APROBADO?></td>
					         	<td><?= $cof->TIPO_CONSTANCIA?></td>
					         	<td colspan="2"><?= $cof->COMENTARIO?></td>
					         	
				         	</tr>
								
						<?php } ?>
			
			
			</tbody>
					<tfoot>
						<tr>
							<td colspan="11" style="text-align: right;">
								Total <span class="badge bg-blue"><?= count($constanciasFirmadas); ?></span>
							</td>
						</tr>
					</tfoot>
		</table>

	</div>
</div>

</div>
</div>



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




