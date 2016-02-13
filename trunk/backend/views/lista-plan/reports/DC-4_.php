<?php
use backend\models\Catalogo; ?>

	<body dir="ltr" style=" writing-mode:lr-tb; ">
	
	
		<?php

			$trabajador = $constancia->iDTRABAJADOR;

			$curso = $constancia->iDCURSO;
			
			$agente = $curso->iDINSTRUCTOR;
		
			$company = $model->iDPLAN->iDCOMISION->iDEMPRESA;
			
			$a_curp = str_split(strtoupper($trabajador->CURP));
			
			//$a_rfc = str_split(strtoupper($company->RFC));
			
			//$a_nss = str_split(strtoupper($company->NSS));
			
			$a_cp = str_split(strtoupper($company->CODIGO_POSTAL));
			
			$entidadFederativa =  Catalogo::findOne(['CATEGORIA'=>1, 'ID_ELEMENTO'=>$trabajador->ENTIDAD_FEDERATIVA]);
			
			$mpio =  Catalogo::findOne(['CATEGORIA'=>2, 'ID_ELEMENTO'=>$trabajador->MUNICIPIO_DELEGACION]);
			
			$giro =  Catalogo::findOne(['CATEGORIA'=>4, 'ID_ELEMENTO'=>$company->GIRO_PRINCIPAL]);
			
			$ocupacion =  Catalogo::findOne(['CATEGORIA'=>5, 'ID_ELEMENTO'=>$trabajador->OCUPACION_ESPECIFICA]);
			
			$areaTematica = Catalogo::findOne(['CATEGORIA'=>6, 'ID_ELEMENTO'=>$curso->AREA_TEMATICA]);

			$ntcl = Catalogo::findOne(['CATEGORIA'=>Catalogo::CATEGORIA_NTCL, 'ID_ELEMENTO'=>$trabajador->NTCL]);
			
			/**
			@todo: revisar invertir el arreglo
			 */
			
			
			$a_fConst =  str_split(strtoupper(''.date("Ymd", strtotime(($model->iDPLAN->VIGENCIA_INICIO!==null)?$model->iDPLAN->VIGENCIA_INICIO:'1910-01-01'))));
			$a_fElab =  str_split(strtoupper(''.date("Ymd", strtotime(($model->iDPLAN->VIGENCIA_FIN!==null)?$model->iDPLAN->VIGENCIA_FIN:'1910-01-01'))));
			
			$a_fEmisionCertificado = ($constancia->FECHA_EMISION_CERTIFICADO!== null ) ? 
			str_split(strtoupper(''.date("Ymd", strtotime(($constancia->FECHA_EMISION_CERTIFICADO!==null)?$constancia->FECHA_EMISION_CERTIFICADO:'1900-01-01')))) : null;
			
			$a_fTerminoCurso = ($curso->FECHA_TERMINO!== null ) ? 
			str_split(strtoupper(''.date("Ymd", strtotime(($curso->FECHA_TERMINO!==null)?$curso->FECHA_TERMINO:'1900-01-01')))) : null;
	
	?>
	
 
    <div style="width:21cm; height:26cm;" >
     <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:20px; padding-bottom:20px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell TextoIndicativo" align="center"><label>Datos del trabajador</label></td>
                        </tr>
                    </table>
                </div>
                
       <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px; padding-bottom:10px;" >
             
             	<table width="100%">
                	<tr>
                    	<td colspan="3" class="bordered_cell TextoIndicativo" align="center" width="50%"><label>Clave Única de Registro de Población</label></td>
                    	<td  class="bordered_cell TextoIndicativo" colspan="3" align="center" width="50%"><label>Ocupación especifica <span class="TextoDetalle">(consultar el catálogo al reverso)</span> </label></td>
                    	                                                
                    </tr>
                    <tr>
                    	<td colspan="3" class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" width="50%" align="center"><label><?=$trabajador->CURP; ?> </label></td>
                    	
                        <td colspan="3" class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center" width="50%"><label><?=   isset($ocupacion)? $ocupacion->NOMBRE : ' '; ?></label></td>                    
                     </tr>
                     
                     <tr>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" width="33%" align="center" ><label>Nombre</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" width="33%" align="center" ><label>Primer apellido</label></td>
                    	<td colspan="2" class="bordered_cell TextoIndicativo" width="34%" align="center"><label>Segundo apellido </label></td>
                    	
                    </tr>
                    
                    <tr>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="33%" align="center" ><label><?= $trabajador->NOMBRE;?>&nbsp;</label></td>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="33%" align="center" ><label><?= $trabajador->APP;?></label></td>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="34%" align="center"><label><?= $trabajador->APM;?> </label></td>
                    	
                    </tr>
                    
                     <tr>
                    	<td class="bordered_cell TextoIndicativo" colspan="2"  align="center" ><label>Código postal</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2"  align="center" ><label>Calle</label></td>
                    	<td  class="bordered_cell TextoIndicativo"  align="center"><label>Número exterior </label></td>
                        <td  class="bordered_cell TextoIndicativo"  align="center"><label>Número Interior </label></td>
                    	
                    </tr>
                    
                    <tr>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2"  align="center" ><label><?= $trabajador->CODIGO_POSTAL ;?>&nbsp;</label></td>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2"  align="center" ><label><?= $trabajador->CALLE;?></label></td>
                    	<td  class="cell_white_lrbt TextoUsuario"  align="center"><label><?= $trabajador->NUMERO_INTERIOR;?> </label></td>
                        <td  class="cell_white_lrbt TextoUsuario"  align="center"><label><?= $trabajador->NUMERO_EXTERIOR;?> </label></td>
                    	
                    </tr>
                    
                    <tr>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" width="33%" align="center" ><label>Colonia</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" width="33%" align="center" ><label>Municipio o Delegación</label></td>
                    	<td colspan="2" class="bordered_cell TextoIndicativo" width="34%" align="center"><label>Estado o Distrito Federal</label></td>
                    	
                    </tr>
                    
                    <tr>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="33%" align="center" ><label><?= $trabajador->COLONIA;?></label></td>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="33%" align="center" ><label><?=($mpio)? $mpio->NOMBRE:''?> </label></td>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="34%" align="center"><label><?=($entidadFederativa)? $entidadFederativa->NOMBRE:''?> </label></td>
                    	
                    </tr>
                    
                </table>
             
             </div>  
             
               <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:10px; padding-bottom:20px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell TextoIndicativo" align="center"><label>Datos de certificación de competencias laborales</label></td>
                        </tr>
                    </table>
                </div>   
                
                 <div align="center" style="width:21cm; padding-left:3px; padding-right:3px;" >
                
             
					<table width="100%" >
                       <tr>
                        	<td class="bordered_cell TextoIndicativo"  width="50%" align="center">
                            	<label >Nombre de la norma o estandar*</label>
                            </td>
                            <td width="50%" colspan="3" class="bordered_cell TextoIndicativo" align="center">
                            	<label >Fecha de emisión del certificado</label>                            	
                            </td>
                           
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lr">

                            </td>
                            <td colspan="3" class="cell_white_lr">
                            	
                            </td>
                            
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lr TextoUsuario">
                            	<label><?= isset($ntcl)? $ntcl->NOMBRE : '  '; ?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?= isset($a_fEmisionCertificado) ? $a_fEmisionCertificado[6].$a_fEmisionCertificado[7] : '';?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center" >
	                           	<label><?= isset($a_fEmisionCertificado) ? $a_fEmisionCertificado[4].$a_fEmisionCertificado[5] : '';?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?= isset($a_fEmisionCertificado) ? $a_fEmisionCertificado[0].$a_fEmisionCertificado[1].$a_fEmisionCertificado[2].$a_fEmisionCertificado[3] : '';?></label>
                            </td>
                           
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lrb">

                            </td>
                            <td colspan="3" class="cell_white_lrb">
                            	
                            </td>
                            
                        </tr>
                    </table>                
                </div>
                
                  <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:15px;" >
                
             
					<table width="100%" >
                       <tr>
                        	<td class="bordered_cell TextoIndicativo" colspan="7"  width="100%" align="center">
                            	<label >Datos académicos</label>
                            </td>
                           
                           
                        </tr>
                        <tr>
                        	<td colspan="3" width="60%" align="left" class="cell_white_lr TextoIndicativo">
								<label >Nivel Máximo de estudios terminados</label>
                            </td>
                            <td colspan="3" width="20%"  class="cell_white_lr TextoIndicativo">
                            	<label >Documento probatorio</label>
                            </td>
                            <td colspan="1" width="20%"  class="cell_white_lr TextoIndicativo">
                            	<label >Institución educativa*</label>
                            </td>
                            
                        </tr>
                        <tr>
                        	<td align="left" class="cell_white_l TextoIndicativo" valign="bottom">
                            	
                                <?php if ($trabajador->GRADO_ESTUDIO === 0): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                                
                                <label>0.Ninguna</label>
                            </td>
                            <td align="left" class="TextoIndicativo">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 3): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	
                            	<label>3.Bachillerato</label>
                            </td>
                            <td align="left" class="cell_white_r TextoIndicativo">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 6): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?><label>6.Maestria</label>
                            </td>
                            <td align="left" class="cell_white_l TextoIndicativo">
                            	
                            		 <?php if ($trabajador->DOCUMENTO_PROBATORIO === 1): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>1.Titulo</label>
                            </td>
                            <td colspan="1" align="left" class=" TextoIndicativo">
                            	
                            		 <?php if ($trabajador->DOCUMENTO_PROBATORIO === 4): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>4.Otro</label>
                            </td>
                             <td colspan="1" align="left" class="cell_white_r TextoIndicativo">
                            	<label>&nbsp;</label>
                            </td>
                            <td colspan="1" align="left" class="cell_white_lr TextoIndicativo">
                            	<?php if ($trabajador->INSTITUCION_EDUCATIVA === 1): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>1.Publica</label>
                            </td>
                            
                           
                        </tr>
                        
                        <tr>
                        	<td align="left" class="cell_white_l TextoIndicativo">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 1): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>1.Primaria</label>
                            </td>
                            <td align="left" class="TextoIndicativo">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 4): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	
                            	<label>4.Carrera Técnica</label>
                            </td>
                            <td align="left" class="cell_white_r TextoIndicativo">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 7): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>7.Especialidad</label>
                            </td>
                            <td align="left" class="cell_white_l TextoIndicativo">
                            	 <?php if ($trabajador->DOCUMENTO_PROBATORIO === 2): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>	
							<label>2.Certificado</label>
                            </td>
                            <td colspan="1" align="left" class="TextoIndicativo">
                            	<label>&nbsp;</label>
                            </td>
                             <td colspan="1" align="left" class="cell_white_r TextoIndicativo">
                            	<label>&nbsp;</label>
                            </td>
                            <td colspan="1" align="left" class="cell_white_lr TextoIndicativo">
                            	<?php if ($trabajador->INSTITUCION_EDUCATIVA === 2): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>2.Privada</label>
                            </td>
                            
                           
                        </tr>
                        
                           <tr>
                        	<td align="left" class="cell_white_lb TextoIndicativo" style="padding-bottom:15px;">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 2): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>2.Secundaria</label>
                            </td>
                            <td align="left" class="cell_white_b TextoIndicativo" style="padding-bottom:15px;">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 5): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>5.Licenciatura</label>
                            </td>
                            <td align="left" class="cell_white_rb TextoIndicativo" style="padding-bottom:15px;">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 8): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>8.Doctorado</label>
                            </td>
                            <td align="left" class="cell_white_lb TextoIndicativo" style="padding-bottom:15px;">
                            	 <?php if ($trabajador->DOCUMENTO_PROBATORIO === 3): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	
                            	<label>3.Diploma</label>
                            </td>
                            <td colspan="1" align="left" class="cell_white_b TextoIndicativo" style="padding-bottom:15px;">
                            	<label>&nbsp;</label>
                            </td>
                             <td colspan="1" align="left" class="cell_white_rb TextoIndicativo" style="padding-bottom:15px;">
                            	<label>&nbsp;</label>
                            </td>
                            <td colspan="1" align="left" class="cell_white_lrb TextoIndicativo" style="padding-bottom:15px;">
                            	<label>&nbsp;</label>
                            </td>
                            
                           
                        </tr>
                      
                    </table>                
                </div>
                
                  <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:15px; padding-bottom:20px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell TextoIndicativo" align="center"><label>Datos de capacitación</label></td>
                        </tr>
                    </table>
                </div>  
                
                 <div align="center" style="width:21cm; padding-left:3px; padding-right:3px;" >
                
             
					<table width="100%" >
                    
                    
                       <tr>
                        	<td  colspan="3" class="bordered_cell TextoIndicativo"  width="50%" align="center">
                            	<label >Nombre del curso</label>
                            </td>
                            <td width="50%" colspan="3" class="bordered_cell TextoIndicativo" align="center">
                            	<label >Duración (horas)</label>                            	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td colspan="3" class="cell_white_lrbt TextoUsuario"  width="50%" align="center">
                            	<label ><?=$curso->NOMBRE; ?>&nbsp;</label>
                            </td>
                            <td width="50%" colspan="3" class="cell_white_lrbt TextoUsuario" align="center">
                            	<label ><?=$curso->DURACION_HORAS; ?>&nbsp;</label>                        	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td colspan="3" class="bordered_cell TextoIndicativo"  width="50%" align="center">
                            	<label >Área tematica del curso (consultar cátalogo al reverso)</label>
                            </td>
                            <td width="50%" colspan="3" class="bordered_cell TextoIndicativo" align="center">
                            	<label >Fecha de término</label>                            	
                            </td>
                           
                        </tr>
                        <tr>
                        	<td colspan="3" align="center" class="cell_white_lr">

                            </td>
                            <td colspan="3" class="cell_white_lr">
                            	
                            </td>
                            
                        </tr>
                        <tr>
                        	<td align="center" colspan="3" class="cell_white_lr TextoUsuario">
                            	<label><?=trim(isset($areaTematica)?$areaTematica->NOMBRE:'') ?>&nbsp;</label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?=trim(isset($a_fTerminoCurso)?$a_fTerminoCurso[6].$a_fTerminoCurso[7]:'') ?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center" >
	                           	<label><?=trim(isset($a_fTerminoCurso)?$a_fTerminoCurso[4].$a_fTerminoCurso[5]:'') ?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?= isset($a_fTerminoCurso) ? $a_fTerminoCurso[0].$a_fTerminoCurso[1].$a_fTerminoCurso[2].$a_fTerminoCurso[3] : '';?></label>
                            </td>
                           
                        </tr>
                        <tr>
                        	<td align="center" colspan="3" class="cell_white_lrb">

                            </td>
                            <td colspan="3" class="cell_white_lrb">
                            	
                            </td>
                            
                        </tr>
                        
                         <tr>
                        	<td class="bordered_cell TextoIndicativo" colspan="3" width="50%" align="center">
                            	<label >Agente capacitador</label>
                            </td>
                            <td width="50%" colspan="3" class="bordered_cell TextoUsuario" align="left">
                            	<label >No registro agente capacitador ante la STPS o encaso de otro especificar (provedor de bienes y servicios extranjeros: STPS)</label>                            	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td  width="15%" align="left" style="padding-bottom:15px;" class="cell_white_lb TextoIndicativo">
                            	
                                <?php 
						
									if (isset($agente) && ($agente->TIPO_INSTRUCTOR === 1 || $agente->TIPO_INSTRUCTOR === 4 )): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>   
                                
                                <label>1.Interno</label>
                            </td>
                            <td width="15%" align="left" class="cell_white_lb TextoIndicativo" style="padding-bottom:15px;">
                            	  <?php 
						
									if (isset($agente) && ($agente->TIPO_INSTRUCTOR === 2 || $agente->TIPO_INSTRUCTOR === 3 )): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	
                            	<label>2.Externo</label>
                            </td>
                            <td width="20%" align="left" class="cell_white_lb TextoIndicativo" style="padding-bottom:15px;">
                            	<?php if (isset($agente) && ($agente->TIPO_INSTRUCTOR !== 1 && $agente->TIPO_INSTRUCTOR !== 2 && $agente->TIPO_INSTRUCTOR !== 3 && $agente->TIPO_INSTRUCTOR !== 4 )): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?> 
                            	
                            	<label>2.Otro</label>
                            </td>
                            <td width="50%" colspan="3" class="cell_white_lrbt TextoUsuario" align="center" style="padding-bottom:15px;">
                            	<label ><?= isset($agente)?$agente->NUM_REGISTRO_AGENTE_EXTERNO : ' ';?></label>                        	
                            </td>
                           
                        </tr>
                        
                        
                        
                    </table>                
                </div>
      
    			
                    <div align="center" style="width:21cm; padding-top:200px" >
             
             	
                </div> 
                
              </div>   
      
        
        <div style="width:21cm; height:26cm;" >
        
          <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:10px; padding-bottom:5px;" >
                
             
					<table width="100%" >
                    
                    
                       <tr>
                        	<td   class="bordered_cell TextoIndicativo"  width="50%" align="center">
                            	<label >Modalidad de la capacitación</label>
                            </td>
                            <td width="50%" class="bordered_cell TextoIndicativo" align="center">
                            	<label >Objetivo de la capacitación</label>                            	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            		<?php	if ($curso && $curso->MODALIDAD_CAPACITACION == 1 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                                     
                            	<label >1. Presencial</label>
                            </td>
                            <td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            	<?php	if (isset($curso) && $curso->OBJETIVO_CAPACITACION == 1 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	<label >1. Actualizar y perfeccionar conocimientos y habilidades y proporcionar información de nuevas tecnologías</label>                        	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            		<?php	if (isset($curso) && $curso->MODALIDAD_CAPACITACION == 2 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                                     
                            	<label >2. En linea</label>
                            </td>
                            <td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            	<?php	if ($curso && $curso->OBJETIVO_CAPACITACION == 2 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	<label >2. Prevenir riesgos de trabajo</label>                        	
                            </td>
                           
                        </tr>
                        
                          <tr>
                        	<td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            		<?php	if (isset($curso) && $curso->MODALIDAD_CAPACITACION == 3 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                                     
                            	<label >3. Mixta</label>
                            </td>
                            <td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            	<?php	if (isset($curso) && $curso->OBJETIVO_CAPACITACION == 3 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	<label >3. Incrementar la productividad </label>                        	
                            </td>
                           
                        </tr>    
                        
                        <tr>
                        	<td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                                     
                            	<label >&nbsp;</label>
                            </td>
                            <td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            	<?php	if (isset($curso) && $curso->OBJETIVO_CAPACITACION == 4 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	<label >4. Mejorar el nivel educativo </label>                        	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td  class="cell_white_lrb TextoUsuario"  width="50%" align="left">
                            
                                     
                            	<label >&nbsp;</label>
                            </td>
                            <td  class="cell_white_lrb TextoUsuario"  width="50%" align="left">
                            
                            	<?php	if (isset($curso) && $curso->OBJETIVO_CAPACITACION == 5): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	<label >5. Preparar para ocupar vacantes o puestos de nueva creación </label>                        	
                            </td>
                           
                        </tr>
                        
                     </table>
                     
             </div>
             
                          <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px; padding-top:5px;" >
             
             	<table width="100%">
                	<tr>
                    	<td class="cell_white_lrbt">
                        	
                               <p class="P30">
                                   	<span class="T25">Notas e instrucciones</span><br />
			<span class="T25">- Llenar a máquina o con letra de molde.</span><br />
			<span class="T25">- Entregar el formato a la autoridad laboral solamente en original.</span><br />
			<span class="T25">- El Catálogo Nacional de Ocupaciones se encuentra disponible en el reverso de la segunda parte del formato DC-4 y en la página www.stps.gob.mx</span><br />

			<span class="T25">- El catálogo de áreas temáticas se encuentra disponible en el reverso de la segunda parte del formato DC-4 y en la página www.stps.gob.mx</span><br />

			<span class="T25">- En caso de que el trabajador haya recibido más de una constancias de competencias o de habilidades laborales, deberá proporcionar del apartado “Datos del Trabajador” únicamente su nombre y los datos de capacitación las veces que sean necesario en el formato DC-4 (segunda parte), así como  en su caso, los datos que requiera actualizar. </span><br />
			
			<span class="T25">- La falta de información en los datos opcionales, no será motivo para negar la presentación respectiva.</span><br />
								
			<span class="T25">* Datos no obligatorios</span>
                                
                        
                        </td>
                    </tr>
                  </table>
                  
                  
               </div>      
               
               <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:10px; padding-bottom:10px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell TextoIndicativo" align="center"><label>Claves y denominaciones de área y subáeras del Catálogo Nacional de Ocupaciones</label></td>
                        </tr>
                    </table>
               </div>
               
    	<div style="width:21cm; "  id="Marco1">
				<!--Next 'div' was a 'draw:text-box'.-->
				
					<table  width="100%">
						
						<tr >
							<td style="text-align:center;width:20%; " class="bordered_cell TextoDetalle">
								CLAVE DEL ÁREA/SUBÁREA
							</td>
							<td style="text-align:center;width:30%; " class="bordered_cell TextoDetalle">
								
									DENOMINACIÓN
								
							</td>
							
							<td style="text-align:center;width:20%; " class="bordered_cell TextoDetalle">
								CLAVE DEL ÁREA/SUBÁREA
							</td>
							<td style="text-align:center;width:30%; " class="bordered_cell TextoDetalle">
									DENOMINACIÓN
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								01
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Cultivo, crianza y aprovechamiento
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Transporte
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								01.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Agricultura y silvicultura
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Ferroviario
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								01.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Ganadería
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Autotransporte
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								01.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Pesca y acuacultura
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Aéreo
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Marítimo y fluvial
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Extracción y suministro
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicios de apoyo
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Exploración
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Extracción
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Provisión de bienes y servicios
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Refinación y beneficio
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Comercio
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Provisión de energía
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Alimentación y hospedaje
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Provisión de agua
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Turismo
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Deporte y esparcimiento
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								03
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Construcción
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicios personales
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								03.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Planeación y dirección de obras
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.6
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Reparación de artículos de uso doméstico y personal
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								03.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Edificación y urbanización
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.7
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Limpieza
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								03.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Acabado
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.8
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicio postal y mensajería
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								03.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Instalación y mantenimiento
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								08
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Gestión y soporte administrativo
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Tecnología
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								08.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Bolsa, banca y seguros
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Mecánica
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								08.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Administración
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Electricidad
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								08.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicios legales
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Electrónica
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Informática
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								09
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Salud  y protección social
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Telecomunicaciones
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								09.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicios médicos
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.6
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Procesos industriales
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								09.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Inspección sanitaria y del medio ambiente
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								09.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Seguridad social
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Procesamiento y fabricación
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								09.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Protección de bienes y/o personas
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Minerales no metálicos
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Metales
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Comunicación
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Alimentos y bebidas
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Publicación
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Textiles y prendas de vestir
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Radio, cine, televisión y teatro
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Materia orgánica
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Interpretación artística
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.6
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Productos químicos
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Traducción e interpretación lingüística
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.7
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Productos metálicos y de hule y plástico
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Publicidad, propaganda y relaciones públicas
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.8
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Productos eléctricos y electrónicos
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.9
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Productos impresos
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								11
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Desarrollo y extensión del conocimiento
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								11.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Investigación
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								11.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Enseñanza
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								11.3
							</td>
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								Difusión cultural
							</td>
						</tr>
					</table>
				
			</div>			           
                
         
      </div>          
 
	<div style="width:21cm; height:26cm;" >
    
    <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:15px; padding-bottom:10px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell TextoIndicativo" align="center"><label>Claves y denominacioones del catálogo de áreas temáticas de los cursos</label></td>
                        </tr>
                    </table>
               </div>
               
               
<div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:15px; padding-bottom:10px;"  >
					<table width="100%">
						
						<tr >
							<td style="text-align:center;" class="bordered_cell TextoUsuario">
								CLAVE DEL ÁREA 
							</td>
							<td style="text-align:center;" class="bordered_cell TextoUsuario">
								DENOMINACIÓN
							</td>
							<td style="text-align:center;" class="bordered_cell TextoUsuario">
								CLAVE DEL ÁREA 
							</td>
							<td style="text-align:center;" class="bordered_cell TextoUsuario">
								DENOMINACIÓN
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								1000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Producción general
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								6000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Seguridad
							</td>
						</tr>
						<tr class="Tabla63">
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								2000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicios
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								7000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Desarrollo personal y familiar
							</td>
						</tr>
						<tr class="Tabla63">
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								3000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Administración, contabilidad y economía
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								8000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								
									Uso de tecnologías de la información y  comunicación
								
							</td>
						</tr>
						<tr class="Tabla63">
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								4000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Comercialización
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								9000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								
									Participación social
								
							</td>
						</tr>
						<tr class="Tabla63">
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								5000
							</td>
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								Mantenimiento y reparación
							</td>
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								<p class="P34"> 
							</td>
						</tr>
					</table>
				</div>
                
         </div>       
    
    
	</body>