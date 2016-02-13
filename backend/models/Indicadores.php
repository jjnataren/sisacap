<?php
namespace backend\models;

use backend\models\EmpresaUsuario;
use backend\models\ComisionMixtaCap;
use backend\models\IndicadorComision;
use backend\models\Plan;
use backend\models\Curso;
use yii\base\Object;


class Indicadores
{
	  
	
	
/**
 * 
 * @param ComisionMixtaCap $comisionMixta
 */	
public static function  setIndicadoresComision($comisionMixta){
	

		$companyModel = EmpresaUsuario::getMyCompany();
	
	if ($comisionMixta !== null){
		
		
		foreach ($comisionMixta->indicadorComisions as $indicador){
			
			$indicador->delete(); // se eliminan los indicadores previamente cargados
		}
		
		
		
		/**
		 * Indicadores rules
		 */
		
		$fechaConstitucion = new \DateTime( $comisionMixta->FECHA_CONSTITUCION);
		
		
		
		/**
		 * Indicador reporte debe ser enviado  a los doce meses a partir de la constitucion
		 */
		if ($fechaConstitucion !== false){
			
			
			$modelIndicador = new IndicadorComision();
			
			$modelIndicador->ACTIVO = 1;
			
			$modelIndicador->FECHA_INICIO_VIGENCIA = $fechaConstitucion->modify('+360 day')->format('Y-m-d');
			
			$modelIndicador->FECHA_FIN_VIGENCIA = $fechaConstitucion->modify('+10 day')->format('Y-m-d');
			$modelIndicador->TITULO = 'Generar reporte anual';
			
			$modelIndicador->DESCRIPCION = "La empresa deberá mantener en sus registros internos y presentar a la secretaría cuando ésta
así lo requiera la información sobre el informe anual de las actividades realizadas dentro da la comisión mixta de capacitación, adiestramiento y productividad.";
			
			$modelIndicador->DATA = "Es necesario generar un reporte anual de actividades que se hayan realizado en la comisión mixta";
			
			$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
			
			$modelIndicador->CLAVE ="COM0002";
			
			$modelIndicador->ID_COMISION  = $comisionMixta->ID_COMISION_MIXTA;
			
			$modelIndicador->save();
			
			
		}
	
		
		/**
		 * Indicadores comision
		 */
		
		$fechaConstitucion = new \DateTime( $comisionMixta->FECHA_CONSTITUCION);
		
		
		/**
		 * Regla para validar que se debe constituir la comision
		 */
		if ($comisionMixta->getCurrentStatus() < ComisionMixtaCap::STATUS_VALIDADA && $fechaConstitucion !== false){
			
			
			$modelIndicador = new IndicadorComision();
				
			$modelIndicador->ACTIVO = 1;
				
			$modelIndicador->FECHA_INICIO_VIGENCIA = $fechaConstitucion->modify('-5 day')->format('Y-m-d');
				
			$modelIndicador->FECHA_FIN_VIGENCIA = $fechaConstitucion->modify('+10 day')->format('Y.m-d');


			$modelIndicador->TITULO = 'Generar reporte DC-1';
			
			$modelIndicador->DESCRIPCION = " La empresa deberá mantener en sus registros internos y presentar a la Secretaría, cuando ésta así lo requiera, la información de la constitución de la comisión mixta de capacitación, adiestramiento y productividad, para ello se deberá generar, imprimir, firmar y adjuntar 
					el Formato DC-1 INFORME SOBRE LA CONSTITUCIÓN DE LA COMISIÓN MIXTA DE CAPACITACIÓN, ADIESTRAMIENTO Y PRODUCTIVIDAD.   "	;
				
			$modelIndicador->DATA = "Es necesario generar el reporte DC-1 y adjuntarlo a la comisión mixta de capacitación.";
			$modelIndicador->CLAVE="COM0001";	
			$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
				
			$modelIndicador->ID_COMISION  = $comisionMixta->ID_COMISION_MIXTA;
				
			$modelIndicador->save();
			
		}
		
		
				
	}
	
}	
	





/**
 * 
 * @param Plan $plan
 */
public static function setIndicadorPlan($plan){
	
	$companyModel = EmpresaUsuario::getMyCompany();
	
	if ($plan !== null){
		
		foreach ($plan->indicadorPlans as $indicador){
			
			$indicador->delete();
			
			
		}
		
		
		$fechaInicioPlan = new \DateTime($plan->VIGENCIA_INICIO);
		
		
		/**
		 * Indicador para enviar reporte anual
		 */
		if ($fechaInicioPlan !== false){
			
			$indicadorInformeAnual = new IndicadorPlan();
			
			$inicio = new \DateTime($fechaInicioPlan->format('Y'). '-12-20');
			
			$indicadorInformeAnual->FECHA_INICIO_VIGENCIA = $inicio->format('Y-m-d');
			
			$indicadorInformeAnual->FECHA_FIN_VIGENCIA = $inicio->modify('+20 day')->format('Y-m-d');
			
			$indicadorInformeAnual->ACTIVO = 1;
			
			$indicadorInformeAnual->TITULO = 'Generar reporte anual';
			
			$indicadorInformeAnual->DATA = 'La empresas deberán mantener a disposición de la Secretaría, la información sobre las actividades  realizadas durante el último año,  por lo que será necesario realizarla a la brevedad.  ';
					
			$indicadorInformeAnual->CLAVE="PLAN0003";		
					
			
			$indicadorInformeAnual->FECHA_CREACION = $inicio->format('Y-m-d');
			
			$indicadorInformeAnual->ID_PLAN = $plan->ID_PLAN;
			
			$indicadorInformeAnual->ID_USUARIO = $companyModel->ID_USUARIO;
			
			$indicadorInformeAnual->save();
			
			
			
			
			
		}
		
		
		/**
		 * Indicadores rules
		 */
		
		$fechaInfo = new \DateTime($plan->FECHA_INFO);
		
		
		/**
		 * Regla para validar que se debe constituir EL PLAN 
		*/
		if ($plan->getCurrentStatus() < Plan::STATUS_VALIDADO && $fechaInfo !== false){
				
				
			$modelIndicador = new IndicadorPlan();
		
			$modelIndicador->ACTIVO = 1;
		
			$modelIndicador->FECHA_INICIO_VIGENCIA= $fechaInfo->modify('-5 day')->format('Y-m-d');
		
			$modelIndicador->FECHA_FIN_VIGENCIA = $fechaInfo->modify('+10 day')->format('Y-m-d');
		
			$modelIndicador->TITULO = "Debe constituir su plan ";
			
			$modelIndicador->CLAVE="PLAN0002";
		
			$modelIndicador->DATA = "Es necesario generar el reporte DC-2 y adjuntarlo al plan.";
		
			$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
		
		$modelIndicador->ID_PLAN  = $plan->ID_PLAN;
		
			$modelIndicador->save();
				
		}
				
		
		/**
		 * Validacion de los cursos
		 */
		foreach ($plan->cursos as $curso){
		
			
			Indicadores::setIndicadorCurso($curso);
		
			
		}
		
	}
	
	
	
	

	$fechaInicio = new \DateTime($plan->VIGENCIA_INICIO);
	

	/**
	 * Indicador Inicio del plan
	*/
	if ($fechaInicio !== false){
			
		$indicadorInicio = new IndicadorPlan();
			
			
			
		$indicadorInicio->FECHA_INICIO_VIGENCIA = $fechaInicio->modify('-5 day')->format('Y-m-d');

		$indicadorInicio->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+10 day')->format('Y-m-d');
		
		
		$indicadorInicio->ACTIVO = 1;
			
		$indicadorInicio->TITULO = ' El plan '. $plan->ALIAS.' iniciara en 5 días ';
			
		$indicadorInicio->DATA = 'Plan ID '. $plan->ID_PLAN.'  '.'<br />  La empresa deberá crear cursos para impartirlos durante su plan';
		
		$indicadorInicio->FECHA_CREACION = date("Y-m-d H:i:s");
		$indicadorInicio->CLAVE="PLAN0001";
		$indicadorInicio->ID_PLAN = $plan->ID_PLAN;
			
		$indicadorInicio->ID_USUARIO = $companyModel->ID_USUARIO;
			
		$indicadorInicio->save();
			
			
					
	}
	
	
	
	
	
	
	$fechaFin = new \DateTime($plan->VIGENCIA_FIN);
	
	
	/**
	 * Indicador Fecha termino del plan
	*/
	if ($fechaFin !== false){
			
		$indicadorFin = new IndicadorPlan();

		$indicadorFin->FECHA_INICIO_VIGENCIA = $fechaFin->modify('-5 day')->format('Y-m-d');
		
		
		$indicadorFin->FECHA_FIN_VIGENCIA= $fechaFin->modify('-10 day')->format('Y-m-d');
			
		$indicadorFin->ACTIVO = 1;
		
		//"Curso ID ".$curso->ID_CURSO. ' por iniciar';
		$indicadorFin->TITULO = ' El Plan '. $plan->ALIAS . ' concluirá en 15 dias';
		
		$indicadorFin->DATA = 'Las empresas deberán mantener a disposición de la Secretaría, la siguiente información:
     	El formato DC-2 “Elaboración del plan y programas de capacitación, adiestramiento y productividad”;
				';
			
		$indicadorFin->FECHA_CREACION = date("Y-m-d H:i:s");
		$indicadorFin->CLAVE="PLAN0004";	
		$indicadorFin->ID_PLAN = $plan->ID_PLAN;
			
		$indicadorFin->ID_USUARIO = $companyModel->ID_USUARIO;
			
		$indicadorFin->save();
			
			
			
			
			
	}
	
	
	
	
}




/**
 *
 * @param Curso $curso
 */
public static function setIndicadorCurso($curso){

	$companyModel = EmpresaUsuario::getMyCompany();

	if ($curso !== null ){

		foreach ($curso->indicadorCursos as $indicador){
				
			$indicador->delete();
				
				
		}





			$fechaTerminoCurso = new \DateTime($curso->FECHA_TERMINO);
				
			if ($fechaTerminoCurso !== false){
					
					
				$modelIndicador = new IndicadorCurso();

				$modelIndicador->ACTIVO = 1;

				$modelIndicador->FECHA_INICIO_VIGENCIA= $fechaTerminoCurso->modify('-15 day')->format('Y-m-d');

				$modelIndicador->FECHA_FIN_VIGENCIA = $fechaTerminoCurso->modify('+20 day')->format('Y-m-d');

				$modelIndicador->TITULO =  'Curso por terminar';
					
				$modelIndicador->CLAVE="CUR0002";

				$modelIndicador->DATA = 'Curso por concluir, debe enviar las constancias de capacitación a  los trabajadores 20  días después  del termino del mismo.';

				$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;

				$modelIndicador->ID_CURSO  = $curso->ID_CURSO;

				$modelIndicador->save();
					
			}
				
			/*
			 * Indicador inicio del curso */
				
			$fechaInicio = new \DateTime($curso->FECHA_INICIO);

			if ($fechaInicio !== false){
					
					
				$modelIndicador = new IndicadorCurso();
					
				$modelIndicador->ACTIVO = 1;
					
				$modelIndicador->FECHA_INICIO_VIGENCIA= $fechaInicio->modify('-5 day')->format('Y-m-d');
					
				$modelIndicador->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+5 day')->format('Y-m-d');
					
				$modelIndicador->TITULO = 'Curso por  Iniciar';
					
				$modelIndicador->DATA = 'El curso esta por iniciar, deberá calificar a los trabajadores.';
				$modelIndicador->CLAVE="CUR0002";
				$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
					
				$modelIndicador->ID_CURSO  = $curso->ID_CURSO;
					
				$modelIndicador->save();
					
			}
			
			
			//INDICADORES PARA EL INSTRUCTOR 
			
			/*
			 * Indicador inicio del curso */
				
			$fechaInicio = new \DateTime($curso->FECHA_INICIO);
				
			if ($fechaInicio !== false){
					
					
				$modelIndicador = new IndicadorCurso();
					
				$modelIndicador->ACTIVO = 1;
					
				$modelIndicador->FECHA_INICIO_VIGENCIA= $fechaInicio->modify('-5 day')->format('Y-m-d');
					
				$modelIndicador->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+5 day')->format('Y-m-d');
					
				$modelIndicador->TITULO = 'Curso por  Iniciar';
					
				$modelIndicador->DATA = 'Está por iniciar un curso, deberá preparar todo lo necesario para impartir el curso.';
				$modelIndicador->CLAVE="CUR0003";
				$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
					
				$modelIndicador->ID_CURSO  = $curso->ID_CURSO;
					
				$modelIndicador->save();
					
			}
			
			$fechaTerminoCurso = new \DateTime($curso->FECHA_TERMINO);
			
			if ($fechaTerminoCurso !== false){
					
					
				$modelIndicador = new IndicadorCurso();
			
				$modelIndicador->ACTIVO = 1;
			
				$modelIndicador->FECHA_INICIO_VIGENCIA= $fechaTerminoCurso->modify('-15 day')->format('Y-m-d');
			
				$modelIndicador->FECHA_FIN_VIGENCIA = $fechaTerminoCurso->modify('+20 day')->format('Y-m-d');
			
				$modelIndicador->TITULO =  'Curso por terminar';
					
				$modelIndicador->CLAVE="CUR0004";
			
				$modelIndicador->DATA = 'El curso está por terminar, favor de concluir con la firma de constancias faltantes.';
			
				$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
			
				$modelIndicador->ID_CURSO  = $curso->ID_CURSO;
			
				$modelIndicador->save();
					
			}
			
			
			/*FECHA DE TERMINO MAS 2 MESES*/

			$fechaTerminoCurso = new \DateTime($curso->FECHA_TERMINO);
				
			if ($fechaTerminoCurso !== false){
					
					
				$modelIndicador = new IndicadorCurso();
					
				$modelIndicador->ACTIVO = 1;
					
				$modelIndicador->FECHA_INICIO_VIGENCIA= $fechaTerminoCurso->format('Y-m-d');
									
				$modelIndicador->FECHA_FIN_VIGENCIA = $fechaTerminoCurso->modify('+60 day')->format('Y-m-d');
					
				$modelIndicador->TITULO =  'Curso finalizado';
					
				$modelIndicador->CLAVE="CUR0005";
					
				$modelIndicador->DATA = 'El curso ha terminado tiene 2 meses para calificar y firmar las constancias de los trabajadores.';
					
				$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
					
				$modelIndicador->ID_CURSO  = $curso->ID_CURSO;
					
				$modelIndicador->save();
					
			}
				
	}


}




/**
 * indicadores de las constancias 
 * @param Constancia $constancia
 */
public static function setIndicadorConstancia($constancia){
	
	//$companyModel = EmpresaUsuario::getMyCompany();



	foreach ($constancia->indicadorConstancias as $indicadorConstancia){
		
		$indicadorConstancia->delete();
	} 
	
	
	if ($constancia !== null){
		
		/**
		 * Indicador "Una vez emitida la constancia se debe entregar al trabajador  en no  mas e 20 dias"
		 */
		
		if ($constancia->ESTATUS == Constancia::STATUS_SIGNED_REPRESENTATIVE){
		
		
			$fechaInicio = new \DateTime($constancia->ULTIMA_MODIFICACION);
		
			if ($fechaInicio!== false){
		
				$indicador = new IndicadorConstancia();
		
		
				$indicador->TITULO  = 'Enviar la constancia al trabajador';
		
				$indicador->ID_CONSTANCIA = $constancia->ID_CONSTANCIA;
		
				$indicador->ACTIVO = 1;
		
				$indicador->DATA = 'Se deberá entregar a los trabajadores que aprueben el curso de capacitación o el examen de suficiencia, dentro de los veinte días hábiles posteriores al término del mismo.
						 Las empresas deberán tener a disposición de la Secretaría, como parte de sus registros internos,
						copia de las constancias de competencias o de habilidades laborales expedidas a sus trabajadores durante el último año';
		
				$indicador->FECHA_CREACION = date("Y-m-d H:i:s");
		
				$indicador->CLAVE = "CON0001";
		
				$indicador->FECHA_INICIO_VIGENCIA = $fechaInicio->modify('-1 day')->format('Y-m-d');
		
				$indicador->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+20 day')->format('Y-m-d');
		
				$indicador->save();
		
		
			}
		
		
		}
		
				
		/**
		 * Indicador "caundo una constancia este erronea y la rechaza el instructor "
		 */
		
		
		if ($constancia->ESTATUS == Constancia::STATUS_REJECTED ){
				
				
			$fechaInicio = new \DateTime($constancia->ULTIMA_MODIFICACION);
				
			if ($fechaInicio!== false){
		
				$indicador = new IndicadorConstancia();
		
		
				$indicador->TITULO  = 'Constancia rechazada';
		
				$indicador->ID_CONSTANCIA = $constancia->ID_CONSTANCIA;
		
				$indicador->ACTIVO = 1;
		
				$indicador->DATA = 'El instructor  encontró algún impedimento para generar esta constancia, deberá comentar el motivo por el cual la rechazo.';
		
				$indicador->FECHA_CREACION = date("Y-m-d H:i:s");
		
				$indicador->CLAVE = "CON0002";
		
				$indicador->FECHA_INICIO_VIGENCIA = $fechaInicio->modify('-1 day')->format('Y-m-d');
		
				$indicador->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+20 day')->format('Y-m-d');
		
				$indicador->save();
		
		
			}
			
			
				
				
		}
		/**
		 * Indicador "caundo una constancia este erronea y la rechaza el MANAGER "
		 */
		
		
		if ($constancia->ESTATUS == Constancia::STATUS_RECHAZADA_MANAGER ){
		
		
			$fechaInicio = new \DateTime($constancia->ULTIMA_MODIFICACION);
		
			if ($fechaInicio!== false){
		
				$indicador = new IndicadorConstancia();
		
		
				$indicador->TITULO  = 'Constancia rechazada';
		
				$indicador->ID_CONSTANCIA = $constancia->ID_CONSTANCIA;
		
				$indicador->ACTIVO = 1;
		
				$indicador->DATA = 'El manager encontró una anomalía en la constancia, favor de hacer las correcciones necesarias para esta constancia.';
		
				$indicador->FECHA_CREACION = date("Y-m-d H:i:s");
		
				$indicador->CLAVE = "CON0003";
		
				$indicador->FECHA_INICIO_VIGENCIA = $fechaInicio->modify('-1 day')->format('Y-m-d');
		
				$indicador->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+20 day')->format('Y-m-d');
		
				$indicador->save();
		
		
			}
		}
		
		/**
		 * Indicador "el intructor asigna una constancia"
		 */
		
		if ($constancia->ESTATUS == Constancia::STATUS_ASIGNADA){
		
		
			$fechaInicio = new \DateTime($constancia->ULTIMA_MODIFICACION);
		
			if ($fechaInicio!== false){
		
				$indicador = new IndicadorConstancia();
		
		
				$indicador->TITULO  = 'Constancia asignada';
		
				$indicador->ID_CONSTANCIA = $constancia->ID_CONSTANCIA;
		
				$indicador->ACTIVO = 1;
		
				$indicador->DATA = 'El manager ha asignado una constancia para usted, favor de hacer la evaluación correspondiente.';
		
				$indicador->FECHA_CREACION = date("Y-m-d H:i:s");
		
				$indicador->CLAVE = "CON0004";
		
				$indicador->FECHA_INICIO_VIGENCIA = $fechaInicio->modify('-1 day')->format('Y-m-d');
		
				$indicador->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+20 day')->format('Y-m-d');
		
				$indicador->save();
		
		
			}
		
		
		}
		
		/**
		 * Indicador "Constancias recibidas"
		 */
		
		
		if ($constancia->ESTATUS == Constancia::STATUS_SIGNED_INSTRUCTOR ){
		
		
			$fechaInicio = new \DateTime($constancia->ULTIMA_MODIFICACION);
		
			if ($fechaInicio!== false){
		
				$indicador = new IndicadorConstancia();
		
		
				$indicador->TITULO  = 'Constancia recibida';
		
				$indicador->ID_CONSTANCIA = $constancia->ID_CONSTANCIA;
		
				$indicador->ACTIVO = 1;
		
				$indicador->DATA = 'Esta constancia ha sido expedida por el instructor, favor de revisar que los datos sean correctos y satisfactorios.';
		
				$indicador->FECHA_CREACION = date("Y-m-d H:i:s");
		
				$indicador->CLAVE = "CON0005";
		
				$indicador->FECHA_INICIO_VIGENCIA = $fechaInicio->modify('-1 day')->format('Y-m-d');
		
				$indicador->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+20 day')->format('Y-m-d');
		
				$indicador->save();
		
		
			}
		
		
		}
		
		/**
		 * Indicador "Constancias recibidas por los trabajadores"
		 */
			
			
		if ($constancia->ESTATUS !== 9999){
				
				
			$fechaInicio = new \DateTime($constancia->ULTIMA_MODIFICACION);
				
			if ($fechaInicio!== false){
					
				$indicador = new IndicadorConstancia();
					
					
				$indicador->TITULO  = 'Constancia recibida';
					
				$indicador->ID_CONSTANCIA = $constancia->ID_CONSTANCIA;
					
				$indicador->ACTIVO = 1;
					
				$indicador->DATA = 'El trabajador ha recibido la constancia satisfactoriamente.';
					
				$indicador->FECHA_CREACION = date("Y-m-d H:i:s");
					
				$indicador->CLAVE = "CON0006";
					
				$indicador->FECHA_INICIO_VIGENCIA = $fechaInicio->format('Y-m-d');
					
				$indicador->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+20 day')->format('Y-m-d');
					
				$indicador->save();
					
					
			}
				
				
		}
		
		
		
		
		
	}
	
	
}


}