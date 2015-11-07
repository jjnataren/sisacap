<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use common\models\User;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\RepresentanteLegal;
use backend\models\RepresentanteLegalSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = Yii::t ( 'backend', 'Administrar empresa' );
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Empresas',
		'url' => [ 
				'index'     
		] 
];
$this->params ['breadcrumbs'] [] = [ 
		'label' => $model->NOMBRE_RAZON_SOCIAL,
		'url' => [ 
				'view',
				'id' => $model->ID_EMPRESA 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;


$this->registerJs("$('#userpop2').popover('hide');", View::POS_END, 'my-options');
$this->registerJs("$('#ownerpop').popover('hide');", View::POS_END, 'my-options1');
$this->registerJs("$('#ownerpop').popover('hide');", View::POS_END, 'my-options1');

?>

<div class="row">

	<h2>
	 							<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-building fa-lg  fa-stack-1x"></i>
							   </span>
	<?= Html::encode(strtoupper(substr($model->NOMBRE_RAZON_SOCIAL,0,40).'...')) ?><small> &nbsp;Empresa</small></h2>






	<div class=" col-xs-12 col-sm-12 col-md-6">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><i class="fa fa-suitcase"></i> <?= Yii::t('backend', 'Representante Legal') ?><small>&nbsp;&nbsp;<?= Yii::t('backend', 'Propietario de la empresa') ?>.</small> </h3>
				
			</div>
			<div class="panel-body">
			
			<?php if ( isset($model->iDREPRESENTANTELEGAL)){ ?>
			
				<?= DetailView::widget([
        'model' => $model->iDREPRESENTANTELEGAL,
        'attributes' => [
            'ID_REPRESENTANTE_LEGAL',
            'NOMBRE',
            'APP',
            'APM',
            'CORREO_ELECTRONICO',
            'TELEFONO',
            'DOMICILIO',           
            //'ACTIVO',
        ],
		'options' =>['class' => 'table table-condensed'],
    ]) ?>
			
			<?php } else{
				
				echo Yii::t('backend', 'not set');
				
			}?>
			
			
			</div>
			
			<div class="panel-footer">
						
				
						
						<button id="userpop2" tabindex="0" class="btn" role="button" data-toggle="popover" data-trigger="focus" title="Ayuda" data-content="<?=Yii::t('backend', 'Presiona el boton [Seleccionar] para elijir un representante legal. ') ?>"><i class="fa fa-question-circle"></i></button>
						
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#legalModal" id="userButton" >
						 <i class="fa fa-check-square"></i>&nbsp;<?= Yii::t('backend', 'Seleccionar')?>
                        </a>
                        
                        
                        
                        <div class="modal fade" id="legalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><?=Yii::t('backend', 'Seleccionar un representante legal para esta empresa') ?></h4>
                                        </div>
	                                        <div class="modal-body">
	                                         	 <?php \yii\widgets\Pjax::begin(); ?>	
	                                        	  <?= GridView::widget([
												        'dataProvider' => $dataProvider_lr,
												        'filterModel' => $searchModel_lr,
												        'columns' => [
												
												
												            'ID_REPRESENTANTE_LEGAL',
												            'NOMBRE',
												            'APP',
												            'APM',
												           // 'FEC_NAC',
												            // 'CURP',
												            // 'RFC',
												            // 'DOMICILIO',
												            'TELEFONO',
												            'CORREO_ELECTRONICO',
												            // 'ACTIVO',
												            // 'NSS',
												
												           [
															'label'=>'',
															'format'=>'raw',
															'value' => function($data){
																	
																return  Html::a(Yii::t('backend', 'Agregar') .'&nbsp;<i class="fa fa-check-circle-o"></i>', Url::current(['id_legal'=>$data->ID_REPRESENTANTE_LEGAL]),
																		['class' => 'btn btn-primary',
																		'data-loading-text'=>"Loading...",
																		'id'=>'legal_'.$data->ID_REPRESENTANTE_LEGAL,
																		'onclick'=>"
																		//$('#legal_$data->ID_REPRESENTANTE_LEGAL').removeAttr('href');
																		$('#legal_$data->ID_REPRESENTANTE_LEGAL').fadeIn(300);
																		$('#legal_$data->ID_REPRESENTANTE_LEGAL').text('...');
																		$('#legal_$data->ID_REPRESENTANTE_LEGAL').removeClass('btn btn-primary').addClass('btn btn-success');
																		return true;
																		",
																		]
																);
															}
															],
				
												        ],
												    ]); ?>
									<?php \yii\widgets\Pjax::end(); ?>
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> <?= Yii::t('backend', 'Salir')?></button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        
		
			</div>
		</div>

		
	</div>
	<div class=" col-xs-12 col-sm-12 col-md-6 ">
	
				<div class="panel panel-default">
			<div class="panel-heading"><h3><i class="fa fa-users"></i> <?= Yii::t('backend', 'Usuarios') ?><small>&nbsp;&nbsp;<?= Yii::t('backend', ' que pueden administrar la empresa') ?>.</small></h3></div>
			<div class="panel-body">
			
		<table class="table">
		<thead>
			<tr>
				<th><?= Yii::t('backend', 'Id'); ?></th>
				<th><?= Yii::t('backend', 'Nombre'); ?></th>
				<th><?= Yii::t('backend', 'E-mail'); ?></th>
				<th><?= Yii::t('backend', 'Registrado desde'); ?></th>
				<th><?= Yii::t('backend', 'Borrar'); ?></th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($model->empresaUsuarios as $user) : ?>
		
		<?php if ($user->iDUSUARIO->role != User::ROLE_INSTRUCTOR):?>
			<tr>
				<td><?= $user->iDUSUARIO->id;?></td>
				<td><?= $user->iDUSUARIO->username;?></td>
				<td><?= $user->iDUSUARIO->email;?></td>
				<td><?= $user->FECHA_AGREGO;?></td>
				<td><?php echo Html::a('<i class="fa fa fa-user-times"></i>', ['empresa/deleteuser', 'id'=>$model->ID_EMPRESA, 'id_user'=>$user->ID_USUARIO],['class'=>'btn btn-danger',  'data-confirm'=>'¿Realmente quiere desasignar este usuario?'] ); ?></td>
				
			</tr>			
		<?php endif;?>	
		<?php endforeach;?>	
		</tbody>
	</table>
	
	
			
			
			</div>
			
			<div class="panel-footer">
						
						<button id="ownerpop" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Presiona el boton [Agregar] y acontinuación selecciona el usuario') ?>"><i class="fa fa-question-circle"></i>
						</button>
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#userModal" id="userButton">
							<i class="fa fa-user-plus"></i>&nbsp;<?= Yii::t('backend', 'Agregar')?>
                            </a>
                            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="Salir" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><?=Yii::t('backend', 'Añadir un usuario manager a esta empresa') ?></h4>
                                        </div>
	                                        <div class="modal-body">
	                                        	 <?php \yii\widgets\Pjax::begin(); ?>	
	                                        	 
	                                        	  <?= GridView::widget([
											        'dataProvider' => $dataProvider,
											        'filterModel' => $searchModel,
											        'columns' => [
											            'id',
											            'username',
											            'email:email',
											            [
											                'class'=>\common\components\grid\EnumColumn::className(),
											                'attribute'=>'role',
											                'enum'=>User::getRoles(),
											                'filter'=>User::getRoles()
											            ],
											           /* [
											                'class'=>\common\components\grid\EnumColumn::className(),
											                'attribute'=>'status',
											                'enum'=>User::getStatuses(),
											                'filter'=>User::getStatuses()
											            ],*/
											           // 'created_at:datetime',
											            // 'updated_at',
														[
														'label'=>'',
														'format'=>'raw',
														'value' => function($data){
																	
															return  Html::a('<i class="fa fa-user-plus"></i>', Url::current(['id_u'=>$data->id]), 
																							['class' => 'btn btn-primary',
																							'data-loading-text'=>"Loading...",
																							'id'=>'user_'.$data->id,
																							'onclick'=>"  
																										//$('#user_$data->id').removeAttr('href');
																										$('#user_$data->id').fadeIn(300);
																										$('#user_$data->id').text('Agregando ...');
																										$('#user_$data->id').removeClass('btn btn-primary').addClass('btn btn-success');
																									return true;  
																										",
																							]
																							);
														}
														],
											      
											        ],
											    ]); ?>
											    	    	<?php \yii\widgets\Pjax::end(); ?>
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> <?= Yii::t('backend', 'Salir')?></button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
       		 </div>
		</div>
			
	</div>

  



</div>


<div class="row">

<div class=" col-xs-12 col-sm-12 col-md-6 ">
	
				<div class="panel panel-default">
			<div class="panel-heading"><h3><i class="fa fa-graduation-cap"></i> <?= Yii::t('backend', 'Instructores') ?><small>&nbsp;&nbsp;
			<?= Yii::t('backend', ' que evaluaran los cursos de la empresa') ?>.</small></h3></div>
			<div class="panel-body">
			
		<table class="table">
		<thead>
			<tr>
				<th><?= Yii::t('backend', 'Id'); ?></th>
				<th><?= Yii::t('backend', 'Nombre'); ?></th>
				<th><?= Yii::t('backend', 'E-mail'); ?></th>
				<th><?= Yii::t('backend', 'Registrado desde'); ?></th>
				<th><?= Yii::t('backend', 'Borrar'); ?></th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($model->empresaUsuarios as $user) : ?>
		 <?php if ($user->iDUSUARIO->role === User::ROLE_INSTRUCTOR):?>
			<tr>
				<td><?= $user->iDUSUARIO->id;?></td>
				<td><?= $user->iDUSUARIO->username;?></td>
				<td><?= $user->iDUSUARIO->email;?></td>
				<td><?= $user->FECHA_AGREGO;?></td>
				<td><?php echo Html::a('<i class="fa fa fa-user-times"></i>', ['empresa/deleteuser', 'id'=>$model->ID_EMPRESA, 'id_user'=>$user->ID_USUARIO],['class'=>'btn btn-danger',  'data-confirm'=>'¿Realmente quiere desasignar este usuario?'] ); ?></td>
				
			</tr>			
		<?php endif;?>	
		<?php endforeach;?>	
		</tbody>
	</table>
	
	
			
			
			</div>
			
			<div class="panel-footer">
						
						<button id="ownerpop" tabindex="0" type="button" class="btn" data-toggle="popover" title="Ayuda" data-content="<?=Yii::t('backend', 'Presiona el boton [Agregar] y acontinuación selecciona el usuario') ?>"><i class="fa fa-question-circle"></i>
						</button>
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#instructorModal" id="userButton">
							<i class="fa fa-user-plus"></i>&nbsp;<?= Yii::t('backend', 'Agregar')?>
                            </a>
                            <div class="modal fade" id="instructorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="Salir" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><?=Yii::t('backend', 'Añadir un usuario instructor a esta empresa') ?></h4>
                                        </div>
	                                        <div class="modal-body">
	                                        	 <?php \yii\widgets\Pjax::begin(); ?>	
	                                        	 
	                                        	  <?= GridView::widget([
											        'dataProvider' => $instructorDataProvider,
											        'filterModel' => $searchModel,
											        'columns' => [
											            'id',
											            'username',
											            'email:email',
											            [
											                'class'=>\common\components\grid\EnumColumn::className(),
											                'attribute'=>'role',
											                'enum'=>User::getRoles(),
											                'filter'=>User::getRoles()
											            ],
											           /* [
											                'class'=>\common\components\grid\EnumColumn::className(),
											                'attribute'=>'status',
											                'enum'=>User::getStatuses(),
											                'filter'=>User::getStatuses()
											            ],*/
											           // 'created_at:datetime',
											            // 'updated_at',
														[
														'label'=>'',
														'format'=>'raw',
														'value' => function($data){
																	
															return  Html::a('<i class="fa fa-user-plus"></i>', Url::current(['id_u'=>$data->id]), 
																							['class' => 'btn btn-primary',
																							'data-loading-text'=>"Loading...",
																							'id'=>'user_'.$data->id,
																							'onclick'=>"  
																										//$('#user_$data->id').removeAttr('href');
																										$('#user_$data->id').fadeIn(300);
																										$('#user_$data->id').text('Agregando ...');
																										$('#user_$data->id').removeClass('btn btn-primary').addClass('btn btn-success');
																									return true;  
																										",
																							]
																							);
														}
														],
											      
											        ],
											    ]); ?>
											    	    	<?php \yii\widgets\Pjax::end(); ?>
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> <?= Yii::t('backend', 'Salir')?></button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
       		 </div>
		</div>
			
	</div>
</div>




