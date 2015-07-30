<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorPlan */

$this->title = 'Create Indicador Plan';
$this->params['breadcrumbs'][] = ['label' => 'Indicador Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicador-plan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
