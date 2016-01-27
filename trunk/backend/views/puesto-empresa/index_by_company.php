<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ver mis puestos de trabajo';
$this->params['breadcrumbs'][] = $this->title;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-user-secret fa-stack-1x"></i>
							   </span>';
?>

  
<div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						<?= Yii::t('backend', 'Detalles') ?> <small>de mis puestos de trabajo.</small> </h3>
					</div>
					<div class="panel-body">
<div class="puesto-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> Crear puesto', ['createbycompany'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
		 	//'ID_PUESTO',
            //'ID_EMPRESA',
    		'CLAVE_PUESTO',
            'NOMBRE_PUESTO',
    		'DESCRIPCION_PUESTO', 
            ['class' => 'yii\grid\ActionColumn',
'template' => '{update} {view} {delete}', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
'buttons' => [
'update' => function ($url, $model, $id) { //Boton actualizar
return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => Yii::t('app', 'Actualizar')]);
},
	
'view' => function ($url, $model, $id) {//Boton Ver
return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => Yii::t('app', 'Ver')]);
},
	
'delete' => function ($url, $model, $id) {//Boton borrar
return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'Eliminar'), 'data' => ['confirm' => '¿Realmente quiere borrar este puesto?','method' => 'post',]]);
},
],
'urlCreator' => function ($action, $model, $key, $index) {
	if ($action === 'update') {
		return Yii::$app->urlManager->createUrl(['/puesto-empresa/updatebyuser', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
			
	}
		
	if ($action === 'view') {
		return Yii::$app->urlManager->createUrl(['/puesto-empresa/viewbycompany', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas

	}
		
	if ($action === 'delete') {
		return Yii::$app->urlManager->createUrl(['/puesto-empresa/deletebyuser', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
			
	}
		
		
}
],
    ]]); ?>

</div>
</div>
</div>
</div>

