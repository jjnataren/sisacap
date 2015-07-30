<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorComision */

$this->title = 'Create Indicador Comision';
$this->params['breadcrumbs'][] = ['label' => 'Indicador Comisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicador-comision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
