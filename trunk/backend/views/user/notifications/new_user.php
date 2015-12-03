  
  <h3>
  	Hola <u> <?=$model->username;?> </u>	te informamos que ha sido creada una nueva cuenta para accesar al sistema SISACAP
  	
  </h3>
  
  <?php $roles = [1=>'Usuario', 5=>'Manager',7=>'Instructor',10=>'Administrador']?>
  
  <p>Por favor revisa que tu información este correcta en el siguiente recuadro</p>
  
		<div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                    <div class="box-body">
                    
                    <h2>Datos de tu cuenta</h2>
                    
                    <dl style='border-top-color:#3C8DBC; border-right-color:#3C8DBC; border-top-style: solid; background-color: #F4F4F4;  border-right-style: solid; font-family: "Times New Roman", Serif;'>
                        <dt style="color: Black; "><?= Yii::t('backend', 'Usuario de acceso') ?></dt>
                        <dd><b><?= $model->username ?></b></dd>

                        <dt><?= Yii::t('backend', 'Contraseña de acceso') ?></dt>
                        <dd><?= $model->password; ?></dd>
                        
                        <dt><?= Yii::t('backend', 'Correo electronico') ?></dt>
                        <dd><?= $model->email; ?>
					
						</dd>
                        
                        <dt><?= Yii::t('backend', 'Tipo de usuario') ?></dt>
                       <dd><?= isset($roles[$model->role]) ? $roles[$model->role] : 'desconocido' ?></dd>
                        
                        <dt><?= Yii::t('backend', 'Fecha de creación') ?></dt>
                         <dd><?= date('d/m/Y') ?></dd>
                                    
                    </dl>
                    
                    <h4>Puedes acceder a tu cuenta en el siguiente enlace.</h4>
                    
                    <h3>
                    <a href="<?=  Yii::getAlias('@frontendUrl') . '/backend' ?>">
                 	       Acceso          	
                 	</a>
                    
                   </h3>
                    
                </div><!-- /.box-body -->
         
            </div>
        </div>    
        
        

  
