<?php


$this->title = 'Bienvenido ' .strtoupper($model->NOMBRE_RAZON_SOCIAL);

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-building fa-lg  fa-stack-1x"></i>
							   </span>';
//$this->registerJs("$('#dataTable1').dataTable( {'language': {'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json' }});", View::POS_END, 'my-options');


?>
				<!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                      <i class="glyphicon glyphicon-copyright-mark"></i>
                                    </h3>
                                    <p>
                                                                     
                                        Cursos por impartir
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_comision">
                                  DC-1  More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                      <i class="glyphicon glyphicon-calendar"></i>
                                                                               </h3>
                                    <p>
                                        Constancias por firmar
                                        
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_plan">
                                 DC-2   More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                    <i class="fa  fa-file-pdf-o"></i>
                                    
                                        
                                        
                                       
                                    </h3>
                                    <p>
                                        Trabajadores por califcar
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_constancia1">
                                   DC-3 More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                     
                    </div><!-- /.row -->
                    
                    
                     <h4 class="page-header" id="anchor_comision">
          
                        <small>Cursos por impartir</small>
          </h4> 
          
          
          
               
<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">
		 <div class="box box-info" id="controls">
				
				<div class="box-header">
					 <i class="fa fa-laptop"></i>
			    	
			    								
								<div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
							
			    	
			    	 <h3 class="box-title">   
							
							<?//= Yii::t('backend', 'Cursos') ?><small> Cursos por impartir </small> 
							
							
							
					 </h3>
			   	</div>
				
				<div class="box-body table-responsive">
						
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Fecha de inicio</th>
								<th>Fecha de fin</th>
								<th>Modalidad capacitación</th>
							    <th>Área temática</th>
							   
							 
							    <th>  </th>
							  
							 </tr>					
						</thead>
						
						<tbody>
														
																	
							        			
         			             
         			   
							
						</tbody>
					</table>
					
				</div>
				
				<div class="box-footer">
				
				
				</div>
				
			</div>
  </div>
</div>
          
          
          
          
          
          
          <div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">
		 <div class="box box-info" id="controls">
				
				<div class="box-header">
					<i class="fa fa-file-pdf-o"></i>
			    	
			    								
								<div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
							
			    	
			    	 <h3 class="box-title">   
							
							<?//= Yii::t('backend', 'Cursos') ?><small> Constancias de trabajadores por firmar</small> 
							
							
							
					 </h3>
			   	</div>
				
				<div class="box-body table-responsive">
						
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Curso</th>
								<th>Fecha emisión</th>
								<th>Obtención</th>
								<th>Tipo</th>
							    <th>Área temática</th>
							    <th>Nombre</th>
							    <th>Apellidos</th>
							   <th>Curp</th>
							    <th>Ocupación</th>
							    <th>plan</th>
							    <th>Establecimiento</th>
							    <th>empresa</th>
		   						   						   
							   
							 
							    <th>  </th>
							  
							 </tr>					
						</thead>
						
						<tbody>
														
																	
							        			
         			             
         			   
							
						</tbody>
					</table>
					
				</div>
				
				<div class="box-footer">
				
				
				</div>
				
			</div>
  </div>
</div>
          
          
          
          
          
          
     