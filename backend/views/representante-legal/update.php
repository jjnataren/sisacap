<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RepresentanteLegal */

$this->title = 'Actualizar representante legal: ' . ' ' . $model->ID_REPRESENTANTE_LEGAL;
$this->params['breadcrumbs'][] = ['label' => 'Representante Legals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_REPRESENTANTE_LEGAL, 'url' => ['view', 'id' => $model->ID_REPRESENTANTE_LEGAL]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="representante-legal-update">

  

    <?= $this->render('_form_by_company', [
        'model' => $model,
    ]) ?>

</div>
