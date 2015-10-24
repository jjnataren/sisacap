<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */

$this->registerJs("$('#help1').popover('hide');", View::POS_END, 'my-options');
$this->registerJs("$('#help2').popover('hide');", View::POS_END, 'my-options1');
$this->registerJs("$('#help3').popover('hide');", View::POS_END, 'my-options2');
$this->registerJs("$('#help4').popover('hide');", View::POS_END, 'my-options3');

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    
     <div class=" col-xs-12 col-sm-12 col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3><i class=""></i>
						
						<?= Yii::t('backend', 'Crear nuevo usuario') ?> <small></small> </h3>	
					</div>
					<div class="panel-body">
		
     <div class="row">
     <div class="col-xs-10 col-md-8">
         <?= $form->field($model, 'username') ?>
     </div>
           <div class="col-xs-2 col-md-2">
        
                <button id="help2" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="
El nombre del usuario no debe llevar espacios en blanco."><i class="fa fa-question-circle"></i>
	</button>
	</div>
	</div>
	
	
	<div class="row">
     <div class="col-xs-10 col-md-8">
	        <?= $form->field($model, 'email') ?>
	        </div>
	        </div>
        
     <div class="row">
     <div class="col-xs-10 col-md-8">
        <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="col-xs-2 col-md-2">
                        <button id="help3" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="
La contraseña no debe llevar espacios en blanco ."><i class="fa fa-question-circle"></i>
	</button>
	</div>
	</div>
        
        <?= $form->field($model, 'status')->label(Yii::t('backend', 'Activar'))->checkbox() ?>
       
       <div class="row">
     <div class="col-xs-10 col-md-8">
        <?= $form->field($model, 'role')->dropdownList(User::getRoles()) ?>
      
      </div>
      </div>
       <div class="panel-footer">
								<button id="help4" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'La contraseña no debe llevar espacios en blanco.') ?>"><i class="fa fa-question-circle"></i>
						</button>  
            <?= Html::submitButton(Yii::t('backend', '<i class="fa fa-floppy-o"></i> Guardar'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
       
        </div>
    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
