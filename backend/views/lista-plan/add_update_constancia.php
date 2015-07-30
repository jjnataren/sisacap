<?php

use yii\helpers\Html;
use backend\models\Constancia;
use yii\bootstrap\ActiveForm;
use backend\models\ListaConstancia;


/* @var $this yii\web\View */
/* @var $model backend\models\ListaPlan */

$this->title = 'Agregar una constancia al reporte';
$this->params['breadcrumbs'][] = ['label' => 'Plan ID '.$model->ID_PLAN, 'url' => ['plan/dashboard', 'id'=>$model->ID_PLAN]];
$this->params['breadcrumbs'][] = ['label' => 'Reporte ID '.$model->ID_LISTA, 'url' => ['lista-plan/dashboard', 'id'=>$model->ID_LISTA]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">



<div class="col-md-7 col-xs-12 col-sm-12">

<div class="box box-solid box-primary">
			<div class="box-header">
					 <i class="fa fa fa-book"></i>
			    	 <h3 class="box-title">   
							<?= Yii::t('backend', 'Formulario de captura nueva constancia') ?>  
					 </h3>
                            
			</div>
			
			<?php $form = ActiveForm::begin(); ?>
			<div class="box-body">
			
			    
			
			    <?php //$form->field($model, 'ID_LISTA')->textInput() ?>
			
			    <?php //$form->field($model, 'ID_PLAN')->textInput() ?>
			
			    <?php // $form->field($model, 'FECHA_CREACION')->textInput() ?>
			    
			     <?= $form->field($listaConstancia, 'MODALIDAD_CAPACITACION')->dropDownList(ListaConstancia::getAllModalidades(),['prompt'=>'-- Seleccione  --']); ?>
													
				 <?= $form->field($listaConstancia, 'OBJETIVO_CAPACITACION')->radioList(ListaConstancia::getAllObetivos(), ['style'=>'display:inline', 'separator'=>'  ',])->inline(false) ?>
			
			    <?php //$form->field($model, 'ESTATUS')->textInput() ?>
			
			    <?php //$form->field($model, 'ACTIVO')->textInput() ?>
			
			    <?php //$form->field($model, 'DOCUMENTO_PROBATORIO')->textInput(['maxlength' => 2048]) ?>
			
			    <?php //$form->field($model, 'NOMBRE_DOC_PROB')->textInput(['maxlength' => 300]) ?>
			
			    <?php //$form->field($model, 'ID_EMPRESA')->textInput() ?>
			
			  
			
			</div>
			
			     <div class="box-footer">
			     	  <div class="form-group">
			    		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				    </div>
			
			
			     
                  </div>
                  
                      <?php ActiveForm::end(); ?>
			
</div>

    </div>

 <div class="col-md-5 col-xs-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-calendar"></i>
                    <h3 class="box-title"><?= Yii::t('backend', 'Datos de la constancia') ?></h3>
                 
                    
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'ID') ?></dt>
                        <dd><?= $constancia->ID_CONSTANCIA ?></dd>

                        <dt><?= Yii::t('backend', 'Trabajador') ?></dt>
                        <dd><?= $constancia->iDTRABAJADOR->NOMBRE . $constancia->iDTRABAJADOR->APP. $constancia->iDTRABAJADOR->APM  ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Curso') ?></dt>
                        <dd><?= $constancia->iDCURSO->NOMBRE ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Tipo constancia') ?></dt>
                        <dd><?= isset(Constancia::getAllContanciasType()[$constancia->TIPO_CONSTANCIA]) ? Constancia::getAllContanciasType()[$constancia->TIPO_CONSTANCIA] : 'desconocido' ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Metodo de obtención') ?></dt>
                         <dd><?= isset(Constancia::getAllMetodosType()[$constancia->METODO_OBTENCION]) ? Constancia::getAllMetodosType()[$constancia->METODO_OBTENCION] : 'desconocido' ?></dd>

                        <dt><i><?= Yii::t('backend', 'Calificación') ?></i></dt>
                        <dd><?= $constancia->PROMEDIO; ?></dd> 
                        
                        <dt><i><?= Yii::t('backend', 'Aprobado') ?></i></dt>
                        <dd><?= $constancia->APROBADO ? 'SI' : 'NO' ?></dd>
                        
                         <dt><i><?= Yii::t('backend', 'Estatus') ?></i></dt>
                      <dd><span class="label label-success"><?= isset(Constancia::getAllEstatusType()[$model->ESTATUS])?Constancia::getAllEstatusType()[$model->ESTATUS] : 'desconocido' ; ?></span></dd>
                    </dl>
                    
                     <div class="box-footer">
                  </div>
                    
                </div><!-- /.box-body -->
            </div>
        </div>     





    
</div>
