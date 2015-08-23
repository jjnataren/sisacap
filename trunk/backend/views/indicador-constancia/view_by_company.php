<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorPlan */

$this->params ['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-bell fa-stack-1x"></i>
							   </span>';

$this->title = 'Notificación Constancia: ID ' . $model->ID_CONSTANCIA;
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Notificaciones constancias',
		'url' => [ 
				'index' 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;

?>







<div class="col-md-6 col-sm-12 col-xs-6">
	<div class="box box-primary">
		<div class="box-header">
			<i class="fa fa-bell"></i>
			<h3 class="box-title"><?= Yii::t('backend', ' Detalles de la notificación.') ?></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<dl class="dl-horizontal">


				<dt><?= Yii::t('backend', 'Titulo') ?></dt>
				<dd><?= $model->TITULO ?></dd>
				<dt><?= Yii::t('backend', 'Clave') ?></dt>
				<dd><?= $model->CLAVE ?></dd>




			</dl>

			<p>
			
			
			<h4>Descripción:</h4>
                                 <?=$model->DATA?></p>



		</div>

		<div class="box-footer">
					 
<?=Html::a ( '<i class="fa  fa-trash-o"></i>	Borrar notificación', [ 'delete-by-company','id' => $model->ID_EVENTO ], [ 'class' => 'btn btn-danger','data' => [ 'confirm' => '¿Realmente quieres borrar este indicador?','method' => 'post' ] ] )?>
  
  
				</div>





	</div>


</div>
<!-- /.box-body -->


<div class="col-md-6 col-sm-12 col-xs-6">
	<div class="box box-primary">
		<div class="box-header">
			<i class="fa fa-file-pdf-o"></i>
			<h3 class="box-title"><?= Yii::t('backend', ' Detalles de la constancia ') ?> <small>Constancia
					de adiestramiento</small>
			</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<dl class="dl-horizontal">

				<dt><?= Yii::t('backend', 'ID') ?> </dt>
				<dd><?= $model->ID_CONSTANCIA ?> </dd>

				<dt><?= Yii::t('backend','Tipo de constancia') ?> </dt>
				<dd><?= $model->iDCONSTANCIA->TIPO_CONSTANCIA?> </dd>



				<dt><?= Yii::t('backend','Fecha de creación') ?> </dt>
				<dd><?=($model->FECHA_CREACION === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->FECHA_CREACION)) ;?></dd>



				<dt>&nbsp;</dt>
				<dd></dd>



				<dt><?= Yii::t('backend', 'TRABAJADOR') ?> </dt>
				<dd></dd>



				<dt><?= Yii::t('backend', 'Nombre') ?> </dt>
				<dd><?= $model->iDCONSTANCIA->iDTRABAJADOR->NOMBRE. ' ' . $model->iDCONSTANCIA->iDTRABAJADOR->APP. ' ' .  $model->iDCONSTANCIA->iDTRABAJADOR->APM?> </dd>

				<dt><?= Yii::t('backend', 'RFC'); ?> </dt>
				<dd><?= $model->iDCONSTANCIA->iDTRABAJADOR->RFC; ?> </dd>




				<dt>&nbsp;</dt>
				<dd></dd>



				<dt><?= Yii::t('backend', 'CURSO') ?> </dt>
				<dd></dd>


				<dt><?= Yii::t('backend','Nombre del curso') ?></dt>
				<dd><?= $model->iDCONSTANCIA->iDCURSO->NOMBRE ?>  </dd>


				<dt><?= Yii::t('backend','Termino de curso') ?></dt>
				<dd><?=($model->iDCONSTANCIA->iDCURSO->FECHA_TERMINO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->iDCONSTANCIA->iDCURSO->FECHA_TERMINO)) ;?></dd>


				<dt><?= Yii::t('backend','Plan	') ?></dt>
				<dd><?= $model->iDCONSTANCIA->iDCURSO->iDPLAN->ALIAS?>  </dd>

			</dl>

		</div>

		<div class="box-footer">
<?= Html::a('<i class="fa fa-cogs"></i>	Administrar ', ['constancias/dashboard', 'id' => $model->ID_CONSTANCIA], ['class' => 'btn btn-primary'])?>

  
				</div>



	</div>


</div>
<!-- /.box-body -->




















