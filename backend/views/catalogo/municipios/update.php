<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Actualizar  municipio: ' . ' ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Municpios', 'url' => ['municipios']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

