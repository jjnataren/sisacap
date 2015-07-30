<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planes y programas ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear plan', ['createbycomision'], ['class' => 'btn btn-success']) ?>
 
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PLAN',
            'ID_EMPRESA',
    		'ALIAS',
            'TOTAL_HOMBRES',
            'TOTAL_MUJERES',
            //'OBJETIVO1',
            // 'OBJETIVO2',
            // 'OBJETIVO3',
            // 'OBJETIVO4',
            // 'OBJETIVO5',
           
             'VIGENCIA_INICIO',
          'VIGENCIA_FIN',
            'NUMERO_ETAPAS',
            'NUMERO_CONSTANCIAS_EXPEDIDAS',

            ['class' => 'yii\grid\ActionColumn',

    		'template' => '{update} {view} {delete}', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
    			
    		'buttons' => [ // Aqui se indica  que icono tendran los botones y/o texto si asi se desea
    		
    		'update' => function ($url, $model, $id) { //Boton actualizar
    		return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => Yii::t('app', 'Update')]);
    		},
    		
    		'view' => function ($url, $model, $id) {//Boton Ver
    		return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => Yii::t('app', 'Update')]);
    		},
    		
    		'delete' => function ($url, $model, $id) {//Boton borrar
    		return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'Update'), 'data' => ['confirm' => '¿Realmente quiere borrar este plan?','method' => 'post',]]);
    		},
    		
    		],
    		
    		
    		/*En esta seccion se definen las acciones que tendran los botones*/
    		'urlCreator' => function ($action, $model, $key, $index) {
    			if ($action === 'update') {
    				return Yii::$app->urlManager->createUrl(['/plan/updatebycompany', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
    		
    			}
    				
    			if ($action === 'view') {
    				return Yii::$app->urlManager->createUrl(['/plan/viewbycompany', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
    					
    			}
    				
    			if ($action === 'delete') {
    				return Yii::$app->urlManager->createUrl(['plan/deletebycomisiones', 'id' => $key]); // Aqui es donde se crean las urls con las acciones personalizadas
    		
    			}
    				
    				
    		}
    		],
    		],
    		






    		
       
    ]); ?>

</div>
