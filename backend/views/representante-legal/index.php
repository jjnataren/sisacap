<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepresentanteLegalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-suitcase fa-stack-1x"></i>
							   </span>';

$this->title = ' Crear representantes legales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representante-legal-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    
        <?= Html::a('<i class="fa fa-suitcase"></i> Crear representante legal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_REPRESENTANTE_LEGAL',
            'NOMBRE',
            'APP',
            'APM',
         
            // 'CURP',
            // 'RFC',
            // 'DOMICILIO',
            // 'TELEFONO',
            // 'CORREO_ELECTRONICO',
            // 'ACTIVO',
            // 'NSS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
