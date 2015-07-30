<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EmpresaUsuario */

$this->title = 'Create Empresa Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Empresa Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
