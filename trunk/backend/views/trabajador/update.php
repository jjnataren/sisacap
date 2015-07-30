<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */

$this->title = 'Actualizar trabajador: ' . ' ' . $model->NOMBRE.' '. $model->ID_TRABAJADOR;
$this->params['breadcrumbs'][] = ['label' => 'Trabajadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_TRABAJADOR, 'url' => ['view', 'id' => $model->ID_TRABAJADOR]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trabajador-update">

   

    <?= $this->render('_company_form', [
        'model' => $model,
    ]) ?>

</div>
