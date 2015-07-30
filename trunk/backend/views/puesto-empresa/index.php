<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PuestoEmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Puesto Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puesto-empresa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Puesto Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PUESTO',
            'CLAVE_PUESTO',
            'ID_EMPRESA',
            'NOMBRE_PUESTO',
            'DESCRIPCION_PUESTO',
            // 'ACTIVO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
