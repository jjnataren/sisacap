<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Crear un curso';
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['curso']];
$this->params['breadcrumbs'][] = $this->title;
?>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

