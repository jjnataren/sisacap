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


$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');

$itemsAct = [1=>'Activo',0=>'No activo'];
?>

<div class="row">

  <div class=" col-xs-12 col-sm-12 col-md-12">
  
    <?php $form = ActiveForm::begin([
    		'options'=>['enctype'=>'multipart/form-data']
    		
    ]); ?>
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3><i class="fa fa-pencil"></i>
						
							<?= Yii::t('backend', 'Editar datos ') ?> <small>Firma electronica</small> </h3>	
						</div>
<div class="panel-body">
		<div class=" col-xs-12 col-sm-12 col-md-6">
    
			<div class="row">
					<div class="col-xs-12 col-md-6">
			   			
						  
						
                  
                <?= $form->field($model, 'SIGN_PICTURE')->widget(FileInput::classname(), [
 							   'options' => ['accept' => 'image/*'],
							]);
						  ?>
                  		
                  		
       
                   
             
						  
						  
			   		 </div>
			   		 
			   		 <div class="col-xs-12 col-md-6">
			   			
						  
						
                  
              <img  src="<?='data:image/' . 'gif' . ';base64,'.$SIGN_IMAGE ?>">
       
                   
				<img src="data:image/gif;base64,R0lGODlhEAAQAPcAAAAAAAAAMwAAZgAAmQAAzAAA/zMAADMAMzMAZjMAmTMAzDMA/2YAAGYAM2YAZmYAmWYAzGYA/5kAAJkAM5kAZpkAmZkAzJkA/8wAAMwAM8wAZswAmcwAzMwA//8AAP8AM/8AZv8Amf8AzP8A/wAzAAAzMwAzZgAzmQAzzAAz/zMzADMzMzMzZjMzmTMzzDMz/2YzAGYzM2YzZmYzmWYzzGYz/5kzAJkzM5kzZpkzmZkzzJkz/8wzAMwzM8wzZswzmcwzzMwz//8zAP8zM/8zZv8zmf8zzP8z/wBmAABmMwBmZgBmmQBmzABm/zNmADNmMzNmZjNmmTNmzDNm/2ZmAGZmM2ZmZmZmmWZmzGZm/5lmAJlmM5lmZplmmZlmzJlm/8xmAMxmM8xmZsxmmcxmzMxm//9mAP9mM/9mZv9mmf9mzP9m/wCZAACZMwCZZgCZmQCZzACZ/zOZADOZMzOZZjOZmTOZzDOZ/2aZAGaZM2aZZmaZmWaZzGaZ/5mZAJmZM5mZZpmZmZmZzJmZ/8yZAMyZM8yZZsyZmcyZzMyZ//+ZAP+ZM/+ZZv+Zmf+ZzP+Z/wDMAADMMwDMZgDMmQDMzADM/zPMADPMMzPMZjPMmTPMzDPM/2bMAGbMM2bMZmbMmWbMzGbM/5nMAJnMM5nMZpnMmZnMzJnM/8zMAMzMM8zMZszMmczMzMzM///MAP/MM//MZv/Mmf/MzP/M/wD/AAD/MwD/ZgD/mQD/zAD//zP/ADP/MzP/ZjP/mTP/zDP//2b/AGb/M2b/Zmb/mWb/zGb//5n/AJn/M5n/Zpn/mZn/zJn//8z/AMz/M8z/Zsz/mcz/zMz/////AP//M///Zv//mf//zP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACwAAAAAEAAQAAAITgCvFYpl7ZrBgwYHFiwkkCDChLEUQiz4UOJBiwgxNqSY0eFFjx05bnw48qPIiSFJatSI0qRKkButyZy5MpbNmzZZFtrJcydMkkCDCr0WEAA7"/>

                   
             
						  
						  
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
						
	    <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
       </div>
    
   
</div>
  <?php ActiveForm::end(); ?>
</div>
</div>
