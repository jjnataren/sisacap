<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\Plan */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');


?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(); ?>
    
      <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3><i class="fa fa-calendar"></i>
						
						<?= Yii::t('backend', 'Agregar datos') ?> <small>Plan capacitacion</small> </h3>	
					</div>
					<div class="panel-body">
		

    <?= $form->field($model, 'ID_EMPRESA')->textInput() ?>

    <?= $form->field($model, 'TOTAL_HOMBRES')->textInput() ?>

    <?= $form->field($model, 'TOTAL_MUJERES')->textInput() ?>
    
    
    </div>
    </div>
    </div>
    
    
  <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-primary">
					<div class="panel-body">
						
						
						
<div class=" col-xs-12 col-sm-12 col-md-6">
 <div class="panel panel-primary">
  <div class="panel-heading">
	<h4><i class=""></i>
						</h4>			
  </div>
  <div class="panel-body">	
    <?= $form->field($model, 'OBJETIVO1')->textInput() ?>

    <?= $form->field($model, 'OBJETIVO2')->textInput() ?>

    <?= $form->field($model, 'OBJETIVO3')->textInput() ?>

    <?= $form->field($model, 'OBJETIVO4')->textInput() ?>

    <?= $form->field($model, 'OBJETIVO5')->textInput() ?>
  </div>
 </div>
</div>
    
    
    
    
<div class=" col-xs-12 col-sm-12 col-md-6">
 <div class="panel panel-primary">
  <div class="panel-heading">
	<h4><i class=""></i>
	<?= Yii::t('backend', '') ?> Modalidad de la capacitación  selecciona la modalidad correspondiente </h4>
  </div>
   <div class="panel-body">	

  
  
   </div>
  </div>
 </div>
 
     
    <?= $form->field($model, 'NUMERO_ETAPAS')->textInput() ?>

    <?= $form->field($model, 'VIGENCIA_INICIO')->textInput() ?>

    <?= $form->field($model, 'VIGENCIA_FIN')->textInput() ?>

    <?= $form->field($model, 'NUMERO_CONSTANCIAS_EXPEDIDAS')->textInput() ?>

 
 
  	<div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Presiona el boton [Guardar] y acontinuaci�n se guardara el plan de capacitacion') ?>"><i class="fa fa-question-circle"></i>
						</button>
             <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Crear', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
</div>
</div>
