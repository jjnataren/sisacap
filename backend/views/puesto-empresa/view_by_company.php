<?php


use yii\helpers\Html;
use yii\widgets\DetailView;




/* @var $this yii\web\View */
/* @var $model backend\models\PuestoEmpresa*/
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-user-secret fa-stack-1x"></i>
							   </span>';
$this->title = 'Ver puesto '. $model->  NOMBRE_PUESTO;
$this->params['breadcrumbs'][] = ['label' => 'Puestos', 'url' => ['indexbycompany']];
$this->params['breadcrumbs'][] = $this->title;

?>
    <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						<?= Yii::t('backend', 'Detalles') ?> <small>Puesto</small> </h3>
					</div>
					<div class="panel-body">
					<div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Datos del puesto') ?></h3>
                </div>
                <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID_PUESTO',
            'CLAVE_PUESTO',
            'NOMBRE_PUESTO',
            'DESCRIPCION_PUESTO',


        ],

    ]) ?>

  <?= Html::a('<i class="fa fa-pencil">Actualizar </i>', ['updatebyuser', 'id' => $model->ID_PUESTO], ['class' => 'btn btn-primary']) ?>
         &nbsp;
       <?= Html::a('<i class="fa fa-trash-o"></i> Eliminar', ['deletebyuser', 'id' => $model->ID_PUESTO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres borrar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
</div>
