<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Curso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_CURSO',
            'ID_INSTRUCTOR',
            'NOMBRE',
            'DURACION_HORAS',
            // 'FECHA_INICIO',
            // 'FECHA_TERMINO',
            // 'AREA_TEMATICA',
            // 'MODALIDAD_CAPACITACION',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
