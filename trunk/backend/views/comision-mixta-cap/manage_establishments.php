<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use common\models\User;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\RepresentanteLegal;
use backend\models\RepresentanteLegalSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = Yii::t ( 'backend', 'Comision mixta, agregar establecimientos' );
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Comisiones',
		'url' => [ 
				'indexbycompany' 
		] 
];
$this->params ['breadcrumbs'] [] = [ 
		'label' => $model->ALIAS,
		'url' => [ 
				'dashboard',
				'id' => $model->ID_COMISION_MIXTA 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;



