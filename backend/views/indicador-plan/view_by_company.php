<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorPlan */
$this->params ['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-bell fa-stack-1x"></i>
							   </span>';

$this->title = 'Notificación Plan: Id ' . $model->iDPLAN->ID_PLAN . ' - ' . $model->iDPLAN->ALIAS;
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Notificaciones planes',
		'url' => [ 
				'index' 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;

?>


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
					 
<?=Html::a ( '<i class="fa  fa-trash-o"></i>	Borrar notificación', [ 'delete-by-company','id' => $model->ID_EVENTO ], [ 'class' => 'btn btn-danger','data' => [ 'confirm' => '¿Realmente quieres borrar este indicador?','method' => 'post' ] ] )?>
  
  
				</div>


	</div>


</div>
<!-- /.box-body -->


<div class="col-md-6 col-sm-12 col-xs-6">
	<div class="box box-info">
		<div class="box-header">
			<i class="fa fa-calendar"></i>
			<h3 class="box-title"><?= Yii::t('backend', ' Detalles del plan') ?> <small>
					de capacitación</small>
			</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<dl class="dl-horizontal">

				<dt><?= Yii::t('backend', 'Id') ?></dt>
				<dd><?= $model->iDPLAN->ID_PLAN ?></dd>

				<dt><?= Yii::t('backend', 'Alias') ?></dt>
				<dd><?= $model->iDPLAN->ALIAS ?></dd>

				<dt><?= Yii::t('backend', 'Descripción') ?></dt>
				<dd><?= $model->iDPLAN->DESCRIPCION_PLAN ?></dd>

				<dt><?= Yii::t('backend', 'N°de Etapas') ?></dt>
				<dd><?= $model->iDPLAN->NUMERO_ETAPAS ?></dd>

				<dt><?= Yii::t('backend', 'N° de mujeres') ?></dt>
				<dd><?= $model->iDPLAN->TOTAL_MUJERES ?></dd>

				<dt><?= Yii::t('backend', 'N° de hombres') ?></dt>
				<dd><?= $model->iDPLAN->TOTAL_HOMBRES ?></dd>


				<dt><?= Yii::t('backend', 'Vigencia inicio') ?></dt>
				<dd><?= $model->iDPLAN->VIGENCIA_INICIO ?></dd>

				<dt><?= Yii::t('backend', 'Vigencia termino') ?></dt>
				<dd><?= $model->iDPLAN->VIGENCIA_FIN ?></dd>


				<dt><?= Yii::t('backend', 'Lugar elaboración informe ') ?></dt>
				<dd><?= $model->iDPLAN->LUGAR_INFORME ?></dd>


				<dt><?= Yii::t('backend', 'Fecha elaboración informe') ?></dt>

				<dd><?=($model->iDPLAN->FECHA_INFO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->iDPLAN->FECHA_INFO)) ;?></dd>
			</dl>
		</div>

		<div class="box-footer">
						
						<?= Html::a('<i class="fa fa-cogs"></i>	Administrar ', ['plan/dashboard', 'id' => $model->ID_PLAN], ['class' => 'btn btn-primary'])?>
  
</div>
	</div>

</div>
<!-- /.box-body -->


