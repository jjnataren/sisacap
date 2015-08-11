<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Actualizar  ocupación: ' . ' ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Ocupaciones', 'url' => ['ocupaciones']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

