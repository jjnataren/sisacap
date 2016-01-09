<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */

$this->title ='Ver instructor: '. $model-> NOMBRE;
$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-graduation-cap -lg  fa-stack-1x"></i>
							   </span>';


$this->params['breadcrumbs'][] = $this->title;
?>

	<div class="row">
		 <div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3><i class="fa fa-eye"></i>
						<?= Yii::t('backend', 'Datos del instructor') ?> <small>  Información detallada</small> </h3>
					</div>
					       
               
                <div class="panel-body">
                
                <div class=" col-xs-12 col-sm-12 col-md-6"> 
                <h3 ><?= Yii::t('backend', 'Datos generales') ?></h3>
                   
                   
                   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_INSTRUCTOR',
            'NOMBRE',
            'APP',
            'APM',
             'RFC',
            'NUM_REGISTRO_AGENTE_EXTERNO',
			'NOMBRE_AGENTE_EXTERNO',
         
        ],
    ]) ?>
    </div>
     <div class=" col-xs-12 col-sm-12 col-md-6">
    <h3><?= Yii::t('backend', 'Datos de contacto') ?></h3>
			<?= DetailView::widget([
					'model' => $model,
					'attributes' => [
					'DOMICILIO',
					'TELEFONO',
					'CORREO_ELECTRONICO',
					
			],
			
			    ]) ?>
		</div>	    
		
		  <div class=" col-xs-12 col-sm-12 col-md-6">
   			 <h3><i class="fa fa-file"></i> <?= Yii::t('backend', 'Documento probatorio') ?></h3>
   			 
   			 <div class="panel">
				
               
                <div class="panel-body">
                	<?php if($model->DOCUMENTO_PROBATORIO !== null && strlen($model->DOCUMENTO_PROBATORIO)> 1):?>
                	
                							<object data="<?=$model->DOCUMENTO_PROBATORIO ?>" type="image/jpeg" width="300px" height="160px">
											 <param name="movie" value="{caption}" />
													<div class="file-preview-other">
														<i class="glyphicon glyphicon-file"></i>
													</div>
											 </object>
											 <div class="file-thumbnail-footer">
											    <div class="file-caption-name"><?= $model->NOMBRE_DOC_PROB;?></div>
											    <div class="file-actions">
											</div>
											</div>
					<?php else:?>
					
						<label><i>Sin documento probatorio</i></label>		
						
					<?php endif;?>					
                
                </div>
                 				<?php if ($model->DOCUMENTO_PROBATORIO !== null):?>
		                 			<div class="panel-footer">
					    					<a href="<?= $model->DOCUMENTO_PROBATORIO ?>" target="_blank" class="btn btn-default"><i class="fa fa-download"> </i> Descargar documento</a>
		        	        
		                 			 </div>
				             	 <?php endif;?>
             </div>
		
		</div>	    
</div>
</div>
</div>

</div>











