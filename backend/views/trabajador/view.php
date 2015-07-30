<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */

$this->title = $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Trabajadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajador-view">


    <div class=" col-xs-12 col-sm-12 col-md-9">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						
						<?= Yii::t('backend', 'Detalles') ?> <small>Trabajador</small> </h3>
						
					</div>
					<div class="panel-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_TRABAJADOR',
            'ID_EMPRESA',
            'ROL',
            'NOMBRE',
            'APP',
            'APM',
            'CURP',
            'RFC',
            'NSS',
            'DOMICILIO',
            'CORREO_ELECTRONICO',
            'TELEFONO',
            'PUESTO',
            'OCUPACION_ESPECIFICA',
            'FECHA_AGREGO',
            'ACTIVO',
        ],
    ]) ?>
</div>
</div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_TRABAJADOR], ['class' => 'btn btn-primary']) ?>
       &ensp;
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_TRABAJADOR], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>


</div>
