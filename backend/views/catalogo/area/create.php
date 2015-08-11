<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Crear ocupacion';
$this->params['breadcrumbs'][] = ['label' => 'Ocupaciones', 'url' => ['ocupaciones']];
$this->params['breadcrumbs'][] = $this->title;
?>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

