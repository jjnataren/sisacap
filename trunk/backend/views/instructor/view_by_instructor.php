<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */

$this->title ='Ver instructor '. $model-> NOMBRE;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-graduation-cap -lg  fa-stack-1x"></i>
							   </span>';

$this->params['breadcrumbs'][] = ['label' => 'Instructores', 'url' => ['indexbycompany']];
$this->params['breadcrumbs'][] = $this->title;
?>

  <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						<?= Yii::t('backend', 'Detalles') ?> <small>Instructor</small> </h3>
					</div>
					
        
	<div class="row">
   <div class=" col-xs-12 col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                <h3 class="panel-title"><?= Yii::t('backend', 'DATOS') ?></h3>
                   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID_INSTRUCTOR',
            
            'NOMBRE',
            'APP',
            'APM',
            'NUM_REGISTRO_AGENTE_EXTERNO',
			'NOMBRE_AGENTE_EXTERNO',
         
        ],
    ]) ?>
    <h3 class="panel-title"><?= Yii::t('backend', 'CONTACTO') ?></h3>
<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
		'DOMICILIO',
		'TELEFONO',
		'CORREO_ELECTRONICO',
		
],

    ]) ?>
</div>
</div>	

</div>
</div>
<p><div class="panel-footer">
        <?= Html::a('Actualizar', ['updatebycompany', 'id' => $model->ID_INSTRUCTOR], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['deletebycompany', 'id' => $model->ID_INSTRUCTOR], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres borrar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
        </div>
    </p>
</div>
</div>












