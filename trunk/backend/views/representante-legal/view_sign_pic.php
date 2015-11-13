<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use kartik\file\FileInput;
use kartik\password\PasswordInput;
use yii\helpers\Url;



$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');

?>

<div class="row">

  <div class=" col-xs-12 col-sm-12 col-md-12">
  
    <?php $form = ActiveForm::begin([
    		'options'=>['enctype'=>'multipart/form-data']
    		
    ]); ?>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-image-o"></i>
						
							<?= Yii::t('backend', 'Mi firma ') ?> <small>  firma encriptada</small> </h3>	
						</div>
<div class="panel-body">
		<div class=" col-xs-12 col-sm-12 col-md-6">
    
			<div class="row">
					<div class="col-xs-12 col-md-6">
								  
							       <img  src="<?='data:image/' . 'gif' . ';base64,'.$SIGN_IMAGE ?>">				  
			   		 </div>
			   		 
			   		<div class="col-xs-12 col-md-6"> 
			   		   <dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'ID') ?></dt>
                        <dd><?= $model->ID_EMPRESA ?></dd>

                        <dt><?= Yii::t('backend', 'Alias') ?></dt>
                        <dd><?= $model->ALIAS ?></dd>
                        
                        
                         <dt><?= Yii::t('backend', 'Registro patronal (I.M.S.S)') ?></dt>
                        <dd><?= $model->ALIAS ?></dd>

                        <dt><?= Yii::t('backend', 'Clave unica (RFC)') ?></dt>
                        <dd><?= $model->RFC ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Numero interior') ?></dt>
                        <dd><?= $model->NUMERO_INTERIOR ?></dd>

                        <dt><?= Yii::t('backend', 'Numero exterior') ?></dt>
                        <dd><?= $model->NUMERO_EXTERIOR ?></dd>

                        <dt><?= Yii::t('backend', 'Clave unica') ?></dt>
                        <dd><?= $model->COLONIA ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Calle') ?></dt>
                        <dd><?= $model->CALLE ?></dd>

                        <dt><?= Yii::t('backend', 'Codigo postal') ?></dt>
                        <dd><?= $model->CODIGO_POSTAL ?></dd>

                       
                         <dt><?= Yii::t('backend','Entidad federativa') ?></dt>
                        <dd><?= $model->ENTIDAD_FEDERATIVA ?></dd>

                        <dt><?= Yii::t('backend', 'localidad') ?></dt>
                        <dd><?= $model->LOCALIDAD ?></dd>

                        <dt><?= Yii::t('backend', 'Telefono') ?></dt>
                        <dd><?= $model->TELEFONO ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Giro') ?></dt>
                        <dd><?= $model->GIRO_PRINCIPAL ?></dd>
                        
                          <dt><?= Yii::t('backend', 'Numero trabajadores') ?></dt>
                        <dd><?= $model->NUMERO_TRABAJADORES ?></dd>
                    </dl>
                    
                    </div>
			   		 
			</div>
					
					<div class="row">
					<div class="col-xs-12 col-md-7">
			   			<?=  $form->field($model, 'SIGN_PASSWD')->widget(
							    PasswordInput::classname()
							); ?>
						  
			   		 </div>
					</div>

		</div>



</div>

    <div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Aqui puedes actualizar los datos del representante legale de tu empresa, es importante que todos los campos esten llenos con sus datos correctos. Presiona el boton [Guardar] y acontinuación se guardaran los datos del representante legal') ?>"><i class="fa fa-question-circle"></i>
						</button>
						&nbsp;
						
	    <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Des-encriptar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
       </div>
    
   
</div>
  <?php ActiveForm::end(); ?>
</div>
</div>
