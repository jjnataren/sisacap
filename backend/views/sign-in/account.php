<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap\ActiveForm */

$this->registerJs("$('#help2').popover('hide');", View::POS_END, 'my-options2');

$this->title = Yii::t('backend', 'Edite su cuenta')
?>

<div class="row">

<div class=" col-xs-12 col-sm-12 col-md-2">
</div>
    
     <div class=" col-xs-12 col-sm-12 col-md-8">
         <?php $form = ActiveForm::begin(); ?>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3><i class="glyphicon glyphicon-pencil"></i>
						
						<?= Yii::t('backend', 'Actualizar cuenta') ?>  </h3>	
					</div>
					
     <div class="panel-body">
     		
 	<!--			
		<div class="row">
		 
	      
	    <div class="col-xs-3 col-md-6">
			<br />
			<button id="help2" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', ' El nombre del usuario no debe llevar espacios en blanco, signos y acentos') ?>"><i class="fa fa-question-circle"></i>
				</button>	   
	    		
	     </div>
	     
	    </div>
 	-->
 
    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'password_confirm')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Actualizar'), ['class' => 'btn btn-primary']) ?>
    </div>
    
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>