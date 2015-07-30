<?php
namespace backend\models;

use backend\models\EmpresaUsuario;
use backend\models\ComisionMixtaCap;
use backend\models\IndicadorComision;
use backend\models\Plan;
use backend\models\Curso;


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
			
			$modelIndicador->DESCRIPCION = "La empresa deberá mantener en sus registros internos y presentar a la Secretaría, cuando ésta
					 así lo requiera, la información sobre el  informe anual de las actividades realizadas dentro da la comision mixta de capacitación, adiestramiento y productividad.";
			
			$modelIndicador->DATA = "Es necesario genearar un reporte anual de actividades que se hayan realizado en la comision mixta";
			
			$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
			
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
			
			$modelIndicador->DESCRIPCION = " La empresa deberá mantener en sus registros internos y presentar a la Secretaría, cuando ésta así lo requiera, la información de la constitucion de la comisión mixta de capacitación, adiestramiento y productividad, para ello se debera generar, imprimir, firmar y adjuntar 
					el Formato DC-1 INFORME SOBRE LA CONSTITUCIÓN DE LA COMISIÓN MIXTA DE CAPACITACIÓN, ADIESTRAMIENTO Y PRODUCTIVIDAD.   "	;
				
			$modelIndicador->DATA = "Es necesario generar el reporte DC-1 y adjuntarlo a la comisión mixta de capacitación.";
				
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
					
					
					
			
			$indicadorInformeAnual->FECHA_CREACION = date("Y-m-d H:i:s");
			
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
		if ($plan->getStatus() < Plan::STATUS_CONCLUIDO && $fechaInfo !== false){
				
				
			$modelIndicador = new IndicadorPlan();
		
			$modelIndicador->ACTIVO = 1;
		
			$modelIndicador->FECHA_INICIO_VIGENCIA= $fechaInfo->modify('-5 day')->format('Y-m-d');
		
			$modelIndicador->FECHA_FIN_VIGENCIA = $fechaInfo->modify('+10 day')->format('Y-m-d');
		
			$modelIndicador->TITULO = "Debe constituir su plan ";
		
			$modelIndicador->DATA = "Es necesario generar el reporte DC-2 y adjuntarlo al plan.";
		
			$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
		
		$modelIndicador->ID_PLAN  = $plan->ID_PLAN;
		
			$modelIndicador->save();
				
		}
		
		
		
		/**
		 * Validacion de los cursos
		 */
		foreach ($plan->cursos as $curso){
		
		
			$fechaTerminoCurso = new \DateTime($curso->FECHA_TERMINO);
			
			if ($fechaTerminoCurso !== false){
			
			
			$modelIndicador = new IndicadorPlan();
		
			$modelIndicador->ACTIVO = 1;
		
			$modelIndicador->FECHA_INICIO_VIGENCIA= $fechaTerminoCurso->modify('-5 day')->format('Y-m-d');
		
			$modelIndicador->FECHA_FIN_VIGENCIA = $fechaTerminoCurso->modify('+7 day')->format('Y-m-d');
		
			$modelIndicador->TITULO = "Curso ID ".$curso->ID_CURSO. ' por terminar';
		
			$modelIndicador->DATA = "El curso: <br /> ".$curso->NOMBRE.'esta por concluir debe enviar las constancias 15 dias antes a los  trabajadores.';
		
			$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
		
			$modelIndicador->ID_PLAN  = $plan->ID_PLAN;
		
			$modelIndicador->save();
			
			}
			
			/*
			 * indicador inicio del curso */
			
			$fechaInicio = new \DateTime($curso->FECHA_INICIO);
				
			if ($fechaInicio !== false){
					
					
				$modelIndicador = new IndicadorPlan();
			
				$modelIndicador->ACTIVO = 1;
			
				$modelIndicador->FECHA_INICIO_VIGENCIA= $fechaInicio->modify('-5 day')->format('Y-m-d');
			
				$modelIndicador->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+5 day')->format('Y-m-d');
			
				$modelIndicador->TITULO = "Curso ID ".$curso->ID_CURSO. ' por iniciar';
			
				$modelIndicador->DATA = "El curso: <br /> ".$curso->NOMBRE.' esta por iniciar, debe preparar a los trabajadores que recibiran el curso.';
			
				$modelIndicador->ID_USUARIO  = $companyModel->ID_USUARIO;
			
				$modelIndicador->ID_PLAN  = $plan->ID_PLAN;
			
				$modelIndicador->save();
					
			}
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
			
		$indicadorInicio->TITULO = 'Plan ID'. $plan->ID_PLAN.'iniciara en 5 días ';
			
		$indicadorInicio->DATA = 'El plan'. $plan->ALIAS.'iniciara en 10 días. La empresa deberá crear cursos para impartilos en durante su  plan';
		
		$indicadorInicio->FECHA_CREACION = date("Y-m-d H:i:s");
			
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
		$indicadorFin->TITULO = 'Plan '. $plan->ALIAS. 'concluirá en 15 dias';
		
		$indicadorFin->DATA = 'Las empresas deberán mantener a disposición de la Secretaría, la siguiente información:
     	El formato DC-2 “Elaboración del plan y programas de capacitación, adiestramiento y productividad”;
				';
			
		$indicadorFin->FECHA_CREACION = date("Y-m-d H:i:s");
			
		$indicadorFin->ID_PLAN = $plan->ID_PLAN;
			
		$indicadorFin->ID_USUARIO = $companyModel->ID_USUARIO;
			
		$indicadorFin->save();
			
			
			
			
			
	}
	
	
	
	
	
	
	
	
	
}



/**
 * 
 * @param Constancia $constancia
 */
public static function setIndicadorConstancia($constancia){
	
	$companyModel = EmpresaUsuario::getMyCompany();



	foreach ($constancia->indicadorConstancias as $indicadorConstancia){
		
		$indicadorConstancia->delete();
	} 
	
	
	if ($constancia !== null){
		
		/**
		 * Indicador "Una vez emitida la constancia se debe entregar al trabajador  en no  mas e 20 dias"
		 */
		
		if ($constancia->ESTATUS == Constancia::STATUS_CREATED){
			
			
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
				
				$indicador->FECHA_INICIO_VIGENCIA = $fechaInicio->modify('+3 day')->format('Y-m-d');
				
				$indicador->FECHA_FIN_VIGENCIA = $fechaInicio->modify('+20 day')->format('Y-m-d');
				
				$indicador->save();
				
				
			}
			
			
		}
		
		
	}
	
	
}


}