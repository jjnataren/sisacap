<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use backend\models\PuestoEmpresa;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use Codeception\Step\Action;
use Symfony\Component\Console\Input\Input;
use kartik\checkbox\CheckboxXAsset;
use kartik\checkbox\CheckboxX;
/* @var $this yii\web\View */
/* @var $model backend\models\Plan */
/* @var $form yii\widgets\ActiveForm */

$id_empresa = $model->iDCOMISION->ID_EMPRESA;






$courses =  Catalogo::findAll ( ['CATEGORIA' => 11, 'ACTIVO'=> 1]);
$dataListOcupacion = ArrayHelper::map ( PuestoEmpresa::findBySql ( 'SELECT ID_PUESTO,NOMBRE_PUESTO,ID_EMPRESA
FROM tbl_puesto_empresa where activo=1 AND ID_EMPRESA = ' . $id_empresa )->all (), 'ID_PUESTO', 'NOMBRE_PUESTO' );

$this->registerJs ( "$('#helppop1').popover('hide');", View::POS_END, 'my-options1' );

$this->registerJs ( "$('#help1').popover('hide');", View::POS_END, 'my-options1' );
$this->registerJs ( "$('#help2').popover('hide');", View::POS_END, 'my-options2' );
$this->registerJs ( "$('#help3').popover('hide');", View::POS_END, 'my-options3' );
$this->registerJs ( "$('#help4').popover('hide');", View::POS_END, 'my-options4' );
$this->registerJs ( "$('#help5').popover('hide');", View::POS_END, 'my-options5' );
$this->registerJs ( "$('#help6').popover('hide');", View::POS_END, 'my-options6' );
$this->registerJs ( "$('#helpCursos').popover('hide');", View::POS_END, 'my-optionscursos' );
$this->registerJs ( "$('#helpAyuda').popover('hide');", View::POS_END, 'my-options6' );
$this->registerJs ( "$('#helpEtapas').popover('hide');", View::POS_END, 'my-options7' );
$this->registerJs ( "$('#helpFInfo').popover('hide');", View::POS_END, 'my-options8' );

$this->registerJs ( "$('#empresaButton').click(function() {

		$('#lbl_id_establecimiento').text('" . $model->iDCOMISION->iDEMPRESA->ID_EMPRESA . "');
		$('#lbl_nombre_establecimiento').text('" . html::encode ( $model->iDCOMISION->iDEMPRESA->NOMBRE_RAZON_SOCIAL ) . "');
		$('#lbl_rfc').text('" . $model->iDCOMISION->iDEMPRESA->RFC . "');                         
      
	//	$('#lbl_entidad').text('" . $model->iDCOMISION->iDEMPRESA->ENTIDAD_FEDERATIVA . "');
	//	$('#lbl_municipio').text('" . $model->iDCOMISION->iDEMPRESA->MUNICIPIO_DELEGACION . "');

		$('#hid_id_establecimiento').val('" . $model->iDCOMISION->ID_EMPRESA . "');
		
		
});", View::POS_END, 'my-options5' );

$itemsTipoPlan = [ 
		1 => 'planes comunes',
		2 => 'plan especifico para empresa',
		3 => 'aderidos a la empresa' 
];
$itemsObjetivo = [ 
		1 => '1',
		2 => '2',
		3 => '3',
		4 => '4',
		5 => '5' 
];
$itemsModalidad = [ 
		1 => 'Plan y programas especificos de la empresa',
		2 => 'Plan y programas comunes de un grupo de empresas',
		3 => 'Sistema general de una rama de actividad economica' 
]?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>
    
      <div class=" col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3>
					<i class="fa fa-plus-square"></i>
						
						<?= Yii::t('backend', 'Actualizar plan y programa de capacitación, adiestramiento y productividad') ?>  </h3>
			</div>

			<div class="panel-body">

				<div class=" col-xs-12 col-sm-12 col-md-6">

					<div class="row">
						<div class=" col-xs-12 col-sm-12 col-md-6">

							<div class="row">
								<div class="col-xs-10 col-md-10">
               <?= $form->field($model, 'ALIAS')->textInput()?>
         </div>
								<div class="col-xs-2 col-md-2">

									<button id="help1" data-placement="top" tabindex="0"
										type="button" class="btn btn-info btn-sm"
										data-toggle="popover" title="Ayuda"
										data-content="El alias nos ayudara a identificar el plan, ejemplo: plan de verano.">
										<i class="fa fa-question-circle"></i>
									</button>
								</div>
							</div>
    
  
    	<div class="row">
								<div class="col-xs-10 col-md-10">
          <?= $form->field($model, 'NUMERO_ETAPAS')->textInput()?>
         </div>
								<div class="col-xs-2 col-md-2">

									<button id="helpEtapas" data-placement="top" tabindex="0"
										type="button" class="btn btn-info btn-sm"
										data-toggle="popoverEtapas" title="Ayuda"
										data-content="Precisar el número de etapas durante las cuales se impartirán">
										<i class="fa fa-question-circle"></i>
									</button>
								</div>
							</div>
    
    
     <?= $form->field($model, 'TOTAL_MUJERES')->textInput()?>
     
      <?= $form->field($model, 'TOTAL_HOMBRES')->textInput()?>
      
      <?=  $form->field($model, 'TIPO_PLAN')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false, 'size'=>'lg']]);  ?> 
      
      
      
  
        
	          </div>

					</div>
				</div>


				<div class=" col-xs-12 col-sm-12 col-md-4">
    
		<?= $form->field($model, 'VIGENCIA_INICIO')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]])?>
		    
		<?= $form->field($model, 'VIGENCIA_FIN')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]])?>
		
		     
		     <div class="row">
								<div class="col-xs-10 col-md-10">
		<?= $form->field($model, 'FECHA_INFO')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]])?>
								
								</div>
								<div class="col-xs-2 col-md-2">

									<button id="helpFInfo" data-placement="top" tabindex="0"
										type="button" class="btn btn-info btn-sm"
										data-toggle="popover" title="Ayuda"
										data-content="'Aquí podrás colocar la fecha de elaboración del formato DC-2  ">
										<i class="fa fa-question-circle"></i>
									</button>
								</div>
							</div>
    
		     
		     
		<?= $form->field($model, 'LUGAR_INFORME')->textInput()?>
		     
		<?= $form->field($model, 'DESCRIPCION_PLAN')->textArea()?>
     
   </div>

				<div class=" col-xs-12 col-sm-12 col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">	
		   
		    
		    	<?= $form->field($model, 'ID_EMPRESA')->hiddenInput(['id'=>'hid_id_establecimiento'])->label(false)?>
		    	
		    	
		   	<table class="table">

								<thead>
									<tr>
										<th colspan="2">
										<h3>	<i class="fa fa-university"></i>
						<?= Yii::t('backend', ' Establecimiento') ?> <small>que presentara el plan</small> </h3>
							
										
										<th>
									
									</tr>
								</thead>
								<tr>
									<td>Id</td>
									<td><label id="lbl_id_establecimiento"> 
		    					
		    					<?php if (isset($model->iDEMPRESA)){ ?>
		    						<?= $model->iDEMPRESA->ID_EMPRESA?>
		    					<?php }?>	
		    				</label></td>
								
								
								<tr>
									<td>Nombre</td>
									<td><label id="lbl_nombre_establecimiento"> 
		    			   
		    			   <?php  if (isset($model->iDEMPRESA )){ ?>
		    			   
		    			    <?= $model->iDEMPRESA->NOMBRE_COMERCIAL?>
		    			    <?php }?>
		    			   </label></td>
								</tr>

								<tr>
									<td>RFC</td>
									<td><label id="lbl_rfc"> 
		    			
		    			<?php if (isset ($model->iDEMPRESA)) {?>
		    			
		    			<?= $model->iDEMPRESA->RFC?>
		    			
		    			<?php } ?>
		    			</label></td>
								</tr>



							</table>

						</div>
						<div class="panel-footer">


							<button id="help4" data-placement="top" tabindex="0"
								type="button" class="btn btn-info btn-sm" data-toggle="popover"
								title="Ayuda"
								data-content="<?=Yii::t('backend', ' Aquí podrás seleccionar el establecimiento encargado del plan. ') ?>">
								<i class="fa fa-question-circle"></i>
							</button>

							<a href="#" class="btn btn-default" data-toggle="modal"
								data-target="#userModal" id="userButton"> <i
								class="fa fa-university"></i>&nbsp;<?= Yii::t('backend', 'Seleccionar establecimiento')?>
			    </a> <a href="#" class="btn btn-default" id="empresaButton"> <i
								class="fa fa-building fa-lg"></i>&nbsp;<?= Yii::t('backend', 'Seleccionar empresa matriz')?>
			    </a>
						</div>
					</div>
				</div>



				<div class=" col-xs-12 col-sm-12 col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">

							<h3>
								<i class="fa fa-newspaper-o"></i>
						<?= Yii::t('backend', ' Seleccione modalidad') ?> <small> de la capacitación  correspondiente.</small> </h3>
						

						</div>

						<div class="panel-body">
							<div class=" col-xs-12 col-sm-12 col-md-8">
								<div class="panel-body">	
     <?= $form->field($model, 'MODALIDAD_CAPACITACION')->radioList($itemsModalidad)->label(false)?>
       </div>
							</div>
						</div>
						<div class="panel-footer">
							<button id="help2" data-placement="top" tabindex="0"
								type="button" class="btn btn-info btn-sm" data-toggle="popover"
								title="Ayuda"
								data-content="<?=Yii::t('backend', 'Es requerido seleccionar la modalidad del plan. Dando [clic] en el circulo. ') ?>">
								<i class="fa fa-question-circle"></i>
							</button>
						</div>
					</div>


				</div>




				<div class=" col-xs-12 col-sm-12 col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">

								<h3>
								<i class="fa fa-line-chart"></i>
	<?= Yii::t('backend', '') ?> Objetivos del plan de capacitación <small> Señalar del 1 al 5 en donde 1 es el más importante </small></h3>
						</div>

						<div class="panel-body">



							<table class="table">

								<tr>
									<td><b>Actualizar y perfeccionar conocimientos y habilidades y
											proporcionar información de nuevas tecnologías</b></td>
									<td><?= $form->field($model, 'OBJETIVO1')->dropDownList($itemsObjetivo,  ['prompt'=>'-- Seleccione--']) ->label(false) ?></td>

								</tr>

								<tr>
									<td><b>Prevenir riesgos de trabajo</b></td>
									<td><?= $form->field($model, 'OBJETIVO2')->dropDownList($itemsObjetivo,  ['prompt'=>'-- Seleccione--']) ->label(false) ?></td>

								</tr>
								<tr>
									<td><b>Incrementar la productividad </b></td>
									<td><?= $form->field($model, 'OBJETIVO3')->dropDownList($itemsObjetivo,  ['prompt'=>'-- Seleccione--']) ->label(false) ?></td>
								</tr>
								<tr>
									<td><b>Mejorar el nivel educativo</b></td>
									<td><?= $form->field($model, 'OBJETIVO4')->dropDownList($itemsObjetivo,  ['prompt'=>'-- Seleccione--']) ->label(false) ?></td>
								</tr>
								<tr>
									<td><b>Preparar para ocupar vacantes o puestos de nueva
											creación</b></td>
									<td><?= $form->field($model, 'OBJETIVO5')->dropDownList($itemsObjetivo,  ['prompt'=>'-- Seleccione--']) ->label(false) ?></td>
								</tr>
							</table>
							<div class="panel-footer">
								<button id="help3" data-placement="top" tabindex="0"
									type="button" class="btn btn-info btn-sm" data-toggle="popover"
									title="Ayuda"
									data-content="<?=Yii::t ( 'backend', '
Es requerido evaluar el objetivo del plan. Dando [clic] la flecha. Seleccione del 1 al 5 en  donde 1 es el más importante.   
										. ' )?>">
									<i class="fa fa-question-circle"></i>
								</button>
							</div>

						</div>
					</div>

				</div>


			</div>
			
					<div class="panel-footer">
						<button id="helpAyuda" tabindex="0" type="button" class="btn"
							data-toggle="popover" title="Ayuda"
							data-content="<?=Yii::t('backend', 'Para guardar el plan es necesario llenar todos los campos, Presiona el boton [Guardar] y acontinuación se guardara el plan de capacitacion') ?>">
							<i class="fa fa-question-circle"></i>
						</button>
     			        <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>

   				 </div>
			
		</div>
</div>

    
    <?php ActiveForm::end(); ?>






</div>
		
		
		
<!-- Modal implementation -->		

		<div class="modal fade" id="userModal" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">
							<i class="fa fa-graduation-cap"></i>&nbsp;<?=Yii::t('backend', 'Agregar el establecimiento  ') ?></h4>
					</div>
					<div class="modal-body">
											

											 <?=GridView::widget ( [ 'dataProvider' => $dataProvider,'filterModel' => $searchModel,'columns' => [ [ 'class' => 'yii\grid\SerialColumn' ],'ID_EMPRESA','NOMBRE_COMERCIAL','RFC',[ 'label' => '','format' => 'raw','value' => function ($data) {return Html::a ( '<i class="fa fa-plus"></i>', '#', [ 'class' => 'btn btn-primary','data-loading-text' => "Loading...",'data-dismiss' => 'modal','id' => 'user_' . $data->ID_EMPRESA,'onclick' => "
																	$('#user_$data->ID_EMPRESA').fadeIn(300);
																	$('#lbl_id_establecimiento').text(' $data->ID_EMPRESA  ');
																	$('#lbl_nombre_establecimiento').text(' " . Html::encode ( $data->NOMBRE_COMERCIAL ) . " ');
																	$('#lbl_rfc').text('$data->RFC');                         
      
																	$('#hid_id_establecimiento').val('$data->ID_EMPRESA');

																	$('#userModal').modal('hide')	
																	return true;
																	" ] );} ] ] ] );?>
						
										    </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"> <?= Yii::t('backend', 'Close')?></button>

					</div>
				</div>
			</div>
		</div>
