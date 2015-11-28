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

$this->params['breadcrumbs'][] = ['label' => 'Curso Id '.$model->ID_CURSO ,'url'=>['constancias/course-by-instructor','id'=>$model->ID_CURSO ] ];

$this->params['breadcrumbs'][] = ['label' => 'Constancia Id '.$model->ID_CONSTANCIA ];


?>




<div class="callout callout-warning">
	<h4><i class="fa fa-info-circle"></i> Resumen de la Constancia</h4>
	<p>- Esta es solo una pre visualización el comprobante, puede imprimir el comprobante  <br />
		
	
	</p>
</div>



<?php $form = ActiveForm::begin([
	'action'=>['updatebyinstructor','id'=>$model->ID_CONSTANCIA]
		
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
                        
                        	<?= Html::a('<i class="fa fa-download"></i> Descargar en comprobante', ['constancia-comprobante-pdf', 'id'=>$model->ID_CONSTANCIA],  ['target' => '_blank', 'class'=>"btn btn-primary" ]) ?>
                            
                                          												  '
                												  
                			
                							  
                            
                        </div>
                    </div>
       </section>
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
 
 
 

 
 

