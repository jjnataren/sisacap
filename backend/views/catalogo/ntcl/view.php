<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title =  'NTCL: ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'NTCL', 'url' => ['ntcl']];
$this->params['breadcrumbs'][] = $this->title;
?>

   

    <p>
        <?= Html::a('Actualizar', ['ntcl-actualizar', 'id' => $model->ID_ELEMENTO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['ntcl-borrar', 'id' => $model->ID_ELEMENTO], [
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
            'label'=>'Sector',		
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
        		'value'=>'NTCL'
        				],
            [
        		'attribute'=>'ACTIVO',
        		'type'=>'raw',
        		'value'=> ($model)? 'SI'  : 'NO'
        				],
        ],
    ]) ?>

