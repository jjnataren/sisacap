<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\IndicadorComision */
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-bell fa-stack-1x"></i>
							   </span>';

$this->title = 'Notificación: Constitución de la comisión ';
$this->params['breadcrumbs'][] = ['label' => 'Indicador Comisions', 'url' => ['index-by-company']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicador-comision-view">



   
<div class="col-md-6 col-sm-12 col-xs-6">
            <div class="box box-info">
                <div class="box-header">
                   <i class="fa fa-bell"></i>
                    <h3 class="box-title"><?= Yii::t('backend', ' Detalles de la notificación') ?> </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                      <!--  <dt><?= Yii::t('backend', 'ID') ?></dt>
                    
                        <dd><?= $model->iDCOMISION->ID_COMISION_MIXTA ?></dd>  --> 
                        
                            <dt><?= Yii::t('backend', 'Titulo') ?></dt>
                              <dd><?=$model->TITULO ?></dd>
                               <dt><?= Yii::t('backend', 'Clave') ?></dt>
                    
                        <dd><?= $model->CLAVE ?></dd>
                            
                            
                                <dd><?=$model->DATA ?></dd>
								               
                                                          
                                 
                                 </dl>
                                 
                                 <p>
                                 <h4>Descripción:</h4>
                                 <?=$model->DESCRIPCION?></p>
           
 
				
				
				
		
      &nbsp;			
  </div>
		
		
			 <div class="box-footer">
					 <?= Html::a('<i class="fa  fa-trash-o"></i>	Borrar notificación',['delete-by-company', 'id' => $model->ID_EVENTO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Realmente quieres borrar este indicador?',
                'method' => 'post',
            ],
        ]) ?>
  
  
				</div>		
</div>
                            
   </dl>
 </div><!-- /.box-body -->
    
        
       <div class="col-md-6 col-sm-12 col-xs-6">
            <div class="box box-primary">
                <div class="box-header">
                   <i class="fa fa-calendar"></i>
                    <h3 class="box-title"><?= Yii::t('backend', ' Detalles de la comisión') ?> <small> y programa de capacitación adiestramiento</small></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'ID') ?></dt>
                    
                        <dd><?= $model->iDCOMISION->ID_COMISION_MIXTA ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Alias') ?></dt>
                           <dd><?= $model->iDCOMISION->ALIAS ?></dd>
                         
                            <dt><?= Yii::t('backend', 'Fecha de constitución') ?></dt>
                         
                                <dd><?=($model->iDCOMISION->FECHA_CONSTITUCION === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->iDCOMISION->FECHA_CONSTITUCION)) ;?></dd>
                            
                              
                               <dt><?= Yii::t('backend', 'Fecha de elaboración') ?></dt>
                                 
                                <dd><?=($model->iDCOMISION->FECHA_ELABORACION === null)?'<i class="text-muted">no establecido</i>':date("d/m/Y",strtotime($model->iDCOMISION->FECHA_ELABORACION)) ;?></dd>
                             
                                  <dt><?= Yii::t('backend', 'Número de integrantes ') ?></dt>
                                 <dd><?= $model->iDCOMISION->NUMERO_INTEGRANTES ?></dd>
                                 
                                  <dt><?= Yii::t('backend', 'Descripcion') ?></dt>
                                 <dd><?= $model->iDCOMISION->DESCRIPCION ?></dd>
                                       						
					 <div class="box-footer">
<?= Html::a('<i class="fa fa-cogs"></i>	Administrar ', ['/comision-mixta-cap/dashboard', 'id' => $model->iDCOMISION->ID_COMISION_MIXTA], ['class' => 'btn btn-primary']) ?>

  
				</div>
		
					 
         &nbsp;			
  </div>
				
</div>
                            
   </dl>
 </div><!-- /.box-body -->
      