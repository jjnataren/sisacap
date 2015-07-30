<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\ComisionMixtaCap */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');

?>



<div class="comision-mixta-cap-form">



    <?php $form = ActiveForm::begin(); ?>
    
    <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3><i class="glyphicon glyphicon-plus"></i>
						
						<?= Yii::t('backend', 'Agregar datos') ?> <small>comision mixta</small> </h3>
						
					</div>
					<div class="panel-body">
		
    
   <div class="row">
		<div class="col-xs-12 col-md-2">
    <?= $form->field($model, 'ID_EMPRESA')->textInput() ?>
		</div>
	</div>
    <?= $form->field($model, 'COMISION_MIXTA_PADRE')->textInput() ?>

    <?= $form->field($model, 'NUMERO_INTEGRANTES')->textInput() ?>
    
    <div class="row">
		<div class="col-xs-12 col-md-2">
    		<?= $form->field($model, 'FECHA_CONSTITUCION')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY',]]) ?>
    	</div>
    </div> 

    <?= $form->field($model, 'FECHA_ELABORACION')->textInput() ?>

    <?= $form->field($model, 'ACTIVO')->textInput() ?>

    <?= $form->field($model, 'ALIAS')->textInput() ?>
    </div>
    
        						   
  	<div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Presiona el boton [Crear] para guardar sus datos') ?>"><i class="fa fa-question-circle"></i>
						</button>
			 <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Crear', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    
    
    </div>
    </div>
    </div>


