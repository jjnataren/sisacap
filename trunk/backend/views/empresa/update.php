<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = 'Actualizar empresa: ' . ' ' . $model->NOMBRE_RAZON_SOCIAL;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_EMPRESA, 'url' => ['view', 'id' => $model->ID_EMPRESA]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="empresa-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
