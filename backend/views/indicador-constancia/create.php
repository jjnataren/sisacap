<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorConstancia */

$this->title = 'Create Indicador Constancia';
$this->params['breadcrumbs'][] = ['label' => 'Indicador Constancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicador-constancia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
