<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Actualizar  entidad federativa: ' . ' ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Entidades federativas', 'url' => ['entidades-federativas']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="catalogo-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
