<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Actualizar el curso: ' . ' ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['curso']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

