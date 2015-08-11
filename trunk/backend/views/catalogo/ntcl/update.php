<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Actualizar norma técnica de competencia laboral : ' . ' ' . $model->NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'NTCL', 'url' => ['ntcl']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

