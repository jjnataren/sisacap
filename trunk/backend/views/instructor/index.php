<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InstructorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instructores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Instructor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_INSTRUCTOR',
            'ID_EMPRESA',
            'NOMBRE_AGENTE_EXTERNO',
            'NOMBRE',
            'APP',
            // 'APM',
            // 'DOMICILIO',
            // 'TELEFONO',
            // 'CORREO_ELECTRONICO',
            // 'LOGOTIPO',
            // 'NUM_REGISTRO_AGENTE_EXTERNO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
