<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Catalogo */

$this->title = 'Create Catalogo';
$this->params['breadcrumbs'][] = ['label' => 'Catalogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
