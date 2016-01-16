<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use yii\web\View;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model backend\models\ListaPlan */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("$('#helA').popover('hide');", View::POS_END, 'my-options1');
$this->registerJs("$('#helB').popover('hide');", View::POS_END, 'my-options2');
$this->registerJs("$('#helC').popover('hide');", View::POS_END, 'my-options3');
$this->registerJs("$('#empresaButton').click(function() {

});", View::POS_END, 'my-options5');

?>
			
    <?php $form = ActiveForm::begin(); ?>
    
    
<div class="row">    
 <div class=" col-xs-12 col-sm-12 col-md-8">
				
	<div class="panel <?= ($model->isNewRecord)? 'panel-primary':'panel-warning'?> ">
					
		<div class="panel-heading">
						
			<h3> <?php if($model->isNewRecord):?> <i class="fa fa-plus-square"></i>
					
					<?php else:?>
						<i class="fa fa-pencil"></i>
					<?php endif;?>
						
				<?= Yii::t('backend', ' Lista de constancias formato(DC-4)') ?> <small></small> </h3>	
		</div>
	<div class="panel-body">
		
			
			    
			    
	  <div class="row">
          <div class="col-xs-10 col-md-10">
               <?= $form->field($model, 'ALIAS')->textInput() ?>
          </div>
          <div class="col-xs-2 col-md-2">
          <br />
                <button id="helA" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', '
                  Aquí podrás seleccionar un sobrenombre (Alias).
						 ') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
	</div>
	</div>
     
     
        <div class="row">
     <div class="col-xs-10 col-md-10">
               <?= $form->field($model, 'CONSTANCIAS_HOMBRES')->textInput() ?>
         </div>
          <div class="col-xs-2 col-md-2">
          <br />
                <button id="helB" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="
Aquí podrás expedir las constancias para los trabajadores de sexo (Masculino).
                 "><i class="fa fa-question-circle"></i>
	</button>
	</div>
	</div>
	
     
     
        <div class="row">
     <div class="col-xs-10 col-md-10">
               <?= $form->field($model, 'CONSTANCIAS_MUJERES')->textInput() ?>
         </div>
          <div class="col-xs-2 col-md-2">
          <br />
                <button id="helC" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="
Aquí podrás expedir las constancias para los trabajadores de sexo (Femenino).
                 "><i class="fa fa-question-circle"></i>
	</button>
	</div>
	</div>
       
   
		 <div class="row">
	     <div class=" col-xs-12 col-sm-12 col-md-8">
						
				
				<?= $form->field($model, 'LUGAR_INFORME')->textInput() ?>						
												
				<?= $form->field($model, 'DESCRIPCION')->textarea(['rows' => 5]) ?>
				
				<?= $form->field($model, 'FECHA_ELABORACION')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
						
			
				</div>
				
			</div>
			
			  
		 <div class="row">
	     <div class=" col-xs-12 col-sm-12 col-md-8">
						
				
				<?= $form->field($model, 'EXPEDIENTE')->textInput() ?>						
												
				<?= $form->field($model, 'FECHA_P_DOF')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
				
				<?= $form->field($model, 'FECHA_SOLICITUD')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
						
			
				</div>
				
			</div>
		
		
			
			    <div class="form-group">
			    
			       <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    
			    </div>
			
			    <?php ActiveForm::end(); ?>
			
			</div>
	</div>
</div>			

</div>