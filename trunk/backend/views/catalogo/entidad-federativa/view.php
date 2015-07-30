<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title =  'Entidad federativa: ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Entidades federativas', 'url' => ['entidades-federativas']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogo-view">

   <!--   <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Actualizar', ['entidades-federativas-actualizar', 'id' => $model->ID_ELEMENTO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['entidades-federativas-borrar', 'id' => $model->ID_ELEMENTO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Realmente quiere borrar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_ELEMENTO',
            'CLAVE',
         //  'ELEMENTO_PADRE',
            'NOMBRE',
            'DESCRIPCION',
        //    'ORDEN',
            //'CATEGORIA',
        		[
        		'attribute'=>'CATEGORIA',
        		'type'=>'raw',
        		'value'=>'Entidades federativas'
        				],
            'ACTIVO',
        ],
    ]) ?>

</div>
