<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mis cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Curso', ['createbycompany'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
		 	'ID_CURSO',
            'ID_INSTRUCTOR',
    		'NOMBRE',
            'AREA_TEMATICA',
    		'DURACION_HORAS',
    		//'FECHA_INICIO',
    		//'FECHA_TERMINO',
    		'MODALIDAD_CAPACITACION', 
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
