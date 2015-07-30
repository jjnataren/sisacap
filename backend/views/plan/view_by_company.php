<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Plan */

$this->title = $model->ID_PLAN;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


  

 <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						<?= Yii::t('backend', 'Detalles') ?> <small>Plan </small> </h3>
					</div>
					<div class="panel-body">
					<div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Datos del plan') ?></h3>
                </div>
                <div class="panel-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_PLAN',
            'ID_EMPRESA',
            'ALIAS',
            'TOTAL_HOMBRES',
            'TOTAL_MUJERES',
            'OBJETIVO1',
            'OBJETIVO2',
            'OBJETIVO3',
            'OBJETIVO4',
            'OBJETIVO5',
         
            'VIGENCIA_INICIO',
            'VIGENCIA_FIN',
            'NUMERO_ETAPAS',
            'NUMERO_CONSTANCIAS_EXPEDIDAS',
             'DOCUMENTO_APROBATORIO',
             'NOMBRE_DOC_APROBATORIO',
             'DESCRIPCION_PLAN'
        ],
    ]) ?>

</div>
