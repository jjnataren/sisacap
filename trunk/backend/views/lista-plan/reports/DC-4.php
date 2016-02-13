<?php
use backend\models\Catalogo;

$this->title = 'Reporte Id '.$model->ID_LISTA.'   DC4 parte 1 ';
?>
	<body dir="ltr" style=" writing-mode:lr-tb; ">
	
	
		<?php 
			$company = $model->iDPLAN->iDCOMISION->iDEMPRESA;
			
			$a_rfc = str_split(strtoupper($company->RFC));
			
			$a_nss = str_split(strtoupper($company->NSS));
			
		
			
			$a_cp = str_split(strtoupper($company->CODIGO_POSTAL));
				
			$a_cp = (isset($a_cp))? array_reverse($a_cp) : $a_cp;
			
			
			$entidadFederativa =  Catalogo::findOne(['CATEGORIA'=>1, 'ID_ELEMENTO'=>$company->ENTIDAD_FEDERATIVA]);
			
			$mpio =  Catalogo::findOne(['CATEGORIA'=>2, 'ID_ELEMENTO'=>$company->MUNICIPIO_DELEGACION]);
			
			$giro =  Catalogo::findOne(['CATEGORIA'=>4, 'ID_ELEMENTO'=>$company->GIRO_PRINCIPAL]);
			
			/**
			@todo: revisar invertir el arreglo
			 */
			
			$modelEst = $model->iDESTABLECIMIENTOs;
			
			$establecimientos = count($model->iDESTABLECIMIENTOs);
			
			$a_establecimientos = str_split(strtoupper(''.$establecimientos));
			
			$a_fConst =  str_split(strtoupper(''.date("Ymd", strtotime(($model->iDPLAN->VIGENCIA_INICIO!==null)?$model->iDPLAN->VIGENCIA_INICIO:'1910-01-01'))));
			$a_fElab =  str_split(strtoupper(''.date("Ymd", strtotime(($model->iDPLAN->VIGENCIA_FIN!==null)?$model->iDPLAN->VIGENCIA_FIN:'1910-01-01'))));
			
			$fpdof = new \DateTime( $model->FECHA_P_DOF);
	
			if ($fpdof)
				$a_fpdof =  str_split(date_format($fpdof, "Ymd"));
				
				$fsoli = new \DateTime( $model->FECHA_SOLICITUD);
	
			if ($fsoli)
				$a_fsoli =  str_split(date_format($fsoli, "Ymd"));	
			
			
	
	?>
	
	    
        	
                
                <div align="center" style="width:21cm; padding-bottom:15px; padding-top:15px;" class="Titulos">
                	<label  >Lista de constancias de competencias o habilidades laborales</label>
                </div>
                
            
                
                <div align="center" style="width:21cm; padding-left:3px; padding-right:3px;" >
                
             
					<table width="100%" >
                       <tr>
                        	<td class="bordered_cell TextoIndicativo"  width="33%" align="center">
                            	<label >Homoclave del formato</label>
                            </td>
                            <td width="33%" colspan="3" class="bordered_cell TextoIndicativo" align="center">
                            	<label >Fecha de publicación del formato en el DOF</label>                            	
                            </td>
                             <td width="33%" class="bordered_cell TextoIndicativo" align="center">
                            	<label  class="">Expediente</label>                            	
                            </td>
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lr">

                            </td>
                            <td colspan="3" class="cell_white_lr">
                            	
                            </td>
                             <td class="cell_white_lr">
                            	
                            </td>
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lr TextoUsuario">
                            	<label>DC-4</label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?= isset($a_fpdof) ? $a_fpdof[6].$a_fConst[7] : '';?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center" >
	                           	<label><?= isset($a_fpdof) ? $a_fpdof[4].$a_fpdof[5] : '';?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?= isset($a_fpdof) ? $a_fpdof[0].$a_fpdof[1].$a_fpdof[2].$a_fpdof[3] : '';?></label>
                            </td>
                             <td class="cell_white_r TextoUsuario">
                             <label><?= $model->EXPEDIENTE; ?></label>
                            	
                            </td>
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lrb">

                            </td>
                            <td colspan="3" class="cell_white_lrb">
                            	
                            </td>
                             <td class="cell_white_lrb">
                            	
                            </td>
                        </tr>
                    </table>                
                </div>

             
                
                <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:10px; padding-bottom:10px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell Titulos" align="center"><label>Datos de la empresa</label></td>
                        </tr>
                    </table>
                </div>
                
              
             <div style="width:21cm; padding-bottom:10px;" >
                <div align="center" style="width:48%; float:left; padding-left:3px; padding-right:3px;" >
                	<table width="100%">
                    	<tr>
                        	<td style="padding-left:5px;" class="TextoIndicativo cell_white_lrt"  align="left"><label>Registro federal de contribuyentes con homoclave (DHCP):</label></td>
                                                     
                        </tr>
                        <tr>
                        	<td class="TextoIndicativo cell_white_lr"  align="left"><label></label></td>
                                                
                        </tr>
                        <tr>
                        	<td class="TextoUsuario cell_white_lrb"align="center"><label><?=$company->RFC; ?></label></td>
                                                    
                        </tr>
                        <tr>
                        	<td style="padding-left:5px;" class="TextoIndicativo cell_white_lrt"  align="left"><label>Clave Única de Registro de Población CURP 
                            (<span class="TextoDetalle">En caso de ser persona fisica</span>)*:</label></td>
                                                     
                        </tr>
                        <tr>
                        	<td class="TextoIndicativo cell_white_lr"  align="left"><label></label></td>
                                                
                        </tr>
                        <tr>
                        	<td class="TextoUsuario cell_white_lrb"  align="center"><label><?=($company->CURP) ? $company->CURP:'&nbsp;'; ?></label></td>
                                                    
                        </tr>
                        
                        <tr>
                        	<td style="padding-left:5px; padding-bottom:5px;" class="TextoIndicativo cell_white_lrbt"  align="left"><label>Denominación o razón social: <span class="TextoUsuario"><?=$company->NOMBRE_RAZON_SOCIAL?></span></label></td>
                                                     
                        </tr>
                        
                           <tr>
                        	<td style="padding-left:5px; padding-bottom:5px;" class="TextoIndicativo cell_white_lrbt"  align="left"><label>Registro patronal del IMSS: <span class="TextoUsuario"><?=$company->NSS?></span></label></td>
                                                     
                        </tr>
                        
                    </table>
                </div>
                 <div align="center" style="width:48%; float:right; padding-left:3px; padding-right:3px;" >
                	<table width="100%">
                    	<tr>
                        
                        
                            <td colspan="6" class="TextoIndicativo cell_white_lrt"  style=" padding-bottom:5px;" align="left"><label>Periodo de vigencia del plan 
                            	<span class="TextoDetalle">(no debe exceder a 2 años)</span>:</label>
                            </td> 
                            
                                                       
                        </tr>
                        
                        <tr>
                        
                        
                            <td colspan="6" class="TextoIndicativo cell_white_lr"  align="left">
                            </td> 
                            
                                                       
                        </tr>
                        
                        <tr>
                        
                        
                            <td  class="TextoIndicativo cell_white_lr"  align="left">
                            <label>Del: &nbsp;<span class="TextoUsuario">  <?= $a_fConst[6].$a_fConst[7];?></span></label>
                            </td> 
                            <td  class="TextoUsuario cell_white_lr"  align="center">
                             <label> <?= $a_fConst[4].$a_fConst[5];?></label>
                            </td> 
                            <td  class="TextoUsuario cell_white_1"  align="center">
                             <label> <?= $a_fConst[0].$a_fConst[1].$a_fConst[2].$a_fConst[3];?></label>
                            </td> 
                            <td  class="TextoIndicativo cell_white_r"  align="left">
                            <label>al:  <span class="TextoUsuario"><?=$a_fElab[6].$a_fElab[7];?></span></label>
                            </td> 
                             <td  class="TextoUsuario cell_white_lr"  align="center">
                             <label><?=$a_fElab[4].$a_fElab[5]?></label>
                            </td>
                             <td  class="TextoUsuario cell_white_lr"  align="center">
                             <label><?=$a_fElab[0].$a_fElab[1].$a_fElab[2].$a_fElab[3]; ?></label>
                            </td>
                            
                                                       
                        </tr>
                        	
                         <tr>
                        
                        
                            <td colspan="6" class="TextoIndicativo cell_white_lr"  align="left">
                            </td> 
                            
                                                       
                        </tr>
                     
                        <tr>
                
                
                            <td colspan="6" class="TextoIndicativo cell_white_lrbt"  align="left" style="padding-bottom:10px; padding-bottom:10px;">
                            <label>Numero de establecimiento considerados en esta lista: &nbsp;<span class="TextoUsuario"> <?=$establecimientos; ?></span></label>
                            </td>                            
                        </tr>
                    </table>
                </div>
                
                
               </div> 
             
             
             <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px; padding-bottom:10px;" >
             
             	<table width="100%">
                	<tr>
                    	<td class="bordered_cell TextoIndicativo" align="center" width="30%"><label>Código postal</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" align="center" width="30%"><label>Calle</label></td>
                    	<td class="bordered_cell TextoIndicativo" align="center" width="20%"><label>Número exterior</label></td>
                    	<td class="bordered_cell TextoIndicativo"align="center" width="20%"><label>Número interior</label></td>                                                                        
                    </tr>
                    <tr>
                    	<td class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center"><label><?=$company->CODIGO_POSTAL; ?> </label></td>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2" style="padding-bottom:8px;" align="center"><label><?= $company->CALLE; ?></label></td>                    
                        <td class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center"><label><?= $company->NUMERO_EXTERIOR; ?></label></td>                    
                        <td class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center"><label><?= $company->NUMERO_INTERIOR; ?></label></td>                    
                     </tr>
                     
                     <tr>
                    	<td class="bordered_cell TextoIndicativo" align="center" ><label>Colonia</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" align="center" ><label>Municipío o delegación</label></td>
                    	<td colspan="2" class="bordered_cell TextoIndicativo" align="center"><label>Estado o Distrito Federal</label></td>
                    	
                    </tr>
                    <tr>
                    	<td class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center"><label><?= $company->COLONIA; ?></label></td>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2" style="padding-bottom:8px;" align="center"><label><?=trim(isset($mpio)?$mpio->NOMBRE:'') ?></label></td>                    
                        <td colspan="2" class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center"><label><?=trim(isset($entidadFederativa)?$entidadFederativa->NOMBRE:'') ?></label></td>                    
                                         
                     </tr>
                      <tr>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" align="center" ><label>Telefono(s)</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" align="center" ><label>Correo electrónico</label></td>
                    	<td  class="bordered_cell TextoIndicativo" align="center"><label>Fax*</label></td>
                    	
                    </tr>
                    <tr>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2" style="padding-bottom:4px;" align="center"><label><?= $company->TELEFONO; ?></label></td>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2" style="padding-bottom:4px;" align="center"><label><?= $company->CORREO_ELECTRONICO;?></label></td>                    
                        <td class="cell_white_lrbt TextoUsuario" style="padding-bottom:4px;" align="center"><label><?= $company->FAX;?></label></td>                    
                                         
                     </tr>
                     
                     <tr>
                    	<td class="bordered_cell TextoIndicativo" colspan="5" align="center" ><label>Actividad o giro principal</label></td>
                        
                      </tr>
                       <tr>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="5" style="padding-bottom:4px;" align="center"><label><?=trim(isset($giro)?$giro->NOMBRE:''); ?></label></td>
                  
                  		</tr>
                </table>
             
             </div>
                
                
              
                
              <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px; padding-bottom:10px;" >
                <table width="100%">
                    <tr>
                    <td class="bordered_cell TextoIndicativo" align="center" valign="middle" rowspan="2" width="16%"><label>Número de contancias expedidas</label></td>
                    <td class="bordered_cell TextoIndicativo" align="center" ><label>Hombres</label></td>
                    <td class="bordered_cell TextoIndicativo" align="center" ><label>Mujeress</label></td>
                    <td class="bordered_cell TextoIndicativo" align="center" ><label>Total</label></td>
                    
                  </tr>
                  	
                    <tr>
                    	<td class="cell_white_lrbt TextoUsuario"  style="padding-bottom:4px;" align="center"><label><?= $model->CONSTANCIAS_HOMBRES; ?></label></td>
                        <td class="cell_white_lrbt TextoUsuario"  style="padding-bottom:4px;" align="center"><label><?= $model->CONSTANCIAS_MUJERES;?></label></td>
                        <td class="cell_white_lrbt TextoUsuario"  style="padding-bottom:4px;" align="center"><label><?= $model->CONSTANCIAS_HOMBRES + $model->CONSTANCIAS_MUJERES;?></label></td>
                  	</tr>
                  	
              </table>
            </div>
            
            
            
             <div align="center" style="width:21cm; padding-bottom:10px;  padding-left:3px; padding-right:3px;" >
             
             	<table width="100%">
                	<tr>
                    	<td class="cell_white_lrt TextoIndicativo"  colspan="14" style="padding-left:15px; padding-right:85px;" align="Left">
                        	<label>Los datos se proporcionan bajo protesta de decir verdad, apercibidos de la responsabilidad en que incurre todo aquél que no se conduce con verdad.</label>
                      	</td>
                       
                      </tr>
                      <tr>
                            <td class="cell_white_1 TextoUsuario"  align="center">
                            </td>
                          
                            <td colspan="3"  class="TextoUsuario"  align="left">
                            
                            <?php 
					  
								  $representante = $model->iDPLAN->iDEMPRESA->iDREPRESENTANTELEGAL;
								  
								  if ($representante->SIGN_PICTURE !== NULL && $representante->SIGN_PASSWD !== NULL  ): ?>
								  
									<img  src="<?='data:image/' . 'gif' . ';base64,'.$representante->getSigningBinary(); ?>" style="height:1.5cm;width:4cm;" />
									
							<?php endif;?>
										
                            </td>
                            
                            
                            <td colspan="10" class="cell_white_r TextoUsuario"  align="center">
                             
                            </td>
                            
                            
                            
                        </tr>
                       <tr>
                            <td class="cell_white_1 TextoUsuario"  align="center">
                            </td>
                            <td class="TextoUsuario" colspan="3" align="center" style="vertical-align: bottom;">
                            	<?= ($representante)? $representante->NOMBRE .' ' .$representante->APP .' '.$representante->APM : ''; ?>
                            </td>
                          
                            
                            <td class="TextoUsuario"  align="center">
                            </td>
                             <td class="TextoUsuario"  align="center">
                             	<label><?= $model->LUGAR_INFORME; ?></label>
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                            <td class="cell_white_r TextoUsuario"  align="center">
                             	<label><?= isset($a_fsoli) ? $a_fsoli[6].$a_fsoli[7] : '';?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario"  align="center">
                             	<label><?= isset($a_fsoli) ? $a_fsoli[4].$a_fsoli[5] : '';?></label>
                            </td>
                            <td class=" TextoUsuario"  align="center">
                             	<label><?= isset($a_fsoli) ? $a_fsoli[0].$a_fsoli[1].$a_fsoli[2].$a_fsoli[3] : '';?></label>
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                             <td class="cell_white_r TextoUsuario"  align="center">
                            </td>
                            
                        </tr>
                        <tr>
                        	<td class="cell_white_lr" colspan="14"></td>
                        </tr>
                        
                        <tr>
                            <td class="cell_white_1"  align="center">
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                            	
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                             <td class="cell_white_t TextoUsuario"  align="center">
                             	
                            </td>
                            <td class="TextoUsuario cell_white_t"  align="center">
                            </td>
                            <td class="TextoUsuario cell_white_t"  align="center">
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                             	
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                             	
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                             	
                            </td>
                            <td class="TextoUsuario "  align="center">
                            </td>
                             <td class="cell_white_r TextoUsuario"  align="center">
                            </td>
                            
                        </tr>
                    
                         <tr>
                            <td colspan="4" class="cell_white_lb TextoIndicativo"  style="padding-bottom:8px;" align="center">
                            	<label>Nombre y firma solicitante o representante legal</label>
                            </td>
                          
                            <td colspan="5" class="cell_white_b TextoIndicativo"  align="center">
                            	<label>Lugar y fecha de elaboración de este informe</label>
                            </td>
                             
                            <td colspan="4" class="cell_white_b TextoIndicativo"  align="center">
                            	<label>Fecha de la solicitud</label>
                            </td>
                           
                            <td  class="cell_white_rb TextoIndicativo"  align="center">
                           	</td>
                            
                            
                          </tr>  
                </table>
             </div>
            
       
            
             <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px;" >
             
             	<table width="100%">
                	<tr>
                    	<td class="cell_white_lrbt">
                        	
                                                    <p class="P30">
                                    <span class="T22"> </span>
                                    <span class="T25">Notas e instrucciones</span><br />
                                    <span class="T25">-  Llenar a máquina o con letra de molde.</span><br />
                                    <span class="T25">-  Escribir arriba de cada dígito de la homoclave del Registro Federal de Contribuyentes, la palabra número. Ejemplos: número 0, número 1, número 2,etc.</span><br />
                                    <span class="T25">-  Entregar el formato a la autoridad laboral solamente en original. En su caso, puede presentar una copia si requiere que se le acuse de recibo.</span><br />
                        
                                    <span class="T25">-  La empresa o patrón deberá conservar copia de las constancias reportadas en la o las listas de constancias presentadas ante la autoridad laboral en el formato DC-4 durante el último año.</span><br />
                        
                                    <span class="T25">-  Las empresas deberán adjuntar la información de los trabajadores y de cada constancia de competencias o de habilidades laborales entregada a los trabajadores capacitados.</span><br />
                                    
                                    <span class="T25">-  La falta de información en los datos opcionales, no será motivo para negar la presentación respectiva.</span><br />
                                    
                                    <span class="T25">-  Consultas sobre el trámite llamar a la Dirección General de Capacitación al teléfono 2000-5126 y al correo electrónico registro@stps.gob.mx</span><br />
                                    
                                    <span class="T25">* Datos no obligatorios</span>
                                </p>
                        
                        </td>
                    </tr>
                  </table>
                  
               </div>
               
                <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px; " >
             
             	<table width="100%">
                	<tr>
                    <td class="T25" style="font-style:italic; padding-left:25px; padding-right:25px;" align="center" >De conformidad con los articulos 4 y 69-M, Fracción V de la Ley Federal de Procedimiento Administrativo, los formatos para solicitar trámites y servicios deberán publicarse en el Diario oficial de la Federación  (DOF) </td>
                    </tr>
                   </table> 
                </div> 
                

       
          <div align="center" style="width:21cm; height:21cm; padding-top: 0.5cm" >
        
		<table border="0" cellspacing="0" cellpadding="0" width="100%" >
	
			<tr >
				<td colspan="4" style="text-align:center; padding-left:140px; padding-right:140px;" class="bordered_cell TextoIndicativo">
					
						<span class="">Establecimientos considerados en la lista de constancias de competencias o de habilidades laborales de capacitación, adiestramiento y productividad</span>
					
				</td>
			</tr>
			<tr >
				<td style="text-align:center;width:3cm; " class="bordered_cell TextoIndicativo">
					<label>Número consecutivo</label>
				</td>
				<td style="text-align:center;width:8cm; padding-left:40px; padding-right:40px; " class="bordered_cell TextoIndicativo">
					<label>Domicilio</label><br />
						<span class="TextoDetalle">(Anotar el domicilio conforme a los datos solicitados en el anverso de este formato, para cada establecimiento adicional)</span>
					
				</td>
				<td style="text-align:center;width:7cm; " class="bordered_cell TextoIndicativo">
					<label>R.F.C. con homoclave (SHCP)</label>
				</td>
				<td style="text-align:center;width:3cm; " class="bordered_cell TextoIndicativo">
					<label>Registro patronal del I.M.S.S.</label>
				</td>
			</tr>
			
			
			<?php for($i=0; $i<50; $i++){?>
			<tr >
				<td style="text-align:center; " class="cell_white_lr TextoUsuario">
					<label>
						
						<?php
						if (isset($modelEst[$i]))
						echo $i + 1;

						?></label>
				</td>
				<td style="text-align:left; padding-left:5px;" class="cell_white_r TextoUsuario">
					<label>
						<?php 
						
							if (isset($modelEst[$i])){
								
							$entidad =  Catalogo::findOne(['CATEGORIA'=>1, 'ID_ELEMENTO'=>$modelEst[$i]->ENTIDAD_FEDERATIVA]);
						
							$municipio =  Catalogo::findOne(['CATEGORIA'=>2, 'ID_ELEMENTO'=>$modelEst[$i]->MUNICIPIO_DELEGACION]);
						
							echo ''.strtoupper($modelEst[$i]->NOMBRE_CENTRO_TRABAJO) . ' ';
							echo (strlen(trim($modelEst[$i]->NOMBRE_CENTRO_TRABAJO)) > 0) ?  ': ' : ' ';
							echo 'Calle '; 
							echo (strlen(trim($modelEst[$i]->CALLE)) > 0) ?  $modelEst[$i]->CALLE : 'S/N ';

							echo ', No Ext ';
							echo  (strlen(trim($modelEst[$i]->NUMERO_EXTERIOR)) > 0) ? $modelEst[$i]->NUMERO_EXTERIOR :  'S/N';
							echo ',  No Int ';
							echo (strlen(trim($modelEst[$i]->NUMERO_INTERIOR )) > 0) ? $modelEst[$i]->NUMERO_INTERIOR : 'S/N';
							echo ', C.P. ';
							echo (strlen(trim($modelEst[$i]->CODIGO_POSTAL )) > 0) ? $modelEst[$i]->CODIGO_POSTAL : 'S/N';
							echo ', Col.'; 
							echo (strlen(trim($modelEst[$i]->COLONIA)) > 0) ? $modelEst[$i]->COLONIA : 'S/N';
							echo ', Edo. ';
							echo  ($entidad !== null)?$entidad->NOMBRE : 'S/N';
							echo ', Mpio/Del. ';
							echo ($municipio!== null)?$municipio->NOMBRE : 'S/N';
						}
						else
							echo '&nbsp;';
						
						?></label>
				</td>
				<td style="text-align:left; padding-left:5px;"  class="cell_white_r TextoUsuario">
					<label>
						<?php
						if (isset($modelEst[$i]))
							echo $modelEst[$i]->RFC;
						?></label>
				</td>
				<td style="text-align:left; padding-left:5px;"  class="cell_white_lr TextoUsuario">
					<label>
						<?php
						if (isset($modelEst[$i]))
							echo $modelEst[$i]->NSS;
						?></label>
				</td>
			</tr>
			<?php }?>
			
			<tr>
				<td class="cell_white_lb TextoUsuario" >&nbsp;</td>
				<td class="cell_white_lb TextoUsuario" >&nbsp;</td>
				<td class="cell_white_lb TextoUsuario" >&nbsp;</td>
				<td class="cell_white_lrb TextoUsuario" >&nbsp;</td>
			</tr>
			
		</table>
        
        </div>
        

	</body>