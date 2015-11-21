<?php
/**
 * @var $this yii\web\View
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\models\EmpresaUsuario;
use backend\models\Instructor;
use backend\models\Empresa;
use backend\models\Plan;
?>

  <?php 
            $unmanagedCompanies = [];
            $managedCompanies = [];
            $establishments = [];
            $userMenuCompanies  = [];
            $planesMenu = [];
            $instructorCursos = [];
            
            $establishmentsCreated = [];
            $activePlans[]  = [
								'label'=>'Planes',
								'options'=>['class'=>'header'],  
							];					
          
            $companyByUser = new EmpresaUsuario();
            $instructor = null;
            
            $totalPlans = 0;
            $totalCourses = 0;
          
            $planesCreated[] = [
            	
            'label'=>'Comisiones',
            'options'=>['class'=>'header'],
            //'items'=>$empresaItemsMenu
            			
            ];
            
            
            
            if(Yii::$app->user->can('administrator')){
          

             foreach(\backend\models\Empresa::getNoAdministradas()  as $company):
             
             	$unmanagedCompanies[] = ['label'=>$company->NOMBRE_RAZON_SOCIAL, 'url'=>['/empresa/manage', 'id'=>$company->ID_EMPRESA], 'icon'=>'<i class="fa fa-angle-double-right"></i>'];
             
             endforeach; 
             
             foreach(\backend\models\Empresa::getAdministradas() as $companyUser):
              
             	$managedCompanies[] = ['label'=>$companyUser->NOMBRE_RAZON_SOCIAL, 'url'=>['/empresa/manage', 'id'=>$companyUser->ID_EMPRESA], 'icon'=>'<i class="fa fa-angle-double-right"></i>'];
              
             endforeach;
             
            }else if(Yii::$app->user->can('manager')){
            	
            	$companyByUser = EmpresaUsuario::getMyCompany();
            		
            		
            		/**
					 Plans items for right side menu
            		 */
            		$activePlansSql = Plan::findBySql("select * from tbl_plan where ACTIVO = 1 AND ID_COMISION IN (select ID_COMISION_MIXTA from tbl_comision_mixta_cap where ID_EMPRESA = $companyByUser->ID_EMPRESA AND ACTIVO = 1)")->all();
            		$comisionPlanItems = array();
            		
            		foreach ($activePlansSql as $activePlan){
            			
            			$comisionPlanItems['ID '.$activePlan->ID_COMISION.' '.$activePlan->iDCOMISION->ALIAS][] = $activePlan;
            			
            		}
            		
            		foreach ($comisionPlanItems as $comisionKey=>$plans){
            			
            			$planItems = [];
            			
            			foreach ($plans as $plan){
            				
            				$totalPlans++;
            				
            				$planItems[] =  [
            				'label'=>substr(  'ID '.$plan->ID_PLAN.' '.$plan->ALIAS, 0, 50 ),
            				'icon'=>'<i class="fa fa-calendar"></i>',
            				'url'=>['/plan/dashboard', 'id'=>$plan->ID_PLAN]
            				//'options'=>['class'=>'treeview'],
            				//'items'=>$empresaItemsMenu
            				];
            				
            			}
            			
            			$planesCreated[] = [
            				
            			'label'=>substr(''.$comisionKey,0,17),
            			'badge'=>count($planItems),
            			'icon'=>'<i class="glyphicon glyphicon-copyright-mark"></i>',
            			'options'=>['class'=>'treeview'],
            			'items'=>$planItems
            				
            			];
            			
            			
            		}
            		
            		/**
						End of plans	
            		 */
            		
            		
            		
					$establishments = Empresa::findAll(['ID_EMPRESA_PADRE'=>$companyByUser->ID_EMPRESA?:-1, 'ACTIVO'=>1]);
					
				
					foreach ($establishments as $userCompany){

						$empresaItemsMenu = array();


					/*	$legalRepresentativeMenu = [
												'label'=>Yii::t('backend', 'Legal representative'),
												'icon'=>'<i class="fa fa-suitcase"></i>',
												'url'=>['/representante-legal/update', 'id'=>$userCompany->iDEMPRESA->ID_REPRESENTANTE_LEGAL]
												
												];*/
						$viewMenu = [
						'label'=>Yii::t('backend', 'Ver establecimiento'),
						'icon'=>'<i class="fa fa-eye "></i>',
						'url'=>['/empresa/viewbystablishment', 'id'=>$userCompany->ID_EMPRESA]
						
						];
						$workersMenu = [
						'label'=>Yii::t('backend', 'Trabajadores'),
						'icon'=>'<i class="fa fa-users "></i>',
						'url'=>['/trabajador/indexestablishment', 'id_establishment'=>$userCompany->ID_EMPRESA]
						
						];
						$updateMenu = [
						'label'=>Yii::t('backend', 'Actualizar'),
						'icon'=>'<i class="fa fa-pencil"></i>',
						'url'=>['/empresa/updatebystableshiment', 'id'=>$userCompany->ID_EMPRESA]
						
						];
						

					
						//$empresaItemsMenu [] = $legalRepresentativeMenu;
						$empresaItemsMenu [] = $viewMenu;
						$empresaItemsMenu [] = $updateMenu;
						$empresaItemsMenu [] = $workersMenu;
								
								
						//$empresaItemsMenu [] = $establishmentMenu;

						$userMenuCompanies[] = [
												'label'=>$userCompany->NOMBRE_COMERCIAL,
												'icon'=>'<i class="fa fa-university"></i>',
												'options'=>['class'=>'treeview'],
												'items'=>$empresaItemsMenu
												];
												 

					}
					
					
					
					foreach ($companyByUser->iDEMPRESA->comisionMixtaCaps as $comision){
						
						$establishmentsCreated[] =  [
												'label'=> substr( 'ID '.$comision->ID_COMISION_MIXTA.' '.$comision->ALIAS, 0,50),
												'icon'=>'<i class="glyphicon glyphicon-copyright-mark"></i>',
												'url'=>['/comision-mixta-cap/dashboard', 'id'=>$comision->ID_COMISION_MIXTA]
												//'options'=>['class'=>'treeview'],
												//'items'=>$empresaItemsMenu
												];
						
						
						
						$planItems = [];
						
						foreach ($comision->plans  as $plan){

							
							
							$planItems[] =  [
								'label'=>$plan->ALIAS,
								'icon'=>'<i class="fa fa-calendar"></i>',
								'url'=>['/plan/dashboard', 'id'=>$plan->ID_PLAN]
								//'options'=>['class'=>'treeview'],
								//'items'=>$empresaItemsMenu
								];
							
							$courses[] = [
								
								'label'=>'Cursos',
								'options'=>['class'=>'header'],
								//'items'=>$empresaItemsMenu
								
								]; 
							
							foreach ($plan->cursos as $course ){

								$courses[]  = [
								'label'=>$course->NOMBRE,
								'icon'=>'<i class="fa fa-laptop"></i>',
								'url'=>['/constancias/createbycourse', 'id'=>$course->ID_CURSO]
								//'options'=>['class'=>'treeview'],
								//'items'=>$empresaItemsMenu
								];
								
								$totalCourses++;
								
							}
							
							if (count($courses) > 1)
							
							$activePlans[]  = [
								
								'label'=>"ID $plan->ID_PLAN ".$plan->ALIAS,
								'icon'=>'<i class="fa fa-calendar"></i>',
								'options'=>['class'=>'treeview'],
								'items'=>$courses

							];

							$courses = null;

						}
						
							
					}
					
					

            }else if(Yii::$app->user->can('instructor')){
            	
            	$companyByUser = EmpresaUsuario::getMyCompany();
            	
				$instructor = Instructor::getOwnData();
				
				foreach ($instructor->cursos as $curso){
					
					$instructorCursos[] =  [
							
							'label'=>$curso->NOMBRE,
							'icon'=>'<i class="fa fa-calendar"></i>',
							'url'=>['constancias/course-by-instructor', 'id'=>$curso->ID_CURSO]
							//'options'=>['class'=>'treeview'],
							//'items'=>$empresaItemsMenu
					];
										
				}
				           	
            }
             
            
            ?>
<?php $this->beginContent('@backend/views/layouts/_base.php'); ?>
<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="#" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <?= Yii::$app->name ?>
    </a>
  
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"><?= Yii::t('backend', 'Toggle navigation') ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
    
        	<!-- Add the class icon to your logo image or logo icon to add the margining -->
        
    	
        <div class="navbar-right">
            <ul class="nav navbar-nav">
            
            <?php  if(!Yii::$app->user->can('administrator') && Yii::$app->user->can('manager')  ) :?>
            
            	  <li id="notifications-dropdown" class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-copyright-mark"></i>
                        <span class="badge bg-green">
                            <?= count(\backend\models\IndicadorComision::findBySql('select * from tbl_indicador_comision where id_comision in 
                            		(select id_comision_mixta from tbl_comision_mixta_cap where id_empresa = '.$companyByUser->ID_EMPRESA.' and ACTIVO=1) AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia  ')->all()) ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">
                            <?php echo 'Notificaciones de comisión'?>
                        </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php foreach(\backend\models\IndicadorComision::findBySql('select * from tbl_indicador_comision where id_comision in 
                            		(select id_comision_mixta from tbl_comision_mixta_cap where id_empresa = '.$companyByUser->ID_EMPRESA.' and ACTIVO=1) 
                                		AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia  ')->orderBy(['fecha_inicio_vigencia'=>SORT_DESC])->limit(10)->all() as $eventRecord): ?>
                                    <li>
                                        <a href="<?= Yii::$app->urlManager->createUrl(['/indicador-comision/view-by-company', 'id'=>$eventRecord->ID_EVENTO]) ?>">
                                            <i class="fa fa-bell"></i>
                                            <?='ID '. $eventRecord->ID_COMISION .'-' .  $eventRecord->TITULO ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="footer">
                            <?= Html::a(Yii::t('backend', 'ver todas'), ['/indicador-comision/index-by-company']) ?>
                           
                        </li>
                    </ul>
                </li>
                  <li id="notifications-dropdown" class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-laptop"></i>
                        <span class="badge bg-green">
                            <?= count(\backend\models\IndicadorComision::findBySql('select * from tbl_indicador_curso where id_curso in 
                            		(select id_curso from tbl_curso where id_plan in 
                            			(select id_plan from tbl_plan where id_comision in 
                            				(select id_comision from tbl_comision_mixta_cap where id_empresa = '.$companyByUser->ID_EMPRESA.' and ACTIVO=1) ) )  AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia  ')->all()) ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">
                            <?php echo 'Notificaciones de cursos'?>
                        </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php foreach(\backend\models\IndicadorCurso::findBySql('select * from tbl_indicador_curso where id_curso in 
                            		(select id_curso from tbl_curso where id_plan in 
                            			(select id_plan from tbl_plan where id_comision in 
                            				(select id_comision from tbl_comision_mixta_cap where id_empresa = '.$companyByUser->ID_EMPRESA.' and ACTIVO=1) ) ) 
                                		AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia  ')->orderBy(['fecha_inicio_vigencia'=>SORT_DESC])->limit(10)->all() as $eventRecord): ?>
                                    <li>
                                        <a href="<?= Yii::$app->urlManager->createUrl(['/indicador-curso/view-by-company', 'id'=>$eventRecord->ID_EVENTO]) ?>">
                                            <i class="fa fa-bell"></i>
                                            <?='ID '. $eventRecord->ID_CURSO .'-' .  $eventRecord->TITULO ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="footer">
                            <?= Html::a(Yii::t('backend', 'ver todas'), ['/indicador-curso/index-by-company']) ?>
                           
                        </li>
                    </ul>
                </li>
                <li id="notifications-dropdown" class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-calendar"></i>
                        <span class="badge bg-green">
                             <?= $tIndicadorPlan = count(\backend\models\IndicadorPlan::findBySql('select * from tbl_indicador_plan where id_plan in 
                            		(select id_plan from tbl_plan where id_comision in 
                             		(select id_comision_mixta from tbl_comision_mixta_cap where id_empresa = '.$companyByUser->ID_EMPRESA.' and ACTIVO=1) AND ACTIVO=1) '
                             		.' AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia')->all()) ?>
                      
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">
                            <?= Yii::t('backend', 'Tiene {num} notificaciones en los planes', ['num'=>isset($tIndicadorPlan)?$tIndicadorPlan:0]) ?>
                        </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php foreach(\backend\models\IndicadorPlan::findBySql('select * from tbl_indicador_plan where id_plan in 
                            		(select id_plan from tbl_plan where id_comision in 
                             		(select id_comision_mixta from tbl_comision_mixta_cap where id_empresa = '.$companyByUser->ID_EMPRESA.' and ACTIVO=1) AND ACTIVO=1) '
                             		.' AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia  ')->orderBy(['FECHA_INICIO_VIGENCIA'=>SORT_DESC])->limit(10)->all() as $eventRecord): ?>
                                    <li>
                                        <a href="<?= Yii::$app->urlManager->createUrl(['/indicador-plan/view-by-company', 'id'=>$eventRecord->ID_EVENTO]) ?>">
                                            <i class="fa fa-bell"></i>
                                            <?='ID.'.$eventRecord->ID_PLAN.'- ' . $eventRecord->TITULO ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="footer">
                            <?= Html::a(Yii::t('backend', 'ver todas'), ['/indicador-plan/index-by-company']) ?>
                           
                        </li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li id="log-dropdown" class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-file-pdf-o"></i>
                        <span class="badge bg-yellow">
                            <?= $tIndicadorConstancia = count(\backend\models\IndicadorConstancia::findBySql(
                            	  'select * from tbl_indicador_constancia where id_constancia in 
                            		(select id_constancia from tbl_constancia where id_trabajador in 
                             			(select id_trabajador from tbl_trabajador where id_empresa in 
                            				(select id_empresa from tbl_empresa where id_empresa_padre = '.$companyByUser->ID_EMPRESA.' OR id_empresa = '.$companyByUser->ID_EMPRESA.'  and ACTIVO=1) 
                            			AND ACTIVO=1)
                            		AND ACTIVO=1)
                             	  AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia')->all()) ?>
                      
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?= Yii::t('backend', 'Hay {num} notificaciones en constancias', ['num'=>$tIndicadorConstancia]) ?></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php foreach(\backend\models\IndicadorConstancia::findBySql(
                            	 'select * from tbl_indicador_constancia where id_constancia in 
                            		(select id_constancia from tbl_constancia where id_trabajador in 
                             			(select id_trabajador from tbl_trabajador where id_empresa in 
                            				(select id_empresa from tbl_empresa where id_empresa_padre = '.$companyByUser->ID_EMPRESA.' OR id_empresa = '.$companyByUser->ID_EMPRESA.'  and ACTIVO=1) 
                            			AND ACTIVO=1)
                            		AND ACTIVO=1)
                             	  AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia')->orderBy(['fecha_inicio_vigencia'=>SORT_DESC])->limit(10)->all() as $identificadorConstancia): ?>
                                    <li>
                                        <a href="<?= Yii::$app->urlManager->createUrl(['/indicador-constancia/view-by-company', 'id'=>$identificadorConstancia->ID_EVENTO]) ?>">
                                            <i class="fa fa-bell <?= ''; //$logEntry->level == \yii\log\Logger::LEVEL_ERROR ? 'bg-red' : 'bg-yellow' ?>"></i>
                                            <?= 'ID '.$identificadorConstancia->ID_CONSTANCIA. '- ' . $identificadorConstancia->TITULO ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="footer">
                            <?= Html::a(Yii::t('backend', 'Ver todas'), ['/indicador-constancia/index-by-company']) ?>
                        </li>
                    </ul>
                </li>
                
                
                <?php elseif(!Yii::$app->user->can('administrator') && Yii::$app->user->can('instructor')  ):?>
                
                 <li id="notifications-dropdown" class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-laptop"></i>
                        <span class="badge bg-green">
                            <?= count(\backend\models\IndicadorComision::findBySql('select * from tbl_indicador_curso where id_curso in 
                            		(select id_curso from tbl_curso where id_plan in 
                            			(select id_plan from tbl_plan where id_comision in 
                            				(select id_comision from tbl_comision_mixta_cap where id_empresa = '.$companyByUser->ID_EMPRESA.' and ACTIVO=1) ) 
                            		  AND id_instructor = '.$instructor->ID_INSTRUCTOR.')  AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia  ')->all()) ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">
                            <?php echo 'Notificaciones de cursos'?>
                        </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php foreach(\backend\models\IndicadorCurso::findBySql('select * from tbl_indicador_curso where id_curso in 
                            		(select id_curso from tbl_curso where id_plan in 
                            			(select id_plan from tbl_plan where id_comision in 
                            				(select id_comision from tbl_comision_mixta_cap where id_empresa = '.$companyByUser->ID_EMPRESA.' and ACTIVO=1) ) 
                            		  AND id_instructor = '.$instructor->ID_INSTRUCTOR.')  AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia  ')->orderBy(['fecha_inicio_vigencia'=>SORT_DESC])->limit(10)->all() as $eventRecord): ?>
                                    <li>
                                        <a href="<?= Yii::$app->urlManager->createUrl(['/indicador-curso/view-by-company', 'id'=>$eventRecord->ID_EVENTO]) ?>">
                                            <i class="fa fa-bell"></i>
                                            <?='ID '. $eventRecord->ID_CURSO .'-' .  $eventRecord->TITULO ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="footer">
                            <?= Html::a(Yii::t('backend', 'ver todas'), ['/indicador-curso/index-by-company']) ?>
                           
                        </li>
                    </ul>
                </li>
                
                  <li id="log-dropdown" class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-file-pdf-o"></i>
                        <span class="badge bg-yellow">
                            <?= $tIndicadorConstancia = count(\backend\models\IndicadorConstancia::findBySql(
                            	  'select * from tbl_indicador_constancia where id_constancia in 
                            		(select id_constancia from tbl_constancia where id_trabajador in 
                             			(select id_trabajador from tbl_trabajador where id_empresa in 
                            				(select id_empresa from tbl_empresa where id_empresa_padre = '.$companyByUser->ID_EMPRESA.' OR id_empresa = '.$companyByUser->ID_EMPRESA.'  and ACTIVO=1) 
                            			AND ACTIVO=1)
                            		AND ACTIVO=1
                            		AND id_curso in (select id_curso from tbl_curso where id_instructor  = '.$instructor->ID_INSTRUCTOR.' AND ACTIVO = 1)
                            		)
                             	  AND CLAVE = \'CON0004\' AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia')->all()) ?>
                      
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?= Yii::t('backend', 'Hay {num} notificaciones en constancias', ['num'=>$tIndicadorConstancia]) ?></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php foreach(\backend\models\IndicadorConstancia::findBySql(
                            	  'select * from tbl_indicador_constancia where id_constancia in 
                            		(select id_constancia from tbl_constancia where id_trabajador in 
                             			(select id_trabajador from tbl_trabajador where id_empresa in 
                            				(select id_empresa from tbl_empresa where id_empresa_padre = '.$companyByUser->ID_EMPRESA.' OR id_empresa = '.$companyByUser->ID_EMPRESA.'  and ACTIVO=1) 
                            			AND ACTIVO=1)
                            		AND ACTIVO=1
                            		AND id_curso in (select id_curso from tbl_curso where id_instructor  = '.$instructor->ID_INSTRUCTOR.' AND ACTIVO = 1)
                            		)
                             	  AND CLAVE = \'CON0004\' AND curdate() >= fecha_inicio_vigencia   AND curdate() <= fecha_fin_vigencia')->orderBy(['fecha_inicio_vigencia'=>SORT_DESC])->limit(10)->all() as $identificadorConstancia): ?>
                                    <li>
                                        <a href="<?= Yii::$app->urlManager->createUrl(['/indicador-constancia/view-by-company', 'id'=>$identificadorConstancia->ID_EVENTO]) ?>">
                                            <i class="fa fa-bell <?= ''; //$logEntry->level == \yii\log\Logger::LEVEL_ERROR ? 'bg-red' : 'bg-yellow' ?>"></i>
                                            <?= 'ID '.$identificadorConstancia->ID_CONSTANCIA. '- ' . $identificadorConstancia->TITULO ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="footer">
                            <?= Html::a(Yii::t('backend', 'Ver todas'), ['/indicador-constancia/index-by-instructor']) ?>
                        </li>
                    </ul>
                </li>
                
                <?php endif;?>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?= Yii::$app->user->identity->username ?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="<?=  ( isset(Yii::$app->user->identity->profile->picture) && Yii::$app->user->identity->profile->picture )?   Yii::$app->user->identity->profile->picture : '/img/anonymous.jpg' ?>" class="img-circle" alt="User Image" />
                            <p>
                                <?php Yii::$app->user->identity->username ?>
                                <small>
                                    <?= Yii::t('backend', 'Miembro desde {0, date, short}', Yii::$app->user->identity->created_at) ?>
                                </small>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(Yii::t('backend', 'Perfil'), ['/sign-in/profile'], ['class'=>'btn btn-default btn-flat']) ?>
                            </div>
                            <div class="pull-left">
                                <?= Html::a(Yii::t('backend', 'Mi cuenta'), ['/sign-in/account'], ['class'=>'btn btn-default btn-flat']) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(Yii::t('backend', 'Salir'), ['/sign-in/logout'], ['class'=>'btn btn-default btn-flat']) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= ( isset(Yii::$app->user->identity->profile->picture) && Yii::$app->user->identity->profile->picture )?   Yii::$app->user->identity->profile->picture : '/img/anonymous.jpg' ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?= Yii::t('backend', 'Hola, {username}', ['username'=>Yii::$app->user->identity->username]) ?></p>
                    <a href="<?php echo \yii\helpers\Url::to(['/sign-in/profile']) ?>">
                        <i class="fa fa-circle text-success"></i>
                        <?= Yii::$app->formatter->asDatetime(time()) ?>
                    </a>
         		         	
                </div>
                	
                 
                 
            </div>
            
            <?php if (isset($companyByUser->iDEMPRESA)){?>
            <div class="user-panel">
           
             <div class="pull-left info">
         			<p class="text-center text-light-blue">      
                       
						<strong><?= strtoupper($companyByUser->iDEMPRESA->NOMBRE_RAZON_SOCIAL); ?></strong>
                    </p>
                   </div> 
             </div>      
            <?php }?>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?= backend\components\widgets\Menu::widget([
                'options'=>['class'=>'sidebar-menu'],
                'labelTemplate' => '<a href="#">{icon}<span>{label}</span>{right-icon}{badge}</a>',
                'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
                'submenuTemplate'=>"\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                'activateParents'=>true,
                'items'=>[
						
                		
                		[
                		'visible'=>( !Yii::$app->user->can('administrator') ),
                		'label'=>Yii::t('backend', 'Inicio'),
                		'icon'=>'<i class="fa fa-home fa-lg"> </i>',
                		'url'=>[  '/empresa/dashboard' ]
                		],
                		
                		[
                		'visible'=>( !Yii::$app->user->can('administrator') &&   Yii::$app->user->can('instructor')),
                		'label'=>Yii::t('backend', 'Instructor'),
                		'options'=>['class'=>'treeview'],
                		'icon'=>'<i class="fa fa-graduation-cap fa-lg"></i>',


                		
                		'items'=>[
                				['label'=>Yii::t('backend', 'Mis datos'),
                						'url'=>['/instructor/view-by-instructor'],
                						'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                         

                				//['label'=>Yii::t('backend', 'Crear'),
                				//'url'=>['representante-legal/create'],
                				//'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                				['label'=>Yii::t('backend', 'Editar'),
                						'url'=>['/instructor/update-by-instructor'],
                						'icon'=>'<i class="fa fa-angle-double-right"></i>'],


                				['label'=>Yii::t('backend', 'Firma electronica'),
							
							'options'=>['class'=>'treeview'],
							'icon'=>'<i class="fa fa-pencil-square-o"></i>',
							'items'=>[
										['label'=>Yii::t('backend', 'Ver'),
												'url'=>['instructor/view-sign-pic'],
												'icon'=>'<i class="fa fa-angle-double-right"></i>'],
										//['label'=>Yii::t('backend', 'Crear'),
										//'url'=>['representante-legal/create'],
										//'icon'=>'<i class="fa fa-angle-double-right"></i>'],
										['label'=>Yii::t('backend', 'Editar'),
												'url'=>['/instructor/manage-sign-pic'],
												'icon'=>'<i class="fa fa-angle-double-right"></i>'],]
								
								,]
                					
                		]
                			
                		],



//INSTRUCTOR



            		
            		[
            		'visible'=>(!Yii::$app->user->can('administrator') &&   Yii::$app->user->can('instructor')),
            		'label'=>Yii::t('backend', 'Empresa'),
            			
            		'icon'=>'<span class="fa fa-building fa-lg">
							 </span>',
            									  
            									 'options'=>['class'=>'treeview'],
            									 'url'=>['/empresa/updatebyuser'],
            									 'items'=>[
            										['label'=>Yii::t('backend', 'Ver'),
            										'url'=>['empresa/view-by-instructor'],
            										'icon'=>'<i class="fa fa-angle-double-right"></i>'],
            										//['label'=>Yii::t('backend', 'Mis empresas '),
            		//'url'=>['empresa/index'],
            		//	'icon'=>'<i class="fa fa-plus-circle"></i>'],
            		
            		//['label'=>Yii::t('backend', 'Trabajadores'),
            		//'icon'=>'<span class="fa fa-users ">
							// </span>',
            									 //'url'=>['/trabajador/index-by-instructor'],
            									// 'badge'=>isset($companyByUser->iDEMPRESA) ? count($companyByUser->iDEMPRESA->trabajadors) : 0],
            									 ]
            									  
            									 	
            		
            									 ],
            		[
            		'visible'=>(!Yii::$app->user->can('administrator')&&   Yii::$app->user->can('instructor')),
            		'label'=>Yii::t('backend', 'Establecimientos'),
            		'icon'=>'<span class="fa fa-university">
							 </span>',
            									 'options'=>['class'=>'treeview'],
            									 'items'=>[
            									 ['label'=>Yii::t('backend', 'Ver establecimientos'), 'url'=>['/empresa/index-establishment-instructor', 'id'=>$companyByUser->ID_EMPRESA ?: 0], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
            									 		
					]
            									 			
            									 		],
            		
            		
            										
[	'visible'=>!Yii::$app->user->can('administrator'),
	'label'=>Yii::t('backend', 'Cursos'),
	'options'=>['class'=>'treeview'],
	'icon'=>'<i class="fa fa-book"></i>',
	'items'=>$instructorCursos,

],
            	
                   /* [
                        'label'=>Yii::t('backend', 'Timeline'),
                        'icon'=>'<i class="fa fa-bar-chart-o"></i>',
                        'url'=>['/system-event/timeline']
                    ],
                    'icon'=>'<span class="fa-stack fa-lg">
 							 <i class="fa fa-square-o fa-stack-2x"></i>
  							 <i class="fa fa-laptop fa-stack-1x"></i>
							 </span>',
				*/
            		
            		

					[
						'visible'=>(!Yii::$app->user->can('administrator') &&   Yii::$app->user->can('manager')),
						'label'=>Yii::t('backend', 'Mi empresa'),
					
            		    'icon'=>'<span class="fa fa-building fa-lg">
							 </span>',
            	
						'options'=>['class'=>'treeview'],
						'url'=>['/empresa/updatebyuser'],
						'items'=>[
								['label'=>Yii::t('backend', 'Ver'),
								'url'=>['empresa/viewbyuser'],
								'icon'=>'<i class="fa fa-angle-double-right"></i>'],
								//['label'=>Yii::t('backend', 'Mis empresas '),
								//'url'=>['empresa/index'],
							//	'icon'=>'<i class="fa fa-plus-circle"></i>'],
									  ['label'=>Yii::t('backend', 'Editar '),
									  'url'=>['empresa/updatebyuser'],
								'icon'=>'<i class="fa fa-angle-double-right"></i>'],
							['label'=>Yii::t('backend', 'Trabajadores'),
							'icon'=>'<span class="fa fa-users ">
							 </span>',
							 'url'=>['/trabajador/indexcompany'],
							 'badge'=>isset($companyByUser->iDEMPRESA) ? count($companyByUser->iDEMPRESA->trabajadors) : 0],
							]
               
					
						
					],
				
					[
						'visible'=>(!Yii::$app->user->can('administrator') &&   Yii::$app->user->can('manager')),
						'label'=>Yii::t('backend', 'Representante legal'),
						'options'=>['class'=>'treeview'],
						'icon'=>'<i class="fa fa-suitcase"></i>',
						
						'items'=>[
							['label'=>Yii::t('backend', 'Ver'),
							'url'=>['representante-legal/viewbycompany'],
							'icon'=>'<i class="fa fa-angle-double-right"></i>'],
							//['label'=>Yii::t('backend', 'Crear'),
							//'url'=>['representante-legal/create'],
							//'icon'=>'<i class="fa fa-angle-double-right"></i>'],
							['label'=>Yii::t('backend', 'Editar'),
							'url'=>['/representante-legal/updatebycompany'],
							'icon'=>'<i class="fa fa-angle-double-right"></i>'],
								
							['label'=>Yii::t('backend', 'Firma electronica'),
							
							'options'=>['class'=>'treeview'],
							'icon'=>'<i class="fa fa-pencil-square-o"></i>',
							'items'=>[
										['label'=>Yii::t('backend', 'Ver'),
												'url'=>['representante-legal/view-sign-pic'],
												'icon'=>'<i class="fa fa-angle-double-right"></i>'],
										//['label'=>Yii::t('backend', 'Crear'),
										//'url'=>['representante-legal/create'],
										//'icon'=>'<i class="fa fa-angle-double-right"></i>'],
										['label'=>Yii::t('backend', 'Editar'),
												'url'=>['/representante-legal/manage-sign-pic'],
												'icon'=>'<i class="fa fa-angle-double-right"></i>'],]
								
								,]
							
						]
					
					],
					[
					'visible'=>(!Yii::$app->user->can('administrator')&&   Yii::$app->user->can('manager')),
					'label'=>Yii::t('backend', 'Mis establecimientos'),
            		'icon'=>'<span class="fa fa-university">
							 </span>',
					'options'=>['class'=>'treeview'],
                        'items'=>[
                            ['label'=>Yii::t('backend', 'Ver establecimientos'), 'url'=>['/empresa/establishments', 'id'=>$companyByUser->ID_EMPRESA ?: 0], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            ['label'=>Yii::t('backend', 'Crear establecimiento'), 'url'=>['/empresa/createestablishment', 'id'=>$companyByUser->ID_EMPRESA ?: 0], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                       
					]
					
					],
                    

					['label'=>Yii::t('backend', 'Comisión mixta'),
					
            		'visible'=>(!Yii::$app->user->can('administrator')&&   Yii::$app->user->can('manager')),
					'label'=>Yii::t('backend', 'Comisión mixta'),
					 'icon'=>'<span class="glyphicon glyphicon-copyright-mark ">
							 </span>',
					'options'=>['class'=>'treeview'],
						
					'url'=>['/comision-mixta-cap/index'],
					'items'=>[
					        ['label'=>Yii::t('backend', 'Mis comisiones'),
							'url'=>['comision-mixta-cap/indexbycompany'],
							'icon'=>'<i class="fa fa-angle-double-right"></i>'],
							['label'=>Yii::t('backend', 'Crear comisión mixta '),
									'url'=>['comision-mixta-cap/createbycompany'],
									'icon'=>'<i class="fa fa-angle-double-right"></i>'],
									//['label'=>Yii::t('backend', 'Editar comision mixta '),
							//'url'=>['comision-mixta-cap/update'],
											//'icon'=>'<i class="fa fa-wrench"></i>'],
							]
						],
					/*[
					'label'=>Yii::t('backend', 'Planes de capacitación'),
            		'visible'=>!Yii::$app->user->can('administrator'),
					'icon'=>'<i class="fa fa-calendar"></i>',
					'options'=>['class'=>'treeview'],
					
					'url'=>['/plan/index'],
					'items'=>[
					['label'=>Yii::t('backend', 'Ver planes'),
							'url'=>['plan/indexbycompany'],
							'icon'=>'<i class="fa fa-angle-double-right"></i>'],
												['label'=>Yii::t('backend', 'Crear plan '),
														'url'=>['plan/createbycomision'],
														'icon'=>'<i class="fa fa-angle-double-right"></i>'],
														['label'=>Yii::t('backend', ' '),
												//'url'=>['plan/update'],
							'icon'=>'<i class=""></i>'],
												]
					
								
							],*/

							//[	'visible'=>!Yii::$app->user->can('administrator'),
							//	'label'=>Yii::t('backend', 'Cursos'),
							//	'options'=>['class'=>'treeview'],
							//	'icon'=>'<i class="fa fa-book"></i>',
							//	'items'=>[
							//	['label'=>Yii::t('backend', 'Mis cursos'),
							//	'url'=>['curso/indexbycompany'],
							//	'icon'=>'<i class="fa fa-angle-double-right"></i>'],
							//	[
							//	'label'=>Yii::t('backend', 'Crear curso '),					
							//	'url'=>['curso/createbycompany'],
							//	'icon'=>'<i class="fa fa-angle-double-right"></i>'
							//	],
								//]
						
							//],
            				[	'visible'=>(!Yii::$app->user->can('administrator')&&   Yii::$app->user->can('manager')),
			            		'label'=>Yii::t('backend', 'Instructores'),
			            		'options'=>['class'=>'treeview'],
                                'icon'=>'<span class="fa fa-graduation-cap">
							 </span>',
			            		'items'=>[
			            		['label'=>Yii::t('backend', 'Ver instructores'),
			            				'url'=>['instructor/indexbycompany'],
											'icon'=>'<i class="fa fa-angle-double-right"></i>'],
										//	[
			            			//	'label'=>Yii::t('backend', 'Crear instructor '),
			            						//'url'=>['instructor/createbycompany'],
			            						//'icon'=>'<i class="fa fa-angle-double-right"></i>'
										//	],
								]
			            		
							],
			
            		
            		[	'visible'=>(!Yii::$app->user->can('administrator')&&   Yii::$app->user->can('manager')),
            		'label'=>Yii::t('backend', 'Puestos de trabajo'),
            		'options'=>['class'=>'treeview'],
         		
            		'icon'=>'<span class="fa fa-user-secret">
							 </span>',
            		'items'=>[
            		['label'=>Yii::t('backend', 'Ver puestos de trabajo'),
            				'url'=>['puesto-empresa/indexbycompany'],
            				'icon'=>'<i class="fa fa-angle-double-right"></i>'],
											[
            				'label'=>Yii::t('backend', 'Crear puesto de trabajo  '),
            				'url'=>['puesto-empresa/createbycompany'],
            				'icon'=>'<i class="fa fa-angle-double-right"></i>'
											],
            				]
            				 
            				],
            		
            		
            		
						/*[
                        'label'=>Yii::t('backend', 'Contenido'),
                        'icon'=>'<i class="fa fa-edit"></i>',
                        'options'=>['class'=>'treeview'],
						'visible'=>Yii::$app->user->can('administrator'),
                        'items'=>[
                            ['label'=>Yii::t('backend', 'Static pages'), 'url'=>['/page/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            ['label'=>Yii::t('backend', 'Articles'), 'url'=>['/article/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            ['label'=>Yii::t('backend', 'Article Categories'), 'url'=>['/article-category/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            ['label'=>Yii::t('backend', 'Text Widgets'), 'url'=>['/widget-text/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            ['label'=>Yii::t('backend', 'Menu Widgets'), 'url'=>['/widget-menu/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            ['label'=>Yii::t('backend', 'Carousel Widgets'), 'url'=>['/widget-carousel/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                        ]
                    ],
					*/

					[	'encode'=>'false',
					'label'=>Yii::t('backend', 'Establecimientos'),
                    'icon'=>'<span class="fa-stack fa-lg">
 							 <i class="fa fa-square-o fa-stack-2x"></i>
  							 <i class="fa fa-university  fa-stack-1x"></i>
							 </span>',
                      

					'badge'=>count($establishments),
					'options'=>['class'=>'treeview'],
					'items'=> $userMenuCompanies,
            		
            		'visible'=>!Yii::$app->user->can('administrator'),
					],
            		/**
            		 * Comisiones
            		 */
					[	'encode'=>'false',
					'label'=>Yii::t('backend', 'Comisiones'),
            		'icon'=>'<span class="fa-stack fa-lg">
 							 <i class="fa fa-square-o fa-stack-2x"></i>
  							 <i class="fa fa-copyright fa-stack-1x"></i>
					
 							
							 </span>',
					'badge'=>count($establishmentsCreated),
					'options'=>['class'=>'treeview'],
					'items'=> $establishmentsCreated
					],
            		
            		/**
            		 * Planes
            		 */
            		[	'encode'=>'false',
            		'label'=>Yii::t('backend', 'Planes'),
            		'visible'=>(!Yii::$app->user->can('administrator')&&   Yii::$app->user->can('manager')),
            		'icon'=>'<span class="fa-stack fa-lg">
 							 <i class="fa fa-square-o fa-stack-2x"></i>
  							 <i class="fa fa-calendar fa-stack-1x"></i>
							 </span>',
            									 'badge'=>$totalPlans,
            									 'options'=>['class'=>'treeview'],
            									 'items'=> $planesCreated
            		],
            		
            		
            		/**
            		 * Constancias
            		 */
            		[	'encode'=>'false',
            		'label'=>Yii::t('backend', 'Cursos'),
            		'visible'=>(!Yii::$app->user->can('administrator')&&   Yii::$app->user->can('manager')),
            		'icon'=>'<span class="fa-stack fa-lg">
 							 <i class="fa fa-square-o fa-stack-2x"></i>
  							 <i class="fa fa-laptop fa-stack-1x"></i>
							 </span>',			 'badge'=>$totalCourses,
            									 'options'=>['class'=>'treeview'],
            									 'items'=> $activePlans
            		],
            		
                		[
                		'label'=>Yii::t('backend', 'Catalogos'),
                		'icon'=>'<i class="fa fa-building"></i>',
                		'options'=>['class'=>'treeview'],
                		'visible'=>Yii::$app->user->can('administrator'),
                		'items'=>[
                				['label'=>Yii::t('backend', 'Entidades federativas'), 'url'=>['/catalogo/entidades-federativas'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                				['label'=>Yii::t('backend', 'Municipios'), 'url'=>['/catalogo/municipios'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                		        ['label'=>Yii::t('backend', 'Ocupaciones'), 'url'=>['/catalogo/ocupaciones'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
								['label'=>Yii::t('backend', 'Giros'), 'url'=>['/catalogo/giro'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
								['label'=>Yii::t('backend', 'NTCL'), 'url'=>['/catalogo/ntcl'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
								['label'=>Yii::t('backend', 'Area tematica'), 'url'=>['/catalogo/area'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],

                		]
                		],
                		
                		
					[
					'label'=>Yii::t('backend', 'Empresas'),
					'icon'=>'<i class="fa fa-building"></i>',
					'options'=>['class'=>'treeview'],
					'visible'=>Yii::$app->user->can('administrator'),
					'items'=>[
								['label'=>Yii::t('backend', 'Crear empresa'), 'url'=>['/empresa/create'], 'icon'=>'<i class="fa fa-file-o"></i>'],
								['label'=>Yii::t('backend', 'Ver empresas'), 'url'=>['/empresa/index'], 'icon'=>'<i class="fa fa-table"></i>'],
								//['label'=>Yii::t('backend', 'Reportes  '), 'url'=>['/empresa/report'], 'icon'=>'<i class="fa fa-file-pdf-o"></i>'],

							]
					],
						
						[
							'label'=>Yii::t('backend', 'Empresas administradas'),
							'icon'=>'<i class="fa fa-flag-checkered"></i>',
							'options'=>['class'=>'treeview'],
							'items'=>$managedCompanies,
						],
						[
						'label'=>Yii::t('backend', 'Empresas sin administrar'),
						'icon'=>'<i class="fa fa-flag-o""></i>',
						'options'=>['class'=>'treeview'],
						'items'=>$unmanagedCompanies,
						],
											
					[
					'label'=>Yii::t('backend', 'Representate legal'),
					'icon'=>'<i class="fa fa-suitcase"></i>',
					'options'=>['class'=>'treeview'],
					'visible'=>Yii::$app->user->can('administrator'),
					'items'=>[
								['label'=>Yii::t('backend', 'Crear representante '), 'url'=>['/representante-legal/create'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
								['label'=>Yii::t('backend', 'Ver representantes'), 'url'=>['/representante-legal/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
								//['label'=>Yii::t('backend', 'Reporte representante'), 'url'=>['/representante-legal/report'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
							]
					],
                    [
                        'label'=>Yii::t('backend', 'Usuarios'),
                        'icon'=>'<i class="fa fa-users"></i>',
                        'url'=>['/user/index'],
                        'visible'=>Yii::$app->user->can('administrator')
                    ],
                   /* [
                        'label'=>Yii::t('backend', 'System'),
                        'icon'=>'<i class="fa fa-cogs"></i>',
                        'options'=>['class'=>'treeview'],
						'visible'=>Yii::$app->user->can('administrator'),
                        'items'=>[
                            [
                                'label'=>Yii::t('backend', 'i18n'),
                                'icon'=>'<i class="fa fa-flag"></i>',
                                'options'=>['class'=>'treeview'],
                                'items'=>[
                                    ['label'=>Yii::t('backend', 'i18n Source Message'), 'url'=>['/i18n/i18n-source-message/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                                    ['label'=>Yii::t('backend', 'i18n Message'), 'url'=>['/i18n/i18n-message/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                                ]
                            ],
                            ['label'=>Yii::t('backend', 'Key-Value Storage'), 'url'=>['/key-storage/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            ['label'=>Yii::t('backend', 'Cache'), 'url'=>['/cache/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            ['label'=>Yii::t('backend', 'File Storage Items'), 'url'=>['/file-storage/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            ['label'=>Yii::t('backend', 'File Manager'), 'url'=>['/file-manager/index'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            [
                                'label'=>Yii::t('backend', 'System Events'),
                                'url'=>['/system-event/index'],
                                'icon'=>'<i class="fa fa-angle-double-right"></i>',
                                'badge'=>\common\models\SystemEvent::find()->today()->count(),
                                'badgeBgClass'=>'bg-green',
                            ],
                            [
                                'label'=>Yii::t('backend', 'System Information'),
                                'url'=>['/system-information/index'],
                                'icon'=>'<i class="fa fa-angle-double-right"></i>'
                            ],
                            [
                                'label'=>Yii::t('backend', 'Logs'),
                                'url'=>['/log/index'],
                                'icon'=>'<i class="fa fa-angle-double-right"></i>',
                                'badge'=>\backend\models\SystemLog::find()->count(),
                                'badgeBgClass'=>'bg-red',
                            ],
                        ]
                    ] */
                ]

            ]) ?>
            
            
       
            
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            
            	<?php if(isset($this->params['titleIcon'])): ?>
                    <?= $this->params['titleIcon'] ?>
                <?php endif; ?>
                
                <?= $this->title ?>
                <?php if(isset($this->params['subtitle'])): ?>
                    <small><?= $this->params['subtitle'] ?></small>
                <?php endif; ?>
            </h1>

            <?= Breadcrumbs::widget([
                'tag'=>'ol',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php if(Yii::$app->session->hasFlash('alert')):?>
                <?= \yii\bootstrap\Alert::widget([
                    'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                    'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                ])?>
            <?php endif; ?>
            <?= $content ?>
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php $this->endContent(); ?>