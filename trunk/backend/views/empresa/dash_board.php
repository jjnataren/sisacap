
<?php
/**
 * Author: Eugine Terentev <eugine@terentev.net>
 * @var $this \yii\web\View
 */
use common\models\User;
use trntv\systeminfo\SI;

$this->title = Yii::t('backend', 'Resumen de la empresa '). 
 $model-> ALIAS;

?>



 
 <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                       <?php 
							echo "30"
                        
                        // todo: change after #5146 will be implemented ?>
                    </h3>
                    <p>
                        <?= Yii::t('backend', 'Trabajadores totales') ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="small-box-footer">
                    &nbsp;
                </div>
            </div>
        </div>  
        
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>
                       <?php 
							echo "30"
                        
                        // todo: change after #5146 will be implemented ?>
                    </h3>
                    <p>
                        <?= Yii::t('backend', 'Cursos totales') ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
                <div class="small-box-footer">
                    &nbsp;
                </div>
            </div>
        </div>  
        
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                       <?php 
							echo "30"
                        
                        // todo: change after #5146 will be implemented ?>
                    </h3>
                    <p>
                        <?= Yii::t('backend', 'Planes totales') ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <div class="small-box-footer">
                    &nbsp;
                </div>
            </div>
        </div>  
        
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-hello">
                <div class="inner">
                    <h3>
                       <?php 
							echo "45"
                        
                        // todo: change after #5146 will be implemented ?>
                    </h3>
                    <p>
                        <?= Yii::t('backend', 'Comisiones totales') ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-empire"></i>
                </div>
                <div class="small-box-footer">
                    &nbsp;
                </div>
            </div>
        </div>  
        
        
        
        
        
        
         
<div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>
                       <?php 
							echo "20"
                        
                        // todo: change after #5146 will be implemented ?>
                    </h3>
                    <p>
                        <?= Yii::t('backend', 'Establecimientos') ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-building"></i>
                </div>
                <div class="small-box-footer">
                    &nbsp;
                </div>
            </div>
        </div>
        
        
        <div class="col-lg-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-hdd-o"></i>
                    <h3 class="box-title"><?= Yii::t('backend', 'Datos de la empresa') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'ID') ?></dt>
                        <dd><?= $model->ID_EMPRESA ?></dd>

                        <dt><?= Yii::t('backend', 'Alias') ?></dt>
                        <dd><?= $model->ALIAS ?></dd>
                        
                        
                         <dt><?= Yii::t('backend', 'Registro patronal (I.M.S.S)') ?></dt>
                        <dd><?= $model->ALIAS ?></dd>

                        <dt><?= Yii::t('backend', 'Clave unica (RFC)') ?></dt>
                        <dd><?= $model->RFC ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Numero interior') ?></dt>
                        <dd><?= $model->NUMERO_INTERIOR ?></dd>

                        <dt><?= Yii::t('backend', 'Numero exterior') ?></dt>
                        <dd><?= $model->NUMERO_EXTERIOR ?></dd>

                        <dt><?= Yii::t('backend', 'Clave unica') ?></dt>
                        <dd><?= $model->COLONIA ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Calle') ?></dt>
                        <dd><?= $model->CALLE ?></dd>

                        <dt><?= Yii::t('backend', 'Codigo postal') ?></dt>
                        <dd><?= $model->CODIGO_POSTAL ?></dd>

                       
                         <dt><?= Yii::t('backend','Entidad federativa') ?></dt>
                        <dd><?= $model->ENTIDAD_FEDERATIVA ?></dd>

                        <dt><?= Yii::t('backend', 'localidad') ?></dt>
                        <dd><?= $model->LOCALIDAD ?></dd>

                        <dt><?= Yii::t('backend', 'Telefono') ?></dt>
                        <dd><?= $model->TELEFONO ?></dd>
                        
                         <dt><?= Yii::t('backend', 'Giro') ?></dt>
                        <dd><?= $model->GIRO_PRINCIPAL ?></dd>
                        
                          <dt><?= Yii::t('backend', 'Numero trabajadores') ?></dt>
                        <dd><?= $model->NUMERO_TRABAJADORES ?></dd>
                    </dl>
                </div><!-- /.box-body -->
            </div>
        </div>      
        
        
        
        
           
<div class="col-lg-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-building"></i>
                    <h3 class="box-title"><?= Yii::t('backend', 'Detalles de los establecimientos') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   
                
         <table class="table table-hover" >
         
         <thead> <tr><th>Id </th>  <th>Nombre</th> <th>Domicilio</th></tr></thead>
         
         <tbody>
         	
         	<?php $i = 0; foreach ($model->empresas as $establecimiento){?>
         	<tr>
         		<td><?= ++$i?></td>
         		<td><?= $establecimiento->ID_EMPRESA?></td>
         		<td><?= $establecimiento->ALIAS ?></td>
         		<td><?= $establecimiento->CALLE ?></td>
         		
         		
         	</tr>
         	<?php }?>
         </tbody>
        
        </table>
        
                </div><!-- /.box-body -->
            </div>
        </div>      
        
        
        
        
        
                  
<div class="col-lg-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-calendar"></i>
                    <h3 class="box-title"><?= Yii::t('backend', 'Detalles de los planes') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   
                
         <table class="table table-hover" >
         
         <thead> <tr><th>Id </th>  <th>Etapas</th> <th>Constancias expedidas</th> <th>Modalidad capacitacion</th></tr></thead>
         
         <tbody>
         	
         	<?php $i = 0; foreach ($model->plans as $planes){?>
         	<tr>
         		<td><?= ++$i?></td>
         		
         		<td><?= $planes->NUMERO_ETAPAS?></td>
         		<td><?= $planes->NUMERO_CONSTANCIAS_EXPEDIDAS?></td>
         		<td><?= $planes->MODALIDAD_CAPACITACION?></td>
         		
         	</tr>
         	<?php }?>
         </tbody>
        
        </table>
        
                </div><!-- /.box-body -->
            </div>
        </div>      
        
        
                          
<div class="col-lg-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-book"></i>
                    <h3 class="box-title"><?= Yii::t('backend', 'Detalles de los cursos') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   
                
         <table class="table table-hover" >
         
         <thead> <tr><th>Id </th>  <th>Nombre</th> <th>Fecha inicio</th> <th>Fecha termino</th></tr></thead>
         
         <tbody>
         	
         	<?php $i = 0; foreach ($model->cursos as $curso){?>
         	<tr>
         		<td><?= ++$i?></td>
         		
         		<td><?= $curso->NOMBRE?></td>
         		<td><?= $curso->FECHA_INICIO?></td>
         		<td><?= $curso->FECHA_TERMINO?></td>
         		
         	</tr>
         	<?php }?>
         </tbody>
        
        </table>
        
                </div><!-- /.box-body -->
            </div>
        </div>      
        
        
        
        
                                  
<div class="col-lg-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-empire"></i>
                    <h3 class="box-title"><?= Yii::t('backend', 'Detalles de las comisiones') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   
                
         <table class="table table-hover" >
         
         <thead> <tr><th>Id </th>  <th>	Nombre</th> <th>Integrantes</th> </tr></thead>
         
         <tbody>
         	
         	<?php $i = 0; foreach ($model->comisionMixtaCaps as $comisiones){?>
         	<tr>
         		<td><?= ++$i?></td>
         		
         		<td><?= $comisiones->ALIAS?></td>
         		<td><?= $comisiones->NUMERO_INTEGRANTES?></td>
         		
         		
         	</tr>
         	<?php }?>
         </tbody>
        
        </table>
        
                </div><!-- /.box-body -->
            </div>
        </div>      
        
        
                                        
<div class="col-lg-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title"><?= Yii::t('backend', 'Detalles de los trabajadores') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   
                
         <table class="table table-hover" >
         
         <thead> <tr><th>Id </th>  <th>	Nombre</th> <th>Puesto</th> </tr></thead>
         
         <tbody>
         	
         	<?php $i = 0; foreach ($model->trabajadors as $trabajador){?>
         	<tr>
         		<td><?= ++$i?></td>
         	
         		<td><?= $trabajador->NOMBRE?></td>
         		<td><?= $trabajador->PUESTO?></td>
         		
         		
         	</tr>
         	<?php }?>
         </tbody>
        
        </table>
        
                </div><!-- /.box-body -->
            </div>
        </div>      
        
        
        
        
  