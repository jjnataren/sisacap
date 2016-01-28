<?php 

use yii\widgets\ActiveForm;
use backend\models\Catalogo;
use yii\helpers\Url;
use kartik\file\FileInput;
use backend\models\Constancia;
use yii\helpers\Html;
use yii\web\View;
use kartik\widgets\DatePicker;
use kartik\checkbox\CheckboxX;
use yii\widgets\DetailView;


$this->title = 'Constancia Id '.$model->ID_CONSTANCIA;

$this->registerJs("$('#help_popup_boton').popover('hide');", View::POS_END, 'noneoptions234');
$this->registerJs("  
		
		var status = $('#drop_coment').val();
		
		if(status == 1){

				$('#txt_coment').val('');
   				$('#txt_coment').attr('disabled');
		
				
				$('#txt_coment').val('');
   				$('#txt_coment').attr('disabled');
		", View::POS_END, 'my_onload');

use Openbuildings\Swiftmailer\CssInlinerPlugin;


$this->params['breadcrumbs'][] = ['label' => 'Comisión Id '.$model->iDCURSO->iDPLAN->ID_COMISION, 'url'=>['comision-mixta-cap/dashboard', 'id'=>$model->iDCURSO->iDPLAN->ID_COMISION]];
$this->params['breadcrumbs'][] = ['label' => 'Plan Id '.$model->iDCURSO->ID_PLAN, 'url'=>['plan/dashboard', 'id'=>$model->iDCURSO->ID_PLAN]];
$this->params['breadcrumbs'][] = ['label' => 'Curso Id '.$model->ID_CURSO ,'url'=>['constancias/createbycourse','id'=>$model->ID_CURSO ] ];


?>




<div class="callout callout-warning">
	<h4><i class="fa fa-info-circle"></i> Resumen de la Constancia</h4>
	<p>- Esta es solo una pre visualización de la constancia, puede imprimir el comprobante o el formato DC-3 <br />
		- Puede editar los parámetros  de la constancia
	
	</p>
</div>



<?php $form = ActiveForm::begin([
	'action'=>['updatebyuser','id'=>$model->ID_CONSTANCIA]
		
]); ?>

<div class="row">

<div class="col-md-12 col-xs-12 col-md-12">
<section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> <?= strtoupper( $model->iDCURSO->iDPLAN->iDCOMISION->iDEMPRESA->NOMBRE_RAZON_SOCIAL); ?>
                                <small class="pull-right">Fecha de emisión: <?=($model->FECHA_EMISION_CERTIFICADO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->FECHA_EMISION_CERTIFICADO)) ;?> </small>
                                
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Curso
                            <address>
                                <strong><?=$model->iDCURSO->NOMBRE; ?></strong><br>
                                <i class="text text-muted"><?=$model->iDCURSO->DESCRIPCION; ?></i><br />
                                Duración (hrs): <?=$model->iDCURSO->DURACION_HORAS; ?><br />
                                Instructor: <?=  (isset($model->iDCURSO->iDINSTRUCTOR)) ? strtoupper($model->iDCURSO->iDINSTRUCTOR->NOMBRE. ' '. $model->iDCURSO->iDINSTRUCTOR->APP. ' '.$model->iDCURSO->iDINSTRUCTOR->APM ) : '<i>no establecido</i>'; ?><br />
                                Entidad emisora: <?=(isset($model->iDCURSO->iDINSTRUCTOR)) ? $model->iDCURSO->iDINSTRUCTOR->NOMBRE_AGENTE_EXTERNO : '<i>no establecido</i>'; ?>
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Trabajador
                            <address>
                                <strong><?= strtoupper( $model->iDTRABAJADOR->NOMBRE. ' '.$model->iDTRABAJADOR->APP. ' '. $model->iDTRABAJADOR->APM) ; ?></strong><br>
                                <i class="text text-muted"><?= isset( $model->iDTRABAJADOR->pUESTO)? $model->iDTRABAJADOR->pUESTO->NOMBRE_PUESTO : ''; ?></i><br>
                          	      Telefono: <?= $model->iDTRABAJADOR->TELEFONO; ?><br />
                                Email: <?= $model->iDTRABAJADOR->CORREO_ELECTRONICO;?>
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Constancia Id <?= $model->ID_CONSTANCIA;?></b><br>
                            <br />
                            <b>Fecha creación :</b> <?=($model->FECHA_CREACION === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->FECHA_CREACION)) ;?><br>
                           
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                        		<h2 class="text-center"><?= strtoupper($model->iDCURSO->iDPLAN->iDCOMISION->iDEMPRESA->NOMBRE_RAZON_SOCIAL);?></h2>
                        		<p class="text-center">Otorga el presente reconocimiento a: </p>
                        		<h1 class="text-center"><?= strtoupper($model->iDTRABAJADOR->NOMBRE. ' '.$model->iDTRABAJADOR->APP.  ' '. $model->iDTRABAJADOR->APM  ) ?></h1>
                        		<p class="text-center">Por haber completado exitosamente el curso:</p>
                        		<h3 class="text-center"><?= strtoupper($model->iDCURSO->NOMBRE); ?></h3>
                        		<p class="text-center text-muted">
                        			<?php

                        			
                        			$municipio = Catalogo::findOne($model->iDCURSO->iDPLAN->iDCOMISION->iDEMPRESA->MUNICIPIO_DELEGACION);
                        			$entidad = Catalogo::findOne($model->iDCURSO->iDPLAN->iDCOMISION->iDEMPRESA->ENTIDAD_FEDERATIVA);
                        			
                        			echo isset($municipio)?$municipio->NOMBRE.', ':'';
                        			echo isset($entidad)?$entidad->NOMBRE.' a ':'';
                        			
                        			setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
                        		                        			
                        			echo isset ($model->FECHA_EMISION_CERTIFICADO)?  strftime("%d de %B de %Y", strtotime($model->FECHA_EMISION_CERTIFICADO)): '';
                        					
                        			?>
                        		</p>
                        		<br />
                        		<br />
                        		<br />
                        		    		<br />
                        		<br />
                        		<br />
                    
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                 	
					
                    
                    <div class="row no-print">
                        <div class="col-xs-12">
                        
                        	<?= Html::a('<i class="fa fa-download"></i> Descargar en comprobante', ['constancia-comprobante-pdf', 'id'=>$model->ID_CONSTANCIA],  ['target' => '_blank', 'class'=>"btn btn-warning" ]) ?>
                            
                            <?= Html::a('<i class="fa fa-download"></i> Descargar en formato DC-3', ['constanciapdf', 'id'=>$model->ID_CONSTANCIA],  ['target' => '_blank', 'class'=>"btn btn-warning" ]) ?>
                            
                            <?= Html::a('<i class="fa fa-trash"></i> Eliminar', ['delete-constancia', 'id'=>$model->ID_CONSTANCIA],  [ 'class'=>"btn btn-danger", 'data'=>['confirm' => '¿Realmente quiere borrar esta constancia?',
                												  'method' => 'post',] ]) ?>
                												  
                			
                			<?php if($model->ESTATUS ===5 || $model->ESTATUS === Constancia::STATUS_DELIVERED ){?>
                			
                			<?= Html::a('<i class="fa fa-envelope"></i> Enviar notificación',
                						'#', [
										'title' => Yii::t('yii', 'Close'),
									    'onclick'=>"
										$('#modal_mail_content').html('<h1><i class=\\'fa fa-spinner fa-pulse\\'></i>&nbsp;Enviando notificación ...</h1>');
                						$('#modal_mail').modal('show');//for jui dialog in my page

									     $.ajax({
									    type     :'POST',
									    cache    : false,
									    url  : 'send-notification?id=$model->ID_CONSTANCIA',
									    success  : function(response) {
									        $('#modal_mail_content').html(response);
									    }
									    });return false;",
                						'class'=>"btn btn-success"
                						
			                ]);	?>
			                <?php }?>					  
                            
                        </div>
                    </div>
       </section>
	</div> 
 </div>
 
 
 <h4 class="page-header">
          Datos de la constancia
                        <small>Datos relevantes para la constancia</small>
 </h4>
 
 <div class="row">
 
 <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                   <i class="fa fa-check-square"></i>
                    <h2 class="box-title"><?= Yii::t('backend', 'Documento probatorio') ?></h2>
                
                 <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
                
                </div><!-- /.box-header -->
                <div class="box-body">
                   
                  <?php 
                  
                  		$pluginOptions = [];
                  		
                  		
                  		if ($model->DOCUMENTO_PROBATORIO !== null){
                  			
							$pluginOptions['initialPreview'] = ['  
											<object data="'.$model->DOCUMENTO_PROBATORIO.'" type="application/pdf" width="300px" height="160px">
											 <param name="movie" value="{caption}" />
													<div class="file-preview-other">
														<i class="glyphicon glyphicon-file"></i>
													</div>
											 </object>
											 <div class="file-thumbnail-footer">
											    <div class="file-caption-name">'.$model->NOMBRE_DOC_PROB.'</div>
											    <div class="file-actions">
											</div>
											</div>
									'];

							$pluginOptions['initialPreviewConfig'] =[['url'=>Url::to(['deletedocument','id'=>$model->ID_CONSTANCIA, 'document'=>1])]];
							
							
                  		}
                  		
                  		
                  		$pluginOptions['uploadUrl'] = Url::to(['uploaddocument','id'=>$model->ID_CONSTANCIA, 'document'=>1]);
                  		
                  		
                  		
                  ?> 
                   
                 <?= FileInput::widget([
					  	 		
					  	 		'name' => 'DOCUMENTO_PROBATORIO',
								'options'=>[
								],
								'pluginOptions' => $pluginOptions
								
						]); ?>
    
        
                </div><!-- /.box-body -->
                
                 
                <?php if ($model->DOCUMENTO_PROBATORIO !== null):?>
                 <div class="box-footer">
			    		<a href="<?= $model->DOCUMENTO_PROBATORIO ?>" target="_blank" class="btn btn-default">Descargar documento</a>
        	        
                  </div>
              <?php endif;?>
            </div>
        </div>
        
        
         <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                   <i class="fa fa-file-pdf-o"></i>
                    <h2 class="box-title"><?= Yii::t('backend', 'Datos de la constancia') ?></h2>
               
                <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
               
                </div><!-- /.box-header -->
                <div class="box-body">
				
    				<!-- 	<?= $form->field($model, 'FECHA_EMISION_CERTIFICADO')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
    					<?= $form->field($model, 'METODO_OBTENCION')->dropDownList(Constancia::getAllMetodosType(),['prompt'=>'-- Seleccione  --','maxlength' => 300]); ?>	
						<?= $form->field($model, 'TIPO_CONSTANCIA')->dropDownList(Constancia::getAllContanciasType(),['prompt'=>'-- Seleccione  --','maxlength' => 300]); ?>
						<?=  $form->field($model, 'PROMEDIO')->textInput();  ?>
						<?= $form->field($model, 'APROBADO')->widget(CheckboxX::classname(), ['options'=>['id'=>'chk_aprobado'],'pluginOptions'=>['threeState'=>false]]); ?>
						-->
								<?php $estatus = Constancia::getAvaliableStatusByRol($model->ESTATUS, 5);?>
						 		
								
 <?= DetailView::widget([
		'model' => $model,
		'attributes' => [
	'FECHA_EMISION_CERTIFICADO',

	[
	'attribute'=>'METODO_OBTENCION',
	'type'=>'raw',
	'value'=>isset($model->MET_OBTEN[ $model->METODO_OBTENCION ])? $model->MET_OBTEN [$model->METODO_OBTENCION]: 'no establecido'

	],

 		[
 		'attribute'=>'TIPO_CONSTANCIA',
 		'type'=>'raw',
 		'value'=>isset($model->TIPE_CONST[ $model->TIPO_CONSTANCIA ])? $model->TIPE_CONST [$model->TIPO_CONSTANCIA]: 'no establecido'
 		
 				],
 		'PROMEDIO',
 		
 		[
 		'attribute'=>'APROBADO',
 		'type'=>'raw',
 		'value'=>isset($model->TYPE_APROB[ $model->APROBADO])? $model->TYPE_APROB [$model->APROBADO]: 'no establecido'
 	
 				],


		
		
		
		
		
		
],
    ]) ?>				
  
   			 <div>
   			 	
   			 <br />
   			 	
    			<?= $form->field($model, "ESTATUS")->dropDownList($estatus)->label('Estatus de la constancia') ?>
                    
<!--  -->		<?=  $form->field($model, 'COMENTARIO')->textArea(Constancia:: getAllEstatusType(), ['id'=>'drop_coment']) ?>  							

				 						
								
                </div>
                <div class="box-footer">
                		<button id="help_popup_boton" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Presiona el boton [Guardar] para actualizar los datos de la constancia') ?>"><i class="fa fa-question-circle"></i>
						</button>
          					<?= Html::submitButton('<i class="fa fa-floppy-o"></i>' .'&nbsp;'.Yii::t('backend', 'Guardar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
                </div>
               </div>
           </div>     
              
              
              
              
                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                   <i class="fa fa-file-pdf-o"></i>
                    <h2 class="box-title"><?= Yii::t('backend', 'Datos del trabajador') ?></h2>
               
                <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
               
                </div><!-- /.box-header -->
                <div class="box-body">
				
    			 
				 <dl class="dl-horizontal">				
					  <dt></dt>
                      
	              <dt><?= Yii::t('backend', 'Nombre completo') ?></dt>
				 <dd> <?= strtoupper( $model->iDTRABAJADOR->NOMBRE. ' '.$model->iDTRABAJADOR->APP. ' '. $model->iDTRABAJADOR->APM) ?>  </dd>
				   <dt><?= Yii::t('backend', 'CURP') ?></dt>
				 <dd> <?= strtoupper( $model->iDTRABAJADOR->CURP)?></dd>
				    <dt><?= Yii::t('backend', 'RFC') ?></dt>
				 <dd> <?= strtoupper( $model->iDTRABAJADOR->RFC)?></dd>
				    <dt><?= Yii::t('backend', 'NSS') ?></dt>
				       <dt><?= Yii::t('backend', 'Sexo') ?></dt>
				 <dd> <?= strtoupper( $model->iDTRABAJADOR->SEXO)?></dd>
				 <dd> <?= strtoupper( $model->iDTRABAJADOR->NSS)?></dd>
				    <dt><?= Yii::t('backend', 'Puesto') ?></dt>
				 <dd> <?= strtoupper( $model->iDTRABAJADOR->PUESTO)?></dd>
				    <dt><?= Yii::t('backend', 'Ocupación') ?></dt>
				 <dd> <?= strtoupper( $model->iDTRABAJADOR->OCUPACION_ESPECIFICA)?></dd>
				    <dt><?= Yii::t('backend', 'Correo electronico') ?></dt>
				 <dd> <?= strtoupper( $model->iDTRABAJADOR->CORREO_ELECTRONICO)?></dd>
				    <dt><?= Yii::t('backend', 'Telefono') ?></dt>
				 <dd> <?= strtoupper( $model->iDTRABAJADOR->TELEFONO)?></dd>
				 
				  </dl>
		
		
		
			
  
						
                </div>
                <div class="box-footer">
                		<button id="help_popup_boton" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Presiona el boton [Guardar] para actualizar los datos de la constancia') ?>"><i class="fa fa-question-circle"></i>
						</button>
						 <?= Html::a('<i class="fa fa-eye"> </i>Detalles del trabajador ', ['trabajador/viewbycompany','id'=>$model->ID_TRABAJADOR], ['class' => 'btn btn-primary']) ?>
           				
        	        
          					
                </div>
               </div>
           </div> 
              
              </div>
              
 </div>
       
 <?php ActiveForm::end(); ?>
 
 
 
 <!-- Modal implementations -->
 
<?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal_mail',
    'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modal_mail_content'>
					
					Enviando email ...
		
		</div>";
yii\bootstrap\Modal::end();
?>
 
 
 
       