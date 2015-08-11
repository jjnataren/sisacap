<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Actualizar  giro: ' . ' ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Giros', 'url' => ['giro']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

