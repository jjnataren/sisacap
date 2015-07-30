<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EmpresaUsuario */

$this->title = $model->ID_EMPRESA;
$this->params['breadcrumbs'][] = ['label' => 'Empresa Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID_EMPRESA' => $model->ID_EMPRESA, 'ID_USUARIO' => $model->ID_USUARIO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID_EMPRESA' => $model->ID_EMPRESA, 'ID_USUARIO' => $model->ID_USUARIO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_EMPRESA',
            'ID_USUARIO',
            'ACTIVO',
            'FECHA_AGREGO',
        ],
    ]) ?>

</div>
