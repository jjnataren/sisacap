<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */

$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');

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
		
    
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'status')->label(Yii::t('backend', 'Activar'))->checkbox() ?>
        <?= $form->field($model, 'role')->dropdownList(User::getRoles()) ?>
      
       <div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Aqu� podr�s crear nuevos usuarios, Es importante llenar todos los campos correctamente. Presiona el bot�n [Crear] para guardar sus datos') ?>"><i class="fa fa-question-circle"></i>
						</button>  
            <?= Html::submitButton(Yii::t('backend', '<i class="fa fa-floppy-o"></i> Guardar'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
       
        </div>
    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
