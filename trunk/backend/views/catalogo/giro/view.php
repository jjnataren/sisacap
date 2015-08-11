<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title =  'Giro: ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Giros', 'url' => ['Giro	']];
$this->params['breadcrumbs'][] = $this->title;
?>

   <!--   <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Actualizar', ['giro-actualizar', 'id' => $model->ID_ELEMENTO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['giro-borrar', 'id' => $model->ID_ELEMENTO], [
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
          
            'NOMBRE',
            'DESCRIPCION',
        //    'ORDEN',
            //'CATEGORIA',
        		[
        		'attribute'=>'CATEGORIA',
        		'type'=>'raw',
        		'value'=>'Giros'
        				],
            [
        		'attribute'=>'ACTIVO',
        		'type'=>'raw',
        		'value'=> ($model)? 'SI'  : 'NO'
        				],
        ],
    ]) ?>

