<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */

$this->title = 'Crear puesto';
$this->params['breadcrumbs'][] = ['label' => 'Puesto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puesto-create">

    <?= $this->render('_form_create', [
        'model' => $model,
    ]) ?>

</div>

