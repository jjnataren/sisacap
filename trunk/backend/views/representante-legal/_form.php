<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\RepresentanteLegal */
/* @var $form yii\widgets\ActiveForm */


$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');

$itemsAct = [1=>'Activo',0=>'No activo'];
?>

<div class="representante-legal-form">

  <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3><i class="glyphicon glyphicon-plus"></i>
						
						<?= Yii::t('backend', 'Nuevo representante legal') ?> <small></small> </h3>	
					</div>
					<div class="panel-body">
		

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'APP')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'APM')->textInput(['maxlength' => 100]) ?>

    <!-- <?= $form->field($model, 'FEC_NAC')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY',]]) ?> -->

    <?= $form->field($model, 'CURP')->textInput(['maxlength' => 18]) ?>

    <!-- <?= $form->field($model, 'RFC')->textInput(['maxlength' => 13]) ?>  -->

    <!--  <?= $form->field($model, 'DOMICILIO')->textInput(['maxlength' => 300]) ?>  -->

    <?= $form->field($model, 'TELEFONO')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'CORREO_ELECTRONICO')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'ACTIVO')->dropDownList($itemsAct,['prompt'=>'-- Seleccione  --','id' => 'tex-sex']) ?>

   <!--  <?= $form->field($model, 'NSS')->textInput(['maxlength' => 20]) ?>  -->

    <div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Una ves llenado todos los campos solo seleccione [crear] para salvar sus datos.') ?>"><i class="fa fa-question-circle"></i>
						</button>
						
	    <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Crear', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
       
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
</div>
</div>
