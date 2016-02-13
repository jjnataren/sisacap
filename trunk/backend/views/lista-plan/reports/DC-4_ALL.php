<?php
use backend\models\Catalogo; ?>

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
	
    <div style="width:21cm; height:26cm;">
		                
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
		
        </div>
        
        
          
          <div align="center" style="width:21cm; height:26cm; padding-top: 0.5cm" >
        
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
		

		
		
		
		
		
		<?php $i= 0; 
		
		
		
		for($j = 0;  $j < $no_constancias; $j++) :?>
	
		<?php if (isset($model->iDCONSTANCIAs[$j  +  ($inicio-1)])):
		
			$constancia = $model->iDCONSTANCIAs[$j  +  ($inicio-1)];
		
		?>
		
		<div>	
	
	
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
			
			/**
			@todo: revisar invertir el arreglo
			 */
			
			
			$a_fConst =  str_split(strtoupper(''.date("Ymd", strtotime(($model->iDPLAN->VIGENCIA_INICIO!==null)?$model->iDPLAN->VIGENCIA_INICIO:'1910-01-01'))));
			$a_fElab =  str_split(strtoupper(''.date("Ymd", strtotime(($model->iDPLAN->VIGENCIA_FIN!==null)?$model->iDPLAN->VIGENCIA_FIN:'1910-01-01'))));
			
			$a_fEmisionCertificado = ($constancia->FECHA_EMISION_CERTIFICADO!== null ) ? 
			str_split(strtoupper(''.date("Ymd", strtotime(($constancia->FECHA_EMISION_CERTIFICADO!==null)?$constancia->FECHA_EMISION_CERTIFICADO:'1900-01-01')))) : null;
			
			$a_fTerminoCurso = ($curso->FECHA_TERMINO!== null ) ? 
			str_split(strtoupper(''.date("Ymd", strtotime(($curso->FECHA_TERMINO!==null)?$curso->FECHA_TERMINO:'1900-01-01')))) : null;
			
			$ntcl = Catalogo::findOne(['CATEGORIA'=>Catalogo::CATEGORIA_NTCL, 'ID_ELEMENTO'=>$trabajador->NTCL]);
	
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
		
		
	</div>
   		
   		<?php endif;?>
   		 
   		 <?php endfor;?>
		
	</body>