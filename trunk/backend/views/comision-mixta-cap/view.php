<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ComisionMixtaCap */
$this->title = 'Ver mi comision '.$model->ID_COMISION_MIXTA;
//$this->title = $model->ID_COMISION_MIXTA;
$this->params['breadcrumbs'][] = ['label' => 'Comision Mixta Caps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comision-mixta-cap-view">

    

  
    <div class=" col-xs-12 col-sm-12 col-md-9">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						
						<?= Yii::t('backend', 'Detalles') ?> <small>Comision mixta</small> </h3>
						
					</div>
					<div class="panel-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_COMISION_MIXTA',
            'ID_EMPRESA',
            'COMISION_MIXTA_PADRE',
            'NUMERO_INTEGRANTES',
            'FECHA_CONSTITUCION',
            'FECHA_ELABORACION',
			'FECHA_AGREGO',
            'ACTIVO',
        ],
    ]) ?>
    </div>
    </div>
      <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_COMISION_MIXTA], ['class' => 'btn btn-primary']) ?>
        &nbsp;
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_COMISION_MIXTA], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </div>
    

</div>

