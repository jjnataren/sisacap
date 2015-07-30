<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RepresentanteLegal */
$this->title = 'Ver representante legal ';
$this->params['breadcrumbs'][] = ['label' => 'Representante Legal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representante-legal-view">

    

    
    <div class="representante-legal-form">

  <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						
						<?= Yii::t('backend', 'Ver ') ?> <small>Representante legal</small> </h3>	
					</div>
					<div class="panel-body">
		
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_REPRESENTANTE_LEGAL',
            'NOMBRE',
            'APP',
            'APM',
            //'FEC_NAC',
            'CURP',
            //'RFC',
            //'DOMICILIO',
            'TELEFONO',
            'CORREO_ELECTRONICO',
            'ACTIVO',
           // 'NSS',
        ],
    ]) ?>

</div>
</div>

<p>
        
        <?= Html::a('Actualizar', ['update', 'id' => $model->ID_REPRESENTANTE_LEGAL], ['class' => 'btn btn-primary']) ?>
        &nbsp;
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID_REPRESENTANTE_LEGAL], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
</div>
</div>
