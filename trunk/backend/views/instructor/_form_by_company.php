.<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\grid\GridView;
use backend\models\Instructor;
use kartik\checkbox\CheckboxX;
use kartik\password\PasswordInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs ( "$('#help_popup_alias').popover('hide');", View::POS_END, 'my-options' );
$this->registerJs ( "$('#help_popup_registro_externo').popover('hide');", View::POS_END, 'my-options1' );
$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');

$this->registerJs ( "
			
		var tipoInstructor = $('#drop_instructor').val();
		
		if(tipoInstructor == 1){

				$('#txt_numero_reg_age_ext').val('');
   				$('#txt_numero_reg_age_ext').attr('disabled','true');
		
				
				$('#txt_nombre_reg_age_ext').val('');
   				$('#txt_nombre_reg_age_ext').attr('disabled','true');
		
		}else if(tipoInstructor == 2){

					$('#txt_nombre_reg_age_ext').val('');
   					$('#txt_nombre_reg_age_ext').attr('disabled','true');
				
   				$('#txt_numero_reg_age_ext').removeAttr('disabled');
		
		}else if(tipoInstructor == 3){

				$('#txt_nombre_reg_age_ext').removeAttr('disabled');
				
   				$('#txt_numero_reg_age_ext').removeAttr('disabled');
		
		}else if(tipoInstructor == 4){

				$('#txt_nombre_reg_age_ext').removeAttr('disabled');
				
   				$('#txt_numero_reg_age_ext').val('');
   				$('#txt_numero_reg_age_ext').attr('disabled','true');
		
		
		}
		
		
		$(\"div[class='cbx cbx-md cbx-disabled']\").attr( 'class', 'test' );  
		
		
		", View::POS_READY, 'my_onload' );

$this->registerJs ( "$('#drop_instructor').change(function(){

		var TIPO_AGENTE_CAP_INTERNO = 1;
		
		if(this.value == TIPO_AGENTE_CAP_INTERNO){

				$('#txt_numero_reg_age_ext').val('');
   				$('#txt_numero_reg_age_ext').attr('disabled','true');
		
				
				$('#txt_nombre_reg_age_ext').val('');
   				$('#txt_nombre_reg_age_ext').attr('disabled','true');
		
		}else if(this.value == 2){

					$('#txt_nombre_reg_age_ext').val('');
   					$('#txt_nombre_reg_age_ext').attr('disabled','true');
				
   				$('#txt_numero_reg_age_ext').removeAttr('disabled');
		
		}else if(this.value == 3){

				$('#txt_nombre_reg_age_ext').removeAttr('disabled');
				
   				$('#txt_numero_reg_age_ext').removeAttr('disabled');
		
		}else if(this.value == 4){

		
				
   				$('#txt_numero_reg_age_ext').val('');
   				$('#txt_numero_reg_age_ext').attr('disabled','true');
		
		
		}
		
		
});", View::POS_END, 'noneoptions' );


$this->registerJs ( "$('#userchange').change(function(){
		
		var ischecked = true;
		
		if(this.value == 1) ischecked = false;

		$('#userform-username').attr('disabled',ischecked);
		
		$('#userform-password').attr('disabled',ischecked);
		
		$('#userform-status').attr('disabled',ischecked);
		
		$('#userform-email').attr('disabled',ischecked);
		
		if(!ischecked){
			$('#userform-password').val('');
		}else{
			}

});", View::POS_END, 'userchange' );

?>


    <?php $form = ActiveForm::begin(); ?>
<div class="row">

	<div class="col-md-12 col-xs-12 col-sm-12">
		<div
			class="panel <?=  ($model->isNewRecord) ? 'panel-primary': 'panel-warning'  ?>">
			<div class="panel-heading">
				<h3>
					<?php  if ($model->isNewRecord): ?>
						<i class="glyphicon glyphicon-plus"></i>
					<?php else: ?>
						<i class="fa fa-pencil-square-o"></i>
					<?php endif;?>
						<?= Yii::t('backend', 'Nuevo instructor') ?> </h3>
			</div>

			<div class="panel-body">

				<div class="row">

					<div class="col-md-5 col-xs-12 col-sm-12">
						<div class="panel">
							<div class="panel-heading text-primary">

								<h3 class="panel-title"><?= Yii::t('backend', 'Datos del instructor') ?></h3>
							</div>
							<div class="panel-body">
								    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => 100])?>
				
								    <?= $form->field($model, 'APP')->textInput(['maxlength' => 100])?>
				
				    				<?= $form->field($model, 'APM')->textInput(['maxlength' => 100])?>
				
				                    <?= $form->field($model, 'RFC')->textInput(['maxlength' => 100])?>
				 
								    <?= $form->field($model, 'DOMICILIO')->textArea(['maxlength' => 300])?>
								
								    <?= $form->field($model, 'TELEFONO')->textInput(['maxlength' => 100])?>
								
							</div>
						</div>
					</div>

					<div class="col-md-7 col-xs-12 col-sm-12">
						<div class="panel">
							<div class="panel-heading text-primary">

								<h3 class="panel-title"><?= Yii::t('backend', 'Tipo de instructor') ?></h3>
							</div>
							<div class="panel-body">
			    
				     <?= $form->field($model, 'TIPO_INSTRUCTOR')->dropDownList(Instructor::getTypeInstructor(),['prompt'=>'-- Seleccione  --','maxlength' => 300, 'id'=>'drop_instructor'])?>
				 
					 				
			
				 	<div class="row">
									<div class="col-xs-9 col-md-9">
					    <?= $form->field($model, 'NOMBRE_AGENTE_EXTERNO')->textInput(['maxlength' => 100, 'id'=>'txt_nombre_reg_age_ext'])?>
					    </div>
									<div class="col-xs-3 col-md-3">
										<br />

										<button id="help_popup_alias" data-placement="top"
											tabindex="0" type="button" class="btn btn-info btn-sm"
											data-toggle="popover" title="Ayuda"
											data-content="Incluir  nombre de personas físicas o morales tales como instituciones especializadas en impartir capacitación. ">
											<i class="fa fa-question-circle"></i>
										</button>
									</div>
								</div>



								<div class="row">
									<div class="col-xs-9 col-md-9">
				<?= $form->field($model, 'NUM_REGISTRO_AGENTE_EXTERNO')->textInput(['maxlength' =>100, 'id'=>'txt_numero_reg_age_ext'])?>
				</div>

									<div class="col-xs-3 col-md-3">
										<br />

										<button id="help_popup_registro_externo" data-placement="top"
											tabindex="0" type="button" class="btn btn-info btn-sm"
											data-toggle="popover" title="Ayuda"
											data-content="Incluir identificador que asigna la (STPS)Secretaría del Trabajo y  Previsíon Social a las instituciones, escuelas para que puedan impartir cursos. Ej. (CIS8803057Z6-0013). ">
											<i class="fa fa-question-circle"></i>
										</button>

									</div>

									<div class="col-xs-9 col-md-12">
				 <?= $form->field($model, 'COMENTARIOS')->textArea(['maxlength' => 200])?>
					 				
				   </div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-7 col-xs-12 col-sm-12">
					
					
							 <div class="box box-warning">
				                <div class="box-header">
				                
				       				<i class="fa fa-key"></i>
				                    <h3 class="box-title"><?= Yii::t('backend', 'Datos de acceso al sistema ') ?><small> para este instructor</small></h3>
				                    <div class="box-tools pull-right">
				                    	
				                    	<?php 
				                    	
				                    	if (!$model->isNewRecord) {
					                    	echo '<label class="cbx-label" for="userchange"><strong>Actualizar acceso</strong></label>';
					                    	
					                    	echo CheckboxX::widget([
											    'name'=>'userchange',
											    'options'=>['id'=>'userchange'],
											    'pluginOptions'=>['threeState'=>false, 'size'=>'lg'],
											]);  
				                    	}
				                    	
				                    	?>
							         </div><!-- /.box-tools -->
				                </div><!-- /.box-header -->
				                <div class="box-body">
				                		
				                		
				                		<?php if($model->iDUSUARIO === null):?>
				                		
										    <?= $form->field($userModel, 'username')->textInput(['maxlength' => 100,])->label('Nombre de usuario'); ?> 
											
				    						<?=  $form->field($userModel, 'password')->widget(
							 										   PasswordInput::classname(),[
																						    		'language' => 'es',
																						    		'pluginOptions' => [
																						    				'verdictTitles' => [
																						    						0 => 'No establecida',
																						    						1 => 'Muy débil',
																						    						2 => 'Débil',
																						    						3 => 'Normal',
																						    						4 => 'Buena',
																						    						5 => 'Excelente'
																						    				]]
																						    		]
																								)->label('Constraseña de acceso'); ?>

											 <?= $form->field($userModel, 'email')->textInput(['maxlength' => 100,]) ?>
											 
											 <?= $form->field($userModel, 'status')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false,], ])->label('Activo'); ?>							
								
										<?php else:?>
											<?= $form->field($userModel, 'username')->textInput(['maxlength' => 100, 'disabled'=>'disabled',  ])->label('Nombre de usuario');?>
			    							<?=  $form->field($userModel, 'password')->widget(
							 										   PasswordInput::classname(), ['disabled'=>'disabled', 
							 										   								'language' => 'es',
																						    		'pluginOptions' => [
																						    				'verdictTitles' => [
																						    						0 => 'No establecida',
																						    						1 => 'Muy débil',
																						    						2 => 'Débil',
																						    						3 => 'Normal',
																						    						4 => 'Buena',
																						    						5 => 'Excelente'
																						    				]]]
																		); ?>									
											 <?= $form->field($userModel, 'email')->textInput(['maxlength' => 100,  'disabled'=>'disabled']) ?>
											 <?= $form->field($userModel, 'status')->checkbox( [ 'disabled'=>'disabled',   ] ); ?>																		
										<?php endif;?>
				
				
				
				        		        
				       			</div>
				       		</div>	
					
					</div>

				</div>
			</div>
			
			<div class="panel-footer">

			<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Aquí puedes crear un instructor para los cursos, es importante introducir los datos correctamente en todos los campos. Presiona el botón [Guardar] y a continuación se guardaran los datos del instructor') ?>"><i class="fa fa-question-circle"></i>
						</button>
             <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
		</div>
		</div>

	</div>





</div>

<?php ActiveForm::end(); ?>