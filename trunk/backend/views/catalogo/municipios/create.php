<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Crear municipio';
$this->params['breadcrumbs'][] = ['label' => 'Municipios por entidad federativa', 'url' => ['municipios']];
$this->params['breadcrumbs'][] = $this->title;
?>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

