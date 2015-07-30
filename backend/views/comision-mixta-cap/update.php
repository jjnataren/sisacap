<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ComisionMixtaCap */

$this->title = 'Actualizar comision mixta: ' . ' ' . $model->ID_COMISION_MIXTA;
$this->params['breadcrumbs'][] = ['label' => 'Comision Mixta Caps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_COMISION_MIXTA, 'url' => ['view', 'id' => $model->ID_COMISION_MIXTA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comision-mixta-cap-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
