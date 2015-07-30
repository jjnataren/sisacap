<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EmpresaUsuario */

$this->title = 'Update Empresa Usuario: ' . ' ' . $model->ID_EMPRESA;
$this->params['breadcrumbs'][] = ['label' => 'Empresa Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_EMPRESA, 'url' => ['view', 'ID_EMPRESA' => $model->ID_EMPRESA, 'ID_USUARIO' => $model->ID_USUARIO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empresa-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
