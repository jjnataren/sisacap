<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Puesto */
/* @var $form yii\widgets\ActiveForm */

//$this->registerJs("$('#help_popup_alias').popover('hide');", View::POS_END, 'my-options');
//$this->registerJs("$('#help_popup_registro_externo').popover('hide');", View::POS_END, 'my-options1');

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-user-secret fa-stack-1x"></i>
							   </span>';
?>

<div class="puesto-empresa-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
 <div class="col-md-6 col-xs-12 col-sm-12">   
    <div class="panel panel-primary">
			<div class="panel-heading">
						<h3><i class="fa fa-plus-square"></i>
						<?= Yii::t('backend', 'Nuevo puesto') ?> </h3>	
			</div>

    			<div class="panel-body">
				
				    <?= $form->field($model, 'CLAVE_PUESTO')->textInput(['maxlength' => 100]) ?>
				
				<!--     <?= $form->field($model, 'ID_EMPRESA')->textInput(['maxlength' => 100]) ?>  -->
				
				    <?= $form->field($model, 'NOMBRE_PUESTO')->textInput(['maxlength' => 100]) ?>
				
				    <?= $form->field($model, 'DESCRIPCION_PUESTO')->textArea(['maxlength' => 300]) ?>
				
				 <!--    <?= $form->field($model, 'ACTIVO')->textInput(['maxlength' => 100]) ?>  -->
				
				    
				 	
				 <div class="panel-footer">

 		 				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o"></i> Guardar' : '<i class="fa fa-floppy-o"></i> Guardar ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
   				</div>
		</div>	
	
</div>   
     
     

    <?php ActiveForm::end(); ?>
</div>
</div>
    

