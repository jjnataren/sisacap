  
  <h5>
  	Le informamos que ha sido emitida  una constancia de capacitación, adiestramiento y productividad por parte de la epresa:
  	<strong><?= $model->iDCURSO->iDPLAN->iDCOMISION->iDEMPRESA->NOMBRE_RAZON_SOCIAL; ?></strong>  
  </h5>
  
  
		<div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                    <div class="box-body">
                    
                    <h2>Datos de la constancia</h2>
                    
                    <dl style='border-top-color:#3C8DBC; border-right-color:#3C8DBC; border-top-style: solid; background-color: #F4F4F4;  border-right-style: solid; font-family: "Times New Roman", Serif;'>
                        <dt style="color: Black; "><?= Yii::t('backend', 'Id de la constancia') ?></dt>
                        <dd><b><?= md5($model->ID_CONSTANCIA) ?></b></dd>

                        <dt><?= Yii::t('backend', 'Nombre curso') ?></dt>
                        <dd><?= $model->iDCURSO->NOMBRE ?></dd>
                        
                        <dt><?= Yii::t('backend', 'Iniciado el día') ?></dt>
                        <dd><?= $model->iDCURSO->FECHA_INICIO ?>
					
						</dd>
                        
                        <dt><?= Yii::t('backend', 'Finalizado el día') ?></dt>
                       <dd><?= $model->iDCURSO->FECHA_TERMINO ?></dd>
                        
                        <dt><?= Yii::t('backend', 'Con una duración de ') ?></dt>
                         <dd><?= $model->iDCURSO->DURACION_HORAS . ' hrs' ?></dd>
                                                
                        <dt>Estatus</dt>
                        <dd><?= ($model->APROBADO) ? 'APROBADO' : 'NO APROBADO';?> </dd>
                                    
                    </dl>
                    
                   
                    
                </div><!-- /.box-body -->
         
            </div>
        </div>    
        
        
        <div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                    <div class="box-body">
                    
                    <h2>Datos del trabajador</h2>
                    
                    <dl  style='border-top-color:#3C8DBC; border-right-color:#3C8DBC; border-top-style: solid; background-color: #F4F4F4;  border-right-style: solid; font-family: "Times New Roman", Serif;'>
                        <dt><?= Yii::t('backend', 'ID') ?></dt>
                        <dd><?= $model->iDTRABAJADOR->ID_TRABAJADOR; ?></dd>

                        <dt><?= Yii::t('backend', 'Nombre completo ') ?></dt>
                        <dd><?= $model->iDTRABAJADOR->NOMBRE .' ' . $model->iDTRABAJADOR->APP .' ' . $model->iDTRABAJADOR->APM    ?> </dd>
                        
                        <dt><?= Yii::t('backend', 'CURP') ?></dt>
                        <dd><?=  $model->iDTRABAJADOR->CURP; ?></dd>
                        
                        <dt><?= Yii::t('backend', 'Puesto') ?></dt>
                       <dd><?= isset( $model->iDTRABAJADOR->pUESTO) ?  $model->iDTRABAJADOR->pUESTO->NOMBRE_PUESTO : '<i class="text text-muted">no asignado</i>' ?></dd>
                                                    
                                     
                    </dl>
                    
                   
                    
                </div><!-- /.box-body -->
                
                
            </div>
        </div>    
  
  
   <div class="box-footer">
                 
                 
                <h3>
                 	Puede descargar su constancia en el siguiente enlace :
                 	
                 
                 	
                 	<?php if($model->DOCUMENTO_PROBATORIO !== null) :?>
                 	
                 	<a href="<?=  Yii::getAlias('@frontendUrl') . '/constancias' ?>">
                 	       Descargar constancia          	
                 	</a>
                 	
                 	<br />
                 
                 	
                 	<?php echo "Si no puede ver el link, copie y pegue la siguiente url <br />".   Yii::getAlias('@frontendUrl') . '/constancias' ; ?>
                 	
                 	<br />
                 	Deberas ingresar tu <strong>RFC y el id de la constancia</strong> <br />
                 	<br />
                 	<br />
                 	
                 	<strong>ID CONSTANIA:  <?=  md5($model->ID_CONSTANCIA)  ?></strong>
                 	
                 	<?php else:?>
                 	
                 	<p class="text text-warning"><small><i>Constancia no disponible contacte al administrador</i></small> </p>
                 	
                 	<?php endif;?>
                 	
                </h3> 
		  </div>