<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use kartik\file\FileInput;
use kartik\password\PasswordInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\RepresentanteLegal */
/* @var $form yii\widgets\ActiveForm */



/**
 * Title & scripts
 */



$this->title = 'Firma digitalizada, editar';
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-pencil fa-lg  fa-stack-1x"></i>
							   </span>';


$this->params['breadcrumbs'][] = 'Reperesentante legal';
$this->params['breadcrumbs'][] = $this->title;


$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');

?>

<div class="row">

  <div class=" col-xs-12 col-sm-12 col-md-12">
  
    <?php $form = ActiveForm::begin([
    		'options'=>['enctype'=>'multipart/form-data']
    		
    ]); ?>
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3><i class="fa fa-pencil"></i>
						
							<?= Yii::t('backend', 'Firma digitalizada  ') ?> <small> del representante legal.</small> </h3>	
						</div>
<div class="panel-body">


		<div class=" col-xs-12 col-sm-12 col-md-6">
    
    		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12">
			
				<div class="callout callout-info">
					<h4><i class="fa fa-info-circle"></i> Información adicional</h4>
					<p> 
					
						<ol>
							<li>Seleccione la imagen de la firma. Archivos validos <strong> jpeg, png, gif </strong> </li>
							<li>Proporcione una contraseña para encriptarr la imagen</li>
							<li>Clic en guardar para proceder</li>
						</ol>
						   
						   
					</p>
					
				
				</div>
				
			</div>
			</div>
    
    
			<div class="row">
					<div class="col-xs-12 col-md-6">
			   			
						  
						
                   
                <?= $form->field($model, 'SIGN_PICTURE')->widget(FileInput::classname(), [
 							   'options' => ['accept' => 'image/*'],
                				'language' => 'es',
                				'pluginOptions' => [
                								'showUpload' => false,
                								'browseLabel' => 'Seleccionar',
                								'removeLabel' => 'Eliminar',
								                ],
							]
                				
                		);
						  ?>
                  		
                  		
       
                   
             
						  
						  
			   		 </div>
			   		 
			   		 <div class="col-xs-12 col-md-6">
			   			
						  
						
                          
             
						  
						  
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
						
	    <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar y encriptar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
       </div>
    
   
</div>
  <?php ActiveForm::end(); ?>
</div>
</div>
