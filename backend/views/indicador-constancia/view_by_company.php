<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorPlan */

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-bell fa-stack-1x"></i>
							   </span>';

$this->title = 'Notificación Constancia: ID '. $model->ID_CONSTANCIA;
$this->params['breadcrumbs'][] = ['label' => 'Notificaciones constancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
    <h1><?= Html::encode($model->TITULO) ?></h1>

    	
    	
    	
    	
    	
    	  <div class="col-md-6 col-sm-12 col-xs-6">
            <div class="box box-primary">
                <div class="box-header">
                   <i class="fa fa-bell"></i>
                    <h3 class="box-title"><?= Yii::t('backend', ' Detalles de ') ?> <small> la notificación.</small></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                     
                        
                            <dt><?= Yii::t('backend', 'Titulo') ?></dt>
                              <dd><?= $model->TITULO ?></dd>
                              
                                 
                                
                                 
                                                                                              </dl>
                                 
                                 <p>
                                 <h4>Descripción:</h4>
                                 <?=$model->DATA?></p>
           
 
				
				
					 <div class="box-footer">
					 
<?= Html::a('<i class="fa  fa-trash-o"></i>	Borrar notificación',['delete-by-company', 'id' => $model->ID_EVENTO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Realmente quieres borrar este indicador?',
                'method' => 'post',
            ],
        ]) ?>
  
  
				</div>
		
					 
         &nbsp;			
  </div>
				
</div>
                            
   </dl>
 </div><!-- /.box-body -->	
 
 
        <div class="col-md-6 col-sm-12 col-xs-6">
            <div class="box box-primary">
                <div class="box-header">
                   <i class="fa fa-file-pdf-o"></i>
                    <h3 class="box-title"><?= Yii::t('backend', ' Detalles de la constancia ') ?> <small>Constancia de adiestramiento</small></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                    
                        <dt><?= Yii::t('backend', 'ID') ?> </dt>                 
                        <dd><?= $model->ID_CONSTANCIA ?> </dd>
                
                         <dt><?= Yii::t('backend','Tipo de constancia') ?> </dt>
                           <dd><?= $model->iDCONSTANCIA->TIPO_CONSTANCIA?> </dd>
                           
                              <dt><?= Yii::t('backend', 'Trabajador') ?> </dt>                 
                        <dd><?= $model->iDCONSTANCIA->iDTRABAJADOR->NOMBRE?> </dd>
                        
                           
                           <dt><?= Yii::t('backend','Curso	') ?></dt>
                           <dd><?= $model->iDCONSTANCIA->iDCURSO->NOMBRE ?>  </dd>
                           
                           <dt><?= Yii::t('backend','Plan	') ?></dt>
                           <dd><?= $model->iDCONSTANCIA->iDCURSO->iDPLAN->ALIAS?>  </dd>
                           	  
                         
                            
                           
                                       						
					 <div class="box-footer">
<?= Html::a('<i class="fa fa-cogs"></i>	Administrar ', ['constancias/dashboard', 'id' => $model->ID_CONSTANCIA], ['class' => 'btn btn-primary']) ?>

  
				</div>

         &nbsp;			
  </div>
				
</div>
                            
   </dl>
 </div><!-- /.box-body -->
      
 
 
 
 
 
 
 	
 	
 
 
 
 
 
 
 
 
 
 
 	
 