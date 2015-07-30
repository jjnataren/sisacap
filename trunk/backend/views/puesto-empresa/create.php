<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PuestoEmpresa */

$this->title = 'Create Puesto Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Puesto Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puesto-empresa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
