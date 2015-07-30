<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ComisionMixtaCap */

$this->title = 'Crear Comision Mixta Caps';
$this->params['breadcrumbs'][] = ['label' => 'Comision Mixta Caps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comision-mixta-cap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
