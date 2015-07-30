<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Crear entidad federativa';
$this->params['breadcrumbs'][] = ['label' => 'Entidades federativas', 'url' => ['entidades-federativas']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

