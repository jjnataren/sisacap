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
  								<i class="fa fa-pencil-square-o fa-lg  fa-stack-1x"></i>
							   </span>';

$this->params['breadcrumbs'][] = 'Representante de los trabajadores';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');

?>

    <?php $form = ActiveForm::begin([
    		'options'=>['enctype'=>'multipart/form-data']
    		
    ]); ?>

<div class="row">

  <div class=" col-xs-12 col-sm-12 col-md-12">

				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3><i class="fa fa-male"></i>
						
							<?= Yii::t('backend', 'Firma digitalizada  ') ?> <strong> del Representante de los trabajadores.</strong> </h3>	
						</div>
<div class="panel-body">
    			<div class="callout callout-info">
					<h4><i class="fa fa-info-circle"></i> Información de este tema</h4>
					
						<ol>
							<li>Seleccione el archivo con la firma digitalizada, archivos validos <strong> jpeg, png, gif y jpg </strong> </li>
							<li>Proporcione una contraseña para encriptarr la imagen</li>
							<li>Clic en [Guardar y encriptar] para proceder  con la encriptación </li>
						</ol>
				</div>
		
    
			<div class="row">
					<div class="col-xs-12 col-md-4 col-sm-12">
			   			
						  
						
                   
                <?= $form->field($model, 'SIGN_PIC')->widget(FileInput::classname(), [
 							   	'options' => ['accept' => 'image/*', ],
                				'language' => 'es',
                				'pluginOptions' => [
                								'showUpload' => false,
                								'browseLabel' => 'Seleccionar',
                								'removeLabel' => 'Eliminar',
                								'allowedFileExtensions'=> ['jpeg','jpg', 'png', 'gif']
								                ],
                				
							]
                				
                		);
						  ?>
                  		
   			   		 </div>
			   		
					</div>
					
					<div class="row">
					<div class="col-xs-12 col-md-5 col-sm-12">
			   			<?=  $form->field($model, 'SIGN_PASSWD')->widget(
							    PasswordInput::classname(), [
							    		'language' => 'es',
							    		'pluginOptions' => [
							    				'verdictTitles' => [
							    						0 => 'No establecida',
							    						1 => 'Muy débil',
							    						2 => 'Débil',
							    						3 => 'Normal',
							    						4 => 'Buena',
							    						5 => 'Excelente'
							    				]],
							    		'options'=>['value'=>'']
			   			]
							); ?>
						  
			   		 </div>
					</div>

</div>

    <div class="panel-footer">
		<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Firma digitalizada') ?>"><i class="fa fa-question-circle"></i>
		</button>
						&nbsp;
						
	    <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar y encriptar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
       </div>
    
   
</div>

</div>
</div>
  <?php ActiveForm::end(); ?>