<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model backend\models\ComisionMixtaCap */

$this->title = $model->ALIAS;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="glyphicon glyphicon-copyright-mark -lg  fa-stack-1x"></i>
							   </span>';
$this->params['breadcrumbs'][] = ['label' => 'Comision Mixta Caps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comision-mixta-cap-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'ID_COMISION_MIXTA',
            //'ID_EMPRESA',
            //'COMISION_MIXTA_PADRE',
			'ALIAS',	
            'NUMERO_INTEGRANTES',
            'FECHA_CONSTITUCION',
			'FECHA_AGREGO',
            'FECHA_ELABORACION',
			'DESCRIPCION',
			'LUGAR_INFORME',
            //'ACTIVO',
        ],
    ]) ?>
<p>
        <?= Html::a('<i class="fa fa-pencil">Actualizar </i>', ['updatebyuser', 'id' => $model->ID_COMISION_MIXTA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o"></i> Eliminar', ['deletebyuser', 'id' => $model->ID_COMISION_MIXTA], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres borrar esta comisión?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>