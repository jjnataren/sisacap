<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model backend\models\Trabajador */
/* @var $form yii\widgets\ActiveForm */
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use backend\models\PuestoEmpresa;
use kartik\checkbox\CheckboxX;
use backend\models\Empresa;


$this->registerJs("$('#helppop1').popover('hide');", View::POS_END, 'my-options');
$this->registerJs("$('#help_popup_numero_integrantes').popover('hide');", View::POS_END, 'my-options1');
$this->registerJs("$('#help_popup_institucion_educativa').popover('hide');", View::POS_END, 'my-options2');
$this->registerJs("$('#help_popup_documento').popover('hide');", View::POS_END, 'my-options3');
$this->registerJs("$('#help_popup_rol').popover('hide');", View::POS_END, 'my-options4');
$this->registerJs("$('#help_popup_puesto').popover('hide');", View::POS_END, 'my-options5');
$this->registerJs("$('#help_popup_ocupacion').popover('hide');", View::POS_END, 'my-options6');
$this->registerJs("$('#help_popup_sector').popover('hide');", View::POS_END, 'my-options7');
$this->registerJs("$('#help_popup_ntcl').popover('hide');", View::POS_END, 'my-options8');

$dataListEntidad=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>1,'ACTIVO'=>1]), 'ID_ELEMENTO', 'NOMBRE');
$dataListMunicipios=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>2,'ACTIVO'=>1, 'ELEMENTO_PADRE'=>$model->ENTIDAD_FEDERATIVA]), 'ID_ELEMENTO', 'NOMBRE');
//$dataListNTCL= ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>10,'ACTIVO'=>1, 'ELEMENTO_PADRE'=>$model->NTCL]), 'ID_ELEMENTO', 'NOMBRE');

$dataListNTCL=ArrayHelper::map(Catalogo::findBySql('select tcc.ID_ELEMENTO, tcc.NOMBRE, (select NOMBRE FROM tbl_cat_catalogo where tcc.ELEMENTO_PADRE = ID_ELEMENTO) PADRE
from tbl_cat_catalogo tcc where categoria=7 AND tcc.ELEMENTO_PADRE IN (select id_elemento from tbl_cat_catalogo where elemento_padre = 2630 AND categoria = 8)
 ')->all(), 'ID_ELEMENTO', 'NOMBRE','PADRE');

$ListNTCL=ArrayHelper::map(Catalogo::findBySql('select tcc.ID_ELEMENTO, tcc.NOMBRE, (select NOMBRE FROM tbl_cat_catalogo where tcc.ELEMENTO_PADRE = ID_ELEMENTO) PADRE
from tbl_cat_catalogo tcc where categoria=7 AND tcc.ELEMENTO_PADRE IN (select id_elemento from tbl_cat_catalogo where elemento_padre = 2629 AND categoria = 8) 
 ')->all(), 'ID_ELEMENTO', 'NOMBRE');



$dataListSectores=ArrayHelper::map(Catalogo::findAll(['CATEGORIA'=>9,'ACTIVO'=>1]), 'ID_ELEMENTO', 'NOMBRE');

$dataListOcupacion=ArrayHelper::map(Catalogo::findBySql('select tcc.ID_ELEMENTO, tcc.NOMBRE, (select NOMBRE FROM tbl_cat_catalogo where tcc.ELEMENTO_PADRE = ID_ELEMENTO) PADRE
from tbl_cat_catalogo tcc where categoria=5 AND ELEMENTO_PADRE IS NOT NULL
 ')->all(), 'ID_ELEMENTO', 'NOMBRE','PADRE');

$datalistPuesto = ArrayHelper::map(PuestoEmpresa::findAll(['ID_EMPRESA'=>($model->iDEMPRESA->ID_EMPRESA_PADRE!==null)?$model->iDEMPRESA->ID_EMPRESA_PADRE:$model->iDEMPRESA->ID_EMPRESA]), 'ID_PUESTO', 'NOMBRE_PUESTO');


$itemsSex = [1=>'MUJER',2=>'HOMBRE'];
$itemsGrado = [0=>'Ninguno',1=>'Primaria',2=>'Secundaria',3=>'Bachillerato',4=>'Carrera tecnica',5=>'Licenciatura',6=>'Especialidad',7=>'Maestría',8=>'Doctorado'];
$itemsInstitucion =[1=>'Publica', 2=>'Privada'];
$itemsDocumentos = [1=>'Titulo',2=>'Certificado',3=>'Diploma',4=>'Otro'];

$this->registerJs(" 
		var ocupacion = $('#drop_ocup').val()


		if(ocupacion == 99999){


				//activacion
				$('#txt_giro_otro').removeAttr('disabled');
		}else{
					$('#txt_giro_otro').val('');
   				    $('#txt_giro_otro').attr('disabled','true');

		}


;", View::POS_READY, 'noneoptions_drop_functions');

$this->registerJs("$('#drop_ocup').change(function(){


		if(this.value == 99999){

		
				//activacion
				$('#txt_giro_otro').removeAttr('disabled');
		}else{
					$('#txt_giro_otro').val('');
   				    $('#txt_giro_otro').attr('disabled','true');

		}


});", View::POS_END, 'noneoptions_drop_functions');



?>
<div class="row">
<div class="trabajador-form">
	
    <?php $form = ActiveForm::begin(); ?>
    
      <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3><i class="fa fa-plus-square"></i>
						
						<?= Yii::t('backend', 'Nuevo trabajador ') ?> <small>Trabajador perteneciente a la empresa</small> </h3>	
					</div>
					<div class="panel-body">
		
 
 <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Datos del trabajador') ?></h3>
                </div>
                <div class="panel-body">


    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'APP')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'APM')->textInput(['maxlength' => 100]) ?>
       
    <?= $form->field($model, 'SEXO')->dropDownList($itemsSex,['prompt'=>'-- Seleccione  --','id' => 'tex-sex']) ?>
   
    <?= $form->field($model, 'CURP')->textInput(['maxlength' => 18]) ?>

     <?= $form->field($model, 'RFC')->textInput(['maxlength' => 13]) ?>

     <?= $form->field($model, 'NSS')->textInput(['maxlength' => 20]) ?>
        <div class="row">
	     <div class=" col-xs-12 col-sm-12 col-md-10">
	        <?= $form->field($model, 'PUESTO')->dropDownList($datalistPuesto,['prompt'=>'-- Seleccione  --','ID_PUESTO' => 'NOMBRE_PUESTO']) ?>
     </div>
	     <div class=" col-xs-12 col-sm-12 col-md-2">
		     <br />
				<button id="help_popup_puesto" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Lugar o espacio específico en el que la persona deberá desarrollar su actividad.. ') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
		</div>
    </div> 
    
     <div class="row">
	     <div class=" col-xs-12 col-sm-12 col-md-10">
	            <?= $form->field($model, 'OCUPACION_ESPECIFICA')->dropDownList($dataListOcupacion,['prompt'=>'-- Seleccione  --','ID_ELEMENTO' => 'NOMBRE','id'=>'drop_ocup']) ?>
     </div>
	     <div class=" col-xs-12 col-sm-12 col-md-2">
		     <br />
				<button id="help_popup_ocupacion" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Ocupación especifica que desarrolla en la empresa. ') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
		</div>
    </div>
    
       <?= $form->field($model, 'OTRO_OCUPACION')->textInput(['maxlength' => 200,'id'=>'txt_giro_otro']) ?>
   <!--   <div class="row">
	     <div class=" col-xs-12 col-sm-12 col-md-10">
	        <?= $form->field($model, 'ROL')->textInput(['maxlength' => 200]) ?> 
     </div>
	     <div class=" col-xs-12 col-sm-12 col-md-2">
		     <br />
				<button id="help_popup_rol" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Papel o funcion que cumple un trabajador. ') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
		</div>
    </div> -->
    
    <!--  <?= $form->field($model, 'FECHA_AGREGO')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY','readonly'=>'true']]) ?> -->
    
     </div>
     </div>
     
     
      
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Norma tecnica de competencia laboral') ?></h3>
                </div>
                <div class="panel-body">
                
                 <div class="row">
	     <div class=" col-xs-12 col-sm-12 col-md-10">
	     
	     
    <?= $form->field($model, 'SECTOR')->dropDownList($dataListSectores,['prompt'=>'-- Seleccione  --','id' => 'cat-sector-id']) ?>
    
  </div>
   <div class=" col-xs-12 col-sm-12 col-md-2">
		     <br />
				<button id="help_popup_sector" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Sector al cual pertenece  la norma técnica de competencia laboral en la que se encuentra  certificado el trabajador.. ') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
		</div>
  </div>
      <div class="row">
	     <div class=" col-xs-12 col-sm-12 col-md-10">
	     
	     
      <?= $form->field($model, 'NTCL')->widget(DepDrop::classname(), [
    'options' => ['id' => 'ntcl-sub-id'],
    'data'=>$dataListMunicipios,
    'pluginOptions' => [ 'depends' => ['cat-sector-id'],
        'placeholder' => 'Seleccione ...',		
        'url' => Url::to(['trabajador/get-normas'])
    ]
]); ?>
</div>
 <div class=" col-xs-12 col-sm-12 col-md-2">
		     <br />
				<button id="help_popup_ntcl" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Si el trabajador se encuentra certificado por alguna de estas normas técnicas de competencia laboral, debe especificarla aquí.. ') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
		</div>
</div>

</div>

</div>
     </div>
     
     
     <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Datos academicos') ?></h3>
                </div>
                <div class="panel-body">
     	   
     <?= $form->field($model, 'GRADO_ESTUDIO')->dropDownList($itemsGrado,['prompt'=>'-- Seleccione  --','id' => 'tx-grado']) ?>
     
     
      <div class="row">
	     <div class=" col-xs-12 col-sm-12 col-md-10">
	     	<?= $form->field($model, 'DOCUMENTO_PROBATORIO')->dropDownList($itemsDocumentos,['prompt'=>'-- Seleccione  --','id' => 'tx-probatorio']) ?>
     </div>
	     <div class=" col-xs-12 col-sm-12 col-md-2">
		     <br />
				<button id="help_popup_documento" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Son aquellos que son otorgados para certificar la aprobación o reconocimientos de un logro académico. ') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
		</div>
    </div> 
     
     <div class="row">
	     <div class=" col-xs-12 col-sm-12 col-md-10">
	     	<?= $form->field($model, 'INSTITUCION_EDUCATIVA')->dropDownList($itemsInstitucion,['prompt'=>'-- Seleccione  --','id' => 'name']) ?>
     </div>
	     <div class=" col-xs-12 col-sm-12 col-md-2">
		     <br />
				<button id="help_popup_institucion_educativa" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', ' Tipo de institución donde concluyo sus estudios. ') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
		</div>
    </div> 	   
     	   
     
     <div class="row">
	     <div class=" col-xs-12 col-sm-12 col-md-10">
	     <?= $form->field($model, 'FECHA_EMISION_CERTIFICADO')->widget('trntv\yii\datetimepicker\DatetimepickerWidget', ['clientOptions'=>['format' => 'DD/MM/YYYY', 'locale'=>'es','showClear'=>true, 'keepOpen'=>false]]) ?>
    					

	     </div>
	     <div class=" col-xs-12 col-sm-12 col-md-2">
		     <br />
				<button id="help_popup_numero_integrantes" data-placement="top" tabindex="0" type="button" class="btn btn-info btn-sm" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Fecha la cual concluyo sus estudios') ?>"><i class="fa fa-question-circle"></i>
			</button>	   
		</div>
    </div> 	   
    
       
     
  </div>
   </div>
   </div>
   

    
	 <div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Domicilio') ?></h3>
                </div>
                <div class="panel-body">				


    <!--  <?= $form->field($model, 'DOMICILIO')->textArea(['maxlength' => 300]) ?> -->
   
     <?= $form->field($model, 'ENTIDAD_FEDERATIVA')->dropDownList($dataListEntidad,['prompt'=>'-- Seleccione  --','id' => 'cat-id']) ?>
     
    

 <?= $form->field($model, 'MUNICIPIO_DELEGACION')->widget(DepDrop::classname(), [
    'options' => ['id' => 'subcat-id'],
    'data'=>$dataListMunicipios,
    'pluginOptions' => [ 'depends' => ['cat-id'],
        'placeholder' => 'Seleccione ...',		
        'url' => Url::to(['empresa/getmunicipios'])
    ]
]); ?>

     
      
    
    <?= $form->field($model, 'LUGAR_RESIDENCIA')->textInput(['maxlength' => 200]) ?>
    </div>
    </div>
    </div>
			<div class="col-md-6 col-xs-12">
            <div class="panel">
                <div class="panel-heading text-primary">
                    
                    <h3 class="panel-title"><?= Yii::t('backend', 'Contacto') ?></h3>
                </div>
                <div class="panel-body">		
    <?= $form->field($model, 'CORREO_ELECTRONICO')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'TELEFONO')->textInput(['maxlength' => 100]) ?>

   </div>
   </div>
   </div>
   
  
    



      

    
    

    
    	
   

</div>

<div class="panel-footer">
								<button id="helppop1" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Aquí podrás crear nuevos trabajadores para la empresa, Es importante llenar todos los campos correctamente. Presiona el botón [Crear] para guardar sus datos') ?>"><i class="fa fa-question-circle"></i>
						</button>
             <?= Html::submitButton( '<i class="fa fa-floppy-o"></i> Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
</div>
</div>
</div>
</div>