<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorCurso */

$this->title = 'Create Indicador Curso';
$this->params['breadcrumbs'][] = ['label' => 'Indicador Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicador-curso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
