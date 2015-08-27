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
use backend\models\EmpresaUsuario;
$this->title = 'Reporte de constancia Id '.$model->ID_CONSTANCIA;

$this->registerJs("$('#help_popup_carnera').popover('hide');", View::POS_END, 'noneoptions234');


?>



<body  >
                    <!-- title row -->
                    
                    
                   <div style="text-align: center;  border: 5px solid navy;">
							
							<div style="text-align: right; ">
								<img alt="" src="<?=$model->iDCURSO->iDPLAN->iDCOMISION->iDEMPRESA->PICTURE ?>"  height="80px" width="90px"/>
							</div>                   
                   			
                   
                            <h2 class="page-header">
                            	
                                <?= strtoupper( $model->iDCURSO->iDPLAN->iDCOMISION->iDEMPRESA->NOMBRE_RAZON_SOCIAL); ?>                               
                            </h2>
                            
                            <h3>Otorga la presente</h3>
                            
                            
                            <h1>CONSTANCIA</h1>
                            
                            <p><b>A: </b> 
                            
                            	<?= strtoupper($model->iDTRABAJADOR->NOMBRE. ' '.$model->iDTRABAJADOR->APP.  ' '. $model->iDTRABAJADOR->APM  ) ?>
                            </p>
                            
                            <p>Por haber completado exitosamente el curso de:</p>
                            
                            <p>
                            
                            	<b><?= strtoupper($model->iDCURSO->NOMBRE); ?></b>
                            </p>
                            
                            
                            <p>Impartido del 
                            
                            	<?php $date = new DateTime( $model->iDCURSO->FECHA_INICIO );

                            	 if ($date)
                            	 	echo $date->format('d/m/Y');
                            	?>
                            	
                            	al
                            	
                            	<?php $dateTermino = new DateTime( $model->iDCURSO->FECHA_TERMINO );

                            	 if ($dateTermino)
                            	 	echo $dateTermino->format('d/m/Y');
                            	?>
                            	
                            	con una duración de 
                            	
                            	<?= $model->iDCURSO->DURACION_HORAS ?>
                            	
                            	horas
                            	
                            	
                            </p>
                            
                            <p>
                            
                            <?php

                        			
                        			$municipio = Catalogo::findOne($model->iDCURSO->iDPLAN->iDCOMISION->iDEMPRESA->MUNICIPIO_DELEGACION);
                        			$entidad = Catalogo::findOne($model->iDCURSO->iDPLAN->iDCOMISION->iDEMPRESA->ENTIDAD_FEDERATIVA);
                        			
                        			echo isset($municipio)?$municipio->NOMBRE.', ':'';
                        			echo isset($entidad)?$entidad->NOMBRE.' a ':'';
                        			
                        			setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
                        		                        			
                        			echo isset ($model->FECHA_EMISION_CERTIFICADO)?  strftime("%d de %B de %Y", strtotime($model->FECHA_EMISION_CERTIFICADO)): '';
                        					
                        			?>
                            </p>
                            
                            
                            <p>
		                        <table >
		                        
		                        	<tr>
		                        		<td colspan="5" style="height: 100px;" />
		                        	</tr>
		                        
		                        	<tr>
		                        	
		                        		<td width="100px" />
		                        		<td width="400px" style="text-align: center;">
		                        			<?php echo $model->iDCURSO->iDINSTRUCTOR->NOMBRE; ?>
		                        		
		                        		</td>
		                        		<td width="50px" />
		                        		<td width="400px" style="text-align: center;">
		                        		
		                        		 	<?php 

		                        		 		$company = EmpresaUsuario::getMyCompany();
		                        		 	
		                        		 		echo $company->iDEMPRESA->iDREPRESENTANTELEGAL->NOMBRE;
		                        		 	?>
		                        		</td>
		                        		<td width="100px" />
		                        	
		                        	</tr>
		                        	
		                        	<tr>
		                        		<td width="100px" />
		                        		<td width="400px" style="text-align: center; height: 50px;">
		                        		 &nbsp;
		                        		</td>
		                        		<td width="50px" />
		                        		<td width="400px" style="text-align: center;">
		                        		&nbsp;
		                        		</td>
		                        		<td width="100px" />
		                        	</tr>
		                        	
		                        	<tr>
		                        		<td width="100px" />
		                        		<td width="400px" style="border-top-style: solid; 
		                        								 border-top-width:1px; border-top-color:#000000; text-align: center;">
		                        		
		                        			Instructor  del curso
		                        		</td>
		                        		<td width="50px" />
		                        		<td width="400px"  style="border-top-style: solid; 
		                        								 border-top-width:1px; border-top-color:#000000; text-align: center;">
		                        		Representante legal de la empresa
		                        		</td>
		                        		<td width="100px" />
		                        	</tr>
		                        	
		                   
		                        	
		                        	<tr>
		                        		<td colspan="5" style="height: 50px;" />
		                        	
		                        	</tr>
		                        
		                        </table>
		                        
		                   </p>         
                            
                   </div>
                   
             
             

               
       </body>
 
 
