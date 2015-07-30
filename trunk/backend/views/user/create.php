<?php

use common\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserForm */
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-users fa-stack-1x"></i>
							   </span>';

$this->title = Yii::t('backend', 'Crear {modelClass}', [
    'modelClass' => 'usuario',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Usuario'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
