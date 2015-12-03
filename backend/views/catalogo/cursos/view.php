<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title =  'Ocupación: ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Ocupaciones', 'url' => ['ocupaciones']];
$this->params['breadcrumbs'][] = $this->title;
?>

   <!--   <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Actualizar', ['ocupaciones-actualizar'	, 'id' => $model->ID_ELEMENTO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar',   ['ocupaciones-borrar', 'id' => $model->ID_ELEMENTO], [
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
            ['attribute'=> 'ELEMENTO_PADRE',
            'label'=>'id padre',		
            'type'=>'raw',
            'value'=> (isset($model->eLEMENTOPADRE) )? $model->eLEMENTOPADRE->NOMBRE : '<i>no establecido</i>'		
    		],
            'NOMBRE',
            'DESCRIPCION',
        //    'ORDEN',
            //'CATEGORIA',
        		[
        		'attribute'=>'CATEGORIA',
        		'type'=>'raw',
        		'value'=>'Ocupaciones'
        				],
            [
        		'attribute'=>'ACTIVO',
        		'type'=>'raw',
        		'value'=> ($model)? 'SI'  : 'NO'
        				],
        ],
    ]) ?>

