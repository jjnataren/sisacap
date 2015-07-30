<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Update Catalogo: ' . ' ' . $model->ID_ELEMENTO;
$this->params['breadcrumbs'][] = ['label' => 'Catalogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ELEMENTO, 'url' => ['view', 'id' => $model->ID_ELEMENTO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="catalogo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
