<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use kartik\file\FileInput;
use kartik\password\PasswordInput;
use yii\helpers\Url;
use Symfony\Component\Console\Output\NullOutput;


/**
 * Title & scripts
 */
$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');


$this->title = 'Firma digitalizada';
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-pencil fa-lg  fa-stack-1x"></i>
							   </span>';


$this->params['breadcrumbs'][] = 'Instructor ';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">

  <div class=" col-xs-12 col-sm-12 col-md-12">
  
    <?php $form = ActiveForm::begin([
    		
    		
    ]); ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3><i class="fa fa-image"></i>
						
							<?= Yii::t('backend', 'Firma digitalizada ') ?> <small>  del representante legal</small> </h3>	
						</div>
<div class="panel-body">
		<div class=" col-xs-12 col-sm-12 col-md-6">
		
		
		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12">
			
				<div class="callout callout-info">
					<h4><i class="fa fa-info-circle"></i> Información adicional</h4>
					<p>- Este mecanismo permitira incluir automaticamente la firma del instructor en los documentos <br />
						   
						   
					</p>
					
				
				</div>
				
			</div>
		</div>
    
			<div class="row">
					<div class="col-xs-12 col-md-6">
								  
							       <?php if ($model->SIGN_PIC != null && $model->SIGN_PASSWD != NULL  ): ?>
							       
								       <?php if ($SIGN_IMAGE != null):?>
								       		<img  src="<?='data:image/' . 'gif' . ';base64,'.$SIGN_IMAGE ?>">
								       
								       <?php else:?>
								       
								    		<img  src="<?='/img/sure-538718_640.jpg' ?>">
								       
								       <?php endif;?>
							       		
							       	<?php else:?>	
							       				
							       		<img  src="<?='/img/cross-27168_640.png' ?>">		
							       				  
							       <?php endif;?>				  
							       				  
			   		 </div>
			   		 
			   		<div class="col-xs-12 col-md-6"> 
			   		   <dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'Estatus') ?></dt>
                        <dd><?= ($model->SIGN_PIC === null)? 'No se ha seleccionado imagen': 'Imagen seleccionada' ?></dd>

                        <dt><?= Yii::t('backend', 'Fecha de actualización') ?></dt>
                        <dd><?= $model->SIGN_CREATED_AT ?></dd>
                        
                        
                         <dt><?= Yii::t('backend', 'Tipo de archivo') ?></dt>
                        <dd><?= $model->SIGN_PIC_EXTENSION ?></dd>

                     
                    </dl>
                    
                    </div>
			   		 
			</div>
			
		
					
					<div class="row">
					<div class="col-xs-12 col-md-7">
					
					  <?php if ($model->SIGN_PIC !== null  ): ?>
							  
							  
			   			<?=  $form->field($model, 'SIGN_PASSWD')->widget(
							    PasswordInput::classname()
							); ?>
							
					<?php endif;?>		
						  
			   		 </div>
					</div>

		</div>



</div>

    <div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Aqui puedes actualizar los datos del representante legale de tu empresa, es importante que todos los campos esten llenos con sus datos correctos. Presiona el boton [Guardar] y acontinuación se guardaran los datos del representante legal') ?>"><i class="fa fa-question-circle"></i>
						</button>
						&nbsp;
				
		  <?php if ($model->SIGN_PIC !== null  ): ?>		
						
	  		  <?= Html::submitButton( '<i class="fa fa-cogs"></i> Des encriptar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    
	    	 	<?= Html::a( '<i class="fa fa-floppy-o"></i> Editar firma', '/instructor/manage-sign-pic' , ['class' =>  'btn btn-success']) ?>
	    	<?php else:?>
	    
	    	<?= Html::a( '<i class="fa fa-floppy-o"></i> Adjuntar firma', '/instructor/manage-sign-pic' , ['class' =>  'btn btn-success']) ?>
	    		
	    <?php endif;?>
       </div>
    
   
</div>
  <?php ActiveForm::end(); ?>
</div>
</div>
