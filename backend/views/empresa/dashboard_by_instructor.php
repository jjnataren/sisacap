<?php 

use yii\web\View;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use backend\models\Plan;
use backend\models\Constancia;
use backend\models\Catalogo;
use yii\helpers\Html;
use backend\models\ComisionMixtaCap;
use yii\widgets\ActiveForm;
use frontend\models\ContactForm;
use yii\captcha\Captcha;

$this->title = "Bienvenido instructor " . ( $model->NOMBRE ==null ) ?  Yii::$app->user->identity->username   :  strtoupper($model->NOMBRE . ' ' . $model->APP . ' ' . $model->APM) ;


$this->params['subtitle'] = 'Bienvenido';

$this->params['titleIcon'] = '<span class="fa-stack fa-lg">
  								<i class="fa fa-square-o fa-stack-2x"></i>
  								<i class="fa fa-graduation-cap  fa-stack-1x"></i>
							   </span>';
$this->registerJs("$('#dataTable1').dataTable( {'language': {'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json' }});", View::POS_END, 'my-options');


?>
				<!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                      <i class="fa fa-laptop fa-lg"></i>
                                        <?=  5 ?>
                                    </h3>
                                    <p>
                                                                     
                                       Cursos evaluando
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_comision">
                                  DC-1  More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                      <i class="glyphicon glyphicon-calendar"></i>
                                                <?= 4//count (Plan::findBySql("select * from tbl_plan  where ID_COMISION IN (select ID_COMISION_MIXTA from tbl_comision_mixta_cap where ID_EMPRESA =$model->ID_EMPRESA AND ACTIVO = 1 ) AND ACTIVO = 1")->all()); ?>
                                    </h3>
                                    <p>
                                       Constancias por firmar
                                        
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_plan">
                                 DC-2   More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                    <i class="fa  fa-file-pdf-o"></i>
                                    
                                        <?=  8 // count(Constancia::findBySql("select * from tbl_constancia where ID_EMPRESA = $model->ID_EMPRESA AND ACTIVO = 1")->all()); 
                                        
                                        
                                        ?>
                                    </h3>
                                    <p>
                                        Constancias en revisión
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_constancia1">
                                   DC-3 More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        0
                                    </h3>
                                    <p>
                                        Listas de constancias enviadas
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a class="small-box-footer" href="#anchor_constancia">
                                    DC-4 More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    
          <h4 class="page-header" id="anchor_comision">
          
                        <small>Comisiones mixtas de capacitación y adiestramiento</small>
          </h4>          
                    
              
                    
 <h4 class="page-header" id="anchor_constancia">
          Constancias 
   		<small>Constancias emitidas a los trabajadores</small>
   </h4>     
    
                    
                   
                
    <h4 class="page-header">
          Soporte y Ayuda
                        <small>Contenido de ayuda</small>
    </h4>    
                

                <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Información util</h3>
                                     <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div id="accordion" class="box-group">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse">
                                                                                                   
                                                     <h3>  <b> DC-1 Comisiones Mixtas de Capacitacion y Adiestramiento</b></h3>
                                                  
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse in" id="collapseOne">
                                                <div class="box-body">
 <h4>Artículo 7. Las Comisiones Mixtas de Capacitación, Adiestramiento y Productividad deberán constituirse en cada empresa que cuente con más de 50 trabajadores, e integrarse de manera bipartita y paritaria, por igual número de representantes de los trabajadores y del patrón.</h4>
                                                <h4>Las Comisiones Mixtas de Capacitación, Adiestramiento y Productividad, deberán realizar las siguientes funciones:</h4>
                                                <br>
                                                <h4><br>I.	Vigilar, instrumentar, operar y mejorar los sistemas y los programas de capacitación y adiestramiento;</br>
                                                    <br>II.	Proponer los cambios necesarios en la maquinaria, los equipos, la organización del trabajo y las relaciones laborales, de conformidad con las mejores prácticas tecnológicas y organizativas que incrementen la productividad en función de su grado de desarrollo actual;</br>
                                                    <br>III.	Proponer las medidas acordadas, con el propósito de impulsar la capacitación, medir y elevar la productividad, así como garantizar el reparto equitativo de sus beneficios;</br>
                                                   <br> IV.	Vigilar el cumplimiento de los acuerdos de productividad;</br>
                                                  <br>  V.	Resolver las objeciones que, en su caso, presenten los trabajadores con motivo de la distribución de los beneficios de la productividad;</br>
                                                                                                 		                         
                                                
                                                </h4>                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel box box-danger">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse">
                                                       <h3>  <b> DC-2 Planes y Programas de Capacitación, Adiestramiento y Productividad</b></h3>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="collapseTwo">
                                                <div class="box-body">
                                                <h4><br>Artículo 9. Los planes y programas de capacitación se elaborarán mediante el formato DC-2 “Elaboración del plan y programas de capacitación, adiestramiento y productividad”, según el modelo anexo, dentro de los sesenta días hábiles siguientes al inicio de operaciones en el centro de trabajo</br>
                                                
                                                <br>Artículo 10. Para la elaboración de los planes y programas se deberá:</br>
<br>I.	Tomar en cuenta las necesidades de capacitación y adiestramiento de todos los puestos y niveles de trabajo existentes en la empresa;</br>
<br>II.	Precisar el número de etapas durante las cuales se impartirán;</br>
<br>III.	Indicar si se trata de planes y programas de capacitación y adiestramiento específicos para una empresa; comunes para varias empresas o bien si se encuentran adheridos a un sistema general de capacitación y adiestramiento por rama o actividad; y, en su caso, los establecimientos en los que  se aplica;</br>
<br>IV.	Establecer periodos no mayores de dos años;	</br>
<br>V.	Considerar la impartición de la capacitación o adiestramiento por conducto del personal de la propia empresa, instructores especialmente contratados, instituciones, escuelas u organismos especializados;</br>
                                                
                                                                                                    
                                                </h4>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                                 <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a href="#collapseThree" data-parent="#accordion" data-toggle="collapse">
                                                        <h3>  <b> DC-3 Agentes Capacitadores Externos</b></h3>
                                                    </a>
                                                    
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="collapseThree">
                                                <div class="box-body">
                                                <h4>
                                                
                                                <br>
                                                Artículo 16. Los Agentes Capacitadores Externos deberán solicitar su autorización y registro ante la Secretaría, así como el registro de los programas y cursos de capacitación que deseen impartir de conformidad con lo siguiente:
                                                </br>
                                                <br>I.	Cuando se trate de instituciones, escuelas u organismos especializados de capacitación deberán presentar el Formato DC-5 “Solicitud de Registro de Agente Capacitador Externo”, según modelo anexo y acompañar la siguiente documentación:</br>
                                                <br> II.	Cuando se trate de instructores independientes, deberán presentar el formato DC-5 “Solicitud de Registro de Agente Capacitador Externo”, según modelo anexo y la siguiente documentación:</br>
                                                <br>Artículo 17. Cuando se hayan presentado de forma personal los documentos correspondientes, la Secretaría entregará de forma inmediata el acuse de recibo correspondiente.
Si la solicitud se presentó por correo certificado o servicios de mensajería, el acuse de recibo será enviado al solicitante el día hábil siguiente a la fecha de recepción de la solicitud, devolviendo la documentación original que hubiese acompañado, de conformidad con lo establecido en el artículo 27, segundo párrafo del presente Acuerdo.
                                                </br>
                                                </h4>
                                              <br>   
                                                </div>
                                            </div>
                                        </div>
                                                                                                                        
                                        <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a href="#collapseFour" data-parent="#accordion" data-toggle="collapse">
                                                        <h3>  <b> DC-4 Listas de Constancias de Competencias o de Habilidades Laborales</b></h3>
                                                    </a>
                                                    
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="collapseFour">
                                                <div class="box-body">
                                                <h4>
                                                
                                                <br>
                                            


<h4>Artículo 24. La constancia de competencias o de habilidades laborales deberá:<br>

<br><b>I.	Expedirse por:<br></b>

     <br>a.	La entidad instructora cuando se trate de agentes capacitadores externos;<br>

     <br>b.	Por la empresa, cuando se trate de instructores internos;<br>

     <br>c.	Las empresas de las que se haya adquirido un bien o servicio;<br>

     <br>d.	Extranjeros que impartan capacitación a trabajadores mexicanos en territorio nacional o cuando la capacitación se realice en el extranjero, y<br>

     <br>e.	Autoridades competentes de la Secretaría.<br>

<br><b>II.	Autentificarse por la Comisión Mixta de Capacitación, Adiestramiento y Productividad en las empresas con más de 50 trabajadores o por el patrón o representante legal en las empresas hasta con 50 trabajadores; en este último caso se omitirá la firma del representante de los trabajadores</b><br>
  
  <br>	La Comisión Mixta de Capacitación, Adiestramiento y Productividad por unanimidad de sus integrantes, podrá acordar la forma en que autentificará las constancias de habilidades laborales.
	Se podrá hacer uso de firmas en imagen digitalizada en sustitución de firmas autógrafas. En caso de elegir esta última opción, se deberán conservar en los archivos de la empresa, a disposición de la Secretaría, los convenios respectivos de la Comisión respecto del uso de las firmas autógrafas autorizadas para ser digitalizadas, así como las especificaciones para comprobar su veracidad y para garantizar su adecuado uso.<br>

	<br><b>III.	Entregarse a los trabajadores que:</b><br>
	
<br> a.	Aprueben el curso de capacitación, mediante la evaluación  correspondiente, dentro de los veinte días hábiles siguientes al término del mismo, o
<br> b.	Aprueben el examen de suficiencia, aplicado por el agente capacitador, cuando se nieguen a recibir capacitación.
<br><b>IV.	Elaborarse utilizando cualquiera de las siguientes opciones:</b><br>
<br> a.	El formato DC-3 “Constancia de competencias o de habilidades laborales”, según modelo anexo.<br>
<br>b.	El formato disponible en el sistema informático ubicado en la página de Internet www.stps.gob.mx.<br>

<br> De seleccionar esta opción, las empresas tendrán la posibilidad de emitir las constancias de competencias o de habilidades laborales de sus trabajadores a través del sistema informático, así como elaborar la lista de constancias de competencias o de habilidades laborales, incluyendo únicamente los datos faltantes.<br>
<br> c.	Un documento elaborado por la empresa al que se denominará “Constancia de Competencias o de Habilidades Laborales”, y que deberá contener, al menos, la información siguiente:<br>
<br>1.	Del trabajador: apellido paterno, materno y nombre(s); Clave Única de Registro de Población y ocupación específica en la empresa (según Catálogo);<br>
<br>2.	De la empresa: nombre o razón social (en caso de ser persona física anotar apellido paterno, materno y nombre(s) y Registro Federal de Contribuyentes con homoclave;<br>
<br>3.	Del programa de capacitación, adiestramiento y productividad: nombre del curso; duración en horas; periodo de ejecución; área temática del curso (según Catálogo);<br>
<br>4.	Nombre del Agente Capacitador Externo, cuando se trate de una institución, escuela u organismo; o nombre de la empresa cuando se trate de un instructor interno de la misma;<br>
<br>5.	Nombre y firma del instructor, en el caso de cursos a distancia, será suficiente anotar el nombre del tutor en línea, y<br>
<br>6.	Nombre y firma de los representantes de los trabajadores y de la empresa, integrantes de la Comisión Mixta de Capacitación, Adiestramiento y Productividad o en su caso del patrón o representante legal.<br>
<br>La información de los catálogos relativos a la ocupación específica del trabajador en la empresa y a las áreas temáticas del curso, para las empresas que no expidan las constancias a través del sistema informático, se encuentran disponibles en el propio sistema ubicado en la página de Internet www.stps.gob.mx, en caso contrario dichos catálogos se encuentran en el reverso del formato DC-3 “Constancia de Competencias o de Habilidades Laborales”, según modelo anexo .<br>
<br>Artículo 25. En todos los casos, se podrán incluir en las constancias de competencias o de habilidades laborales solamente los logotipos, imágenes o membretes que identifiquen a la empresa y, en su caso, al agente capacitador. A excepción de las constancias emitidas por la Secretaría, no se deberán utilizar imágenes, ni textos que identifiquen o hagan referencia a que la Secretaría avala el desarrollo, contenido o calidad de los cursos y/o que cuenta con el reconocimiento o validez por parte de la misma.<br>
<br>Artículo 26. Las empresas deberán hacer del conocimiento de la Secretaría, para su registro y control, las listas de las constancias de competencias o de habilidades laborales, que contendrán la información de la capacitación o adiestramiento otorgado a los trabajadores como resultado de las acciones realizadas conforme al plan y programas de capacitación, adiestramiento y productividad, tomando en consideración  lo siguiente:<br>
<br><b>I.	Dentro de los sesenta días hábiles posteriores al término de cada año de los planes y programas de capacitación, adiestramiento y productividad y al finalizar el mismo, aun cuando no haya cumplido un año completo, las empresas deberán presentar la información correspondiente a los siguientes rubros :</b><br>
<br>a.	Los datos generales de la empresa;<br>
<br>b.	La vigencia del plan y programas de capacitación, adiestramiento y productividad;<br>
<br>c.	Los datos generales del trabajador;<br>
<br>d.	La información de los cursos de capacitación recibidos por los trabajadores;<br>
<br>e.	Las certificaciones en Normas Técnicas de Competencia Laboral o su equivalente que, en su caso, comprueben tener los trabajadores, opcionalmente, y<br>
<br>f.	El grado máximo de estudios terminados con reconocimiento de validez oficial que los trabajadores proporcionen al patrón.<br>
	<br>Las empresas que tengan hasta 50 trabajadores podrán presentar su lista de constancias de competencias o de habilidades laborales por medios impresos o de forma electrónica.<br>
	Las empresas con más de 50 trabajadores deberán presentar su lista de constancias de competencias o de habilidades laborales, de forma electrónica.<br>
	Las empresas que no hayan registrado algún plan y programas de capacitación y adiestramiento de sus trabajadores ante la Secretaría, deberán observar lo establecido en el Artículo Primero Transitorio del presente Acuerdo.
	Cuando las empresas opten por realizar el trámite a través de medios electrónicos, deberán ingresar a la página de Internet de la Secretaría en la dirección www.stps.gob.mx, y seguir las instrucciones que se indiquen en la liga referente a la presentación de las listas de constancias de competencias o de habilidades laborales. En caso de realizarlo de manera personal, deberán presentar el formato DC-4 “Lista de constancias de competencias o de habilidades laborales”, según modelo anexo. De utilizar la primera opción, la información se incorporará a la base de datos de la Secretaría con el propósito de que en lo sucesivo sólo se hagan las actualizaciones correspondientes.<br>
<br><b>II.	De proceder la solicitud en tiempo y forma, la Secretaría emitirá un acuse de recibo el mismo día en que se realice la presentación de las listas de constancias, ya sea que ésta se efectúe en ventanilla o bien por medios electrónicos, en cuyo caso se proporcionará el acuse por esta misma vía;<br>
<br><b>III.	Las empresas deberán tener a disposición de la Secretaría, como parte de sus registros internos, copia de las constancias de competencias o de habilidades laborales expedidas a sus trabajadores durante el último año, ya  sea en papel o en archivos electrónicos que conserven la imagen de la constancia entregada, y<br>
<br><b>IV.	La Secretaría incluirá y administrará en la base de datos del Padrón de Trabajadores Capacitados, la información de los trabajadores presentada por las em
<br>presas en las listas de constancias de competencias o de habilidades laborales.</b><br>
<br>   
                                             
</h4>
                                                </h4>
                                             
                           
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
       
                                        
                                        
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">    
									                     <div class="box box-info">
									                                <div class="box-header ui-sortable-handle" style="cursor: move;">
									                                    <i class="fa fa-envelope"></i>
									                                    <h3 class="box-title">Enviar correo a soporte tecnico</h3>
									                                    <div class="box-tools pull-right">
            <button title="ocultar/mostrar" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-xs" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-default btn-xs" data-original-title="Remove"><i class="fa fa-times"></i></button>
          </div>
									                                    <!-- tools box -->
									                                   
																	                                                            
										</div>
										<div class="box-body">
										 <?php 
										 
										 $concact = new ContactForm();
										 $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($concact, 'name') ?>
                <?= $form->field($concact, 'email') ?>
                <?= $form->field($concact, 'subject') ?>
                <?= $form->field($concact, 'body')->textArea(['rows' => 6]) ?>
              
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            </div>
                        
                        </div>
                    </div>
                    </div>