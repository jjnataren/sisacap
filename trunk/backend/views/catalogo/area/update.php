<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Actualizar  area tematica: ' . ' ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Areas tematicas', 'url' => ['area']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

