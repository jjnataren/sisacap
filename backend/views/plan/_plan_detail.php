<?php


use yii\helpers\Html;
use yii\web\View;
use yii\web\plan;
use yii\grid\GridView;
use backend\models\catalogo;

$this->registerJs("$('#help_popup_rol').popover('hide');", View::POS_END, 'my-options4');

?>

	

	
				<table class="table table-condensed table-hover">
				
					<thead>
						<tr>
						<th style="text-align: left;"><h2><i class="fa fa-calendar fa-lg"></i>&nbsp;Plan Id <?=$model->ID_PLAN?></h2></th>
						<th style="text-align: right;">
						    <?= Html::a('<i class="fa fa-cogs"></i>	Administrar plan', ['plan/dashboard', 'id' => $model->ID_PLAN], ['class' => 'btn btn-info']) ?>
					         &nbsp;
					        <?= Html::a('<i class="fa fa-trash"></i> Borrar', ['plan/deletebycomisiones', 'id' => $model->ID_PLAN], [
					                     'class' => 'btn btn-danger',
					            'data' => [
					                'confirm' => '¿Seguro que quieres borrar este plan?',
					                'method' => 'post',
					            ],
					        ]) ?></th>
						</tr>
					</thead>
		
				<tbody>	
					<tr>
						<td style="vertical-align:middle;" class="text text-primary">Alias</td>
						<td><?= $model->ALIAS?></td>		  
						
				    </tr>
				    <tr>
						<td>Modalidad de la capacitación</td>
						<td><?php if ($model->MODALIDAD_CAPACITACION=== 1)
										echo "Plan y programas específicos de la empresa";
									elseif ($model->MODALIDAD_CAPACITACION=== 2)
										echo "Plan y programas comunes de un grupo de empresas";
									elseif ($model->MODALIDAD_CAPACITACION=== 3)
										echo "Sistema general de una rama de actividad económica";?></td>
					</tr>
				
					<tr>
						<td>Total trabajadores hombres</td>
						<td><?= $model->TOTAL_HOMBRES?></td>
					</tr>
					<tr>
						<td>Total trabajadores mujeres</td>
						<td><?= $model->TOTAL_MUJERES?></td>
					</tr>
					<tr>
						<td>Fecha inicio del plan</td>										
                        <td><?=($model->VIGENCIA_INICIO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->VIGENCIA_INICIO)) ;?></td>
					</tr>
					<tr>
						<td>Fecha fin del plan </td>
						<td><?=($model->VIGENCIA_FIN === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->VIGENCIA_FIN)) ;?></td>
						
					</tr>
				
					<tr>
						<td>Numero de etapas</td>
						<td><?= $model->NUMERO_ETAPAS?></td>
					</tr>
					
				
					
			</tbody>
				
			</table>
		
			
			 <h4>
			 	<i class="fa fa-line-chart"></i>
				Resultados de la evaluación de los objetivos del plan de capacitación.<br />
				<small> Señalado del 1 al 5 en donde 1 es el más importante</small>
			</h4>
			
		
			<table class="table table-bordered table-condensed table-hover">
			
				<thead>
					<tr>
						<th>Descripción del objetivo</th>
						<th>Valor</th>
					</tr>
				</thead>
			
				<tbody>
					<tr>
					
						<td>Actualizar y perfeccionar conocimientos y habilidades y proporcionar información de nuevas tecnologías</td>
						<td><?= $model->OBJETIVO1?></td>
					</tr>
					
					<tr>
						<td>Prevenir riesgos de trabajo</td>
						<td><?= $model->OBJETIVO2?></td>
					</tr>
					
					<tr>
						<td>Incrementar la productividad</td>
						<td><?= $model->OBJETIVO3?></td>
					</tr>
					
						<tr>
						<td>Mejorar el nivel educativo</td>
						<td><?= $model->OBJETIVO4?></td>
					</tr>
					
						<tr>
						<td>Preparar para ocupar vacantes o puestos de nueva creación</td>
						<td><?= $model->OBJETIVO5?></td>
					</tr>
					
					
					
		</tbody>
	</table>



		

			    <h4>
			    		<i class="fa fa-laptop"></i>
						<?= Yii::t('backend', 'Cursos') ?>
						<br /><small> Que serán impartidos dentro de este plan  </small>
				</h4>
			
			<table class="table table-bordered table-condensed table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Area temática</th>
						<th>Fecha de inicio</th>
						<th>Fecha de fin</th>
					
					</tr>					
				</thead>
				
				<tbody>
				
				<?php foreach ($model->cursos as $curso):?>
				
					<tr>
						<td><?= $curso->ID_CURSO ?></td>
						<td><?= $curso->NOMBRE ?></td>
						<td><?php
						$cur = \backend\models\Catalogo:: findone(['ID_ELEMENTO'=>$curso-> AREA_TEMATICA, 'CATEGORIA'=>6, 'ACTIVO'=>1]);
         			echo isset($cur)?$cur->NOMBRE: 'no asignado'; ?>
						</td>
			
					    <td><?=($curso->FECHA_INICIO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($curso->FECHA_INICIO)) ;?></td>
						
						<td><?=($curso->FECHA_TERMINO === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($curso->FECHA_TERMINO)) ;?></td>
						
						
					</tr>
				<?php endforeach;?>	
				</tbody>
			</table>
			
			
			
			
			

	