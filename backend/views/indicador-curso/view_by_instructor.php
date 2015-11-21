
<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorPlan */
$this->params ['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-bell fa-stack-1x"></i>
							   </span>';

$this->title = 'Notificación Curso: Id ' . $model->iDCURSO->ID_CURSO . ' - ' . $model->iDCURSO->NOMBRE;
$this->params ['breadcrumbs'] [] = [
		'label' => 'Notificaciones Curso',
		'url' => [
				'index'
		]
];
$this->params ['breadcrumbs'] [] = $this->title;

?>

<div class="row">
<div class="col-md-6 col-sm-12 col-xs-6">
	<div class="box box-info">
		<div class="box-header">
			<i class="fa fa-bell"></i>
			<h3 class="box-title"><?= Yii::t('backend', ' Detalles de la notificación.') ?> </h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<dl class="dl-horizontal">
				<dt><?= Yii::t('backend', 'Titulo') ?></dt>

				<dd><?= $model->TITULO ?></dd>
				<dt><?= Yii::t('backend', 'Clave') ?></dt>

				<dd><?= $model->CLAVE ?></dd>

			</dl>
			<h4>Descripción:</h4>
			<p>
	                                 <?=$model->DATA?>
                                 </p>
			</dl>

		</div>



		<div class="box-footer">
					 
<?=Html::a ( '<i class="fa  fa-trash-o"></i>	Borrar notificación', [ 'delete-by-instructor','id' => $model->ID_EVENTO ], [ 'class' => 'btn btn-danger','data' => [ 'confirm' => '¿Realmente quieres borrar este indicador?','method' => 'post' ] ] )?>
  
  
				</div>


	</div>


</div>
<!-- /.box-body -->


<div class="col-md-6 col-sm-12 col-xs-6">
	<div class="box box-info">
		<div class="box-header">
			<i class="fa fa-calendar"></i>
			<h3 class="box-title"><?= Yii::t('backend', ' Detalles del Curso de capacitación') ?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<dl class="dl-horizontal">

				<dt><?= Yii::t('backend', 'Id') ?></dt>
				<dd><?= $model->iDCURSO->ID_CURSO; ?></dd>

				<dt><?= Yii::t('backend', 'Nombre') ?></dt>
				<dd><?= $model->iDCURSO->NOMBRE; ?></dd>

				<dt><?= Yii::t('backend', 'Descripción') ?></dt>
				<dd><?= $model->iDCURSO->DESCRIPCION; ?></dd>

			
				<dt><?= Yii::t('backend', 'Fecha de inicio') ?></dt>
				 <dd><?=($model->iDCURSO->FECHA_INICIO  === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->iDCURSO->FECHA_INICIO )) ;?></dd>
                        
                   

				<dt><?= Yii::t('backend', 'Fecha de termino') ?></dt>
					 <dd><?=($model->iDCURSO->FECHA_TERMINO  === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->iDCURSO->FECHA_TERMINO )) ;?></dd>

				<dt>&nbsp;</dt>
				<dd>&nbsp;</dd>

				<dt><?= Yii::t('backend', 'Instructor') ?></dt>
				<dd></dd>

				<?php if (isset($model->iDCURSO->iDINSTRUCTOR)) :?>

					<dt><?= Yii::t('backend', 'Nombre') ?></dt>
					<dd><?= $model->iDCURSO->iDINSTRUCTOR->NOMBRE . ' ' . $model->iDCURSO->iDINSTRUCTOR->APP . ' ' . $model->iDCURSO->iDINSTRUCTOR->APM . ' '; ?></dd>

					<dt><?= Yii::t('backend', 'No. Registro ') ?></dt>
					<dd><?= $model->iDCURSO->iDINSTRUCTOR->NUM_REGISTRO_AGENTE_EXTERNO; ?></dd>
					
					<dt><?= Yii::t('backend', 'Telefono') ?></dt>
					<dd><?= $model->iDCURSO->iDINSTRUCTOR->TELEFONO; ?></dd>
					
					
					<dt><?= Yii::t('backend', 'Correo') ?></dt>
					<dd><?= $model->iDCURSO->iDINSTRUCTOR->CORREO_ELECTRONICO; ?></dd>
					
					
				<?php endif;?>

					</dl>
		</div>

		<div class="box-footer">
						
						<?= Html::a('<i class="fa fa-cogs"></i>	Administrar ', ['constancias/course-by-instructor', 'id' => $model->ID_CURSO], ['class' => 'btn btn-primary'])?>
  
</div>
	</div>

</div>
<!-- /.box-body -->

</div>
