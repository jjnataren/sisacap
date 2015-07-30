<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TrabajadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trabajadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajador-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear trabajador', ['createworkerbycompany'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_TRABAJADOR',
            'ID_EMPRESA',
            'ROL',
            'NOMBRE',
            'APP',
            // 'APM',
            // 'CURP',
            // 'RFC',
            // 'NSS',
            // 'DOMICILIO',
            // 'CORREO_ELECTRONICO',
            // 'TELEFONO',
            // 'PUESTO',
            // 'OCUPACION_ESPECIFICA',
            // 'FECHA_AGREGO',
            // 'ACTIVO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
