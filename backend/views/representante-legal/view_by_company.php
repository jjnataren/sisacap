<?php
use yii\widgets\DetailView;

$this->title = 'Ver mi representante legal ';
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-suitcase -lg  fa-stack-1x"></i>
							   </span>';

$this->params['breadcrumbs'][] = $this->title;

?>
  
<div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						<?= Yii::t('backend', 'Detalles') ?> <small>de mi representante legal</small> </h3>
					</div>
					<div class="panel-body">
<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
		//'ID_REPRESENTANTE_LEGAL',
        'NOMBRE',
		'APP',
		'APM',
		//'FEC_NAC',
		'CURP',
		//'RFC',
		//'DOMICILIO',
		'TELEFONO',
		'CORREO_ELECTRONICO',
		//'ACTIVO',
		//'NSS',
		],
    ]) ?>
    
</div>

</div>
</div>

