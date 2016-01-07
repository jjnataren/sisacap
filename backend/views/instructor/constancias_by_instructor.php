<?php


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\Constancia;
use backend\models\Instructor;
use backend\models\Trabajador;
use backend\models\Catalogo;
use yii\helpers\ArrayHelper;
use backend\models\PuestoEmpresa;
use yii\grid\GridView;
use kartik\checkbox\CheckboxX;
use backend\models\EmpresaUsuario;




$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-file-pdf-o fa-stack-1x"></i>
							   </span>';




$this->title = 'Constancias por evaluar ';











?>
		

		
		<?php $form = ActiveForm::begin([ 'options'=>['layout' => 'horizontal',  'id'=>'form2'],]); ?>
		
					<div class="table-responsive">		
						<table id="dataTable1" class="table table-condensed" >
							<thead>
								
								<tr >
									<th colspan="4" style="text-align: left;" ><i class="fa fa-user fa-lg"></i> &nbsp; <small class="text-muted">Datos trabajador</small></th>	
									<th colspan="6" style="text-align: left;"><i class="fa fa-file-pdf-o fa-lg"></i>&nbsp; <small class="text-muted">Datos constancia</small></th>
								</tr>
								<tr >
									<th>Id</th>
									<th>'Nombre</th>									
									<th>'CURP'</th>
									<th>'Puesto'</th>
									<th>Obtención</th>
									<th>Tipo</th>									
									<th>Promedio</th>
									<th>Aprobado</th>
									<th>Estatus</th>
									<th>Descargar constancia</th>
								
																		
								</tr>
							</thead>
							<tbody>
					
							
							
					
							</tbody>
							<tfoot>
								<tr>
									<td colspan="11"></td>
								</tr>
							</tfoot>
						</table>					
					</div>
					
				 

