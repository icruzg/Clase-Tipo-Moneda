<?php
/*
	Clase para normalizar una cifra en formato moneda
	Descripción:
	  Recibe una cifra xxxx con o sin decimales retorna el mismo valor 
	  con simbolo de $ , con 2 decimales y dividido x comas
	ejemplo: 
		xxxx.x   =   $ x,xxx.xx
		Autor: Iv@n Cruz Garcia
		mail ivan.1133@gmail.com
		Twitter: ivan_1133
*/
	class CantidadNormaliza{
		var $m_cantidad;
		var $m_mantiza;
		var $m_Entero;
        var $m_cantidad_normalizada;
		 function CantidadNormaliza($cantidad){
			$this->m_cantidad=$cantidad;			
		}
		public function normalizar($signo,$coma){
			if(strpos($this->m_cantidad, '.')){
				$cadena= explode(".", $this->m_cantidad);
				$this->m_Entero= $cadena[0];				
				$this->m_mantiza=$cadena[1];	
				if(strlen($this->m_mantiza)==1){
					$this->m_mantiza.= "0";
				}				
			}
			else{
				$this->m_Entero=$this->m_cantidad;
				$this->m_mantiza="00";
			}
			// si la cifra de enteros es mayor a 3 separa con comas
			if(strlen($this->m_Entero)>3 && $coma==1){	
				$this->m_Entero= $this->Add_formato();
			}
			$this->m_cantidad_normalizada= $this->m_Entero.'.'.$this->m_mantiza;
			if($signo==1){
				return "$ ". $this->m_cantidad_normalizada;
			}
			return  $this->m_cantidad_normalizada;
		} // fin funcion separar
        // funcion que separa en comas la parte entera de la cifra
	    function Add_formato(){
	   		$can=$this->m_Entero;
	   		$miles="";
	   		$cientos="";
	   		$cuantos=strlen($can);
	   		$Cantidad_Formateada;
	   		if($cuantos>=3){
               // unidades de miles
	   			if($cuantos==4){
	   				$cientos=substr($can,1,strlen($can)-1);
	   				$miles=substr($can,0,strlen($can)-3);
	   			}
	   			if($cuantos==5 ){ // decenas de miles
	   				$cientos=substr($can,2,strlen($can)-1);
	   				$miles=substr($can,0,strlen($can)-3);
	   		   }
	   		   //centenas  de miles
	   		   if($cuantos==6 ){
	   		   		$cientos=substr($can,3,strlen($can)-1);
	   				$miles=substr($can,0,strlen($can)-3);
	   		   }
	   		}
	   		$Cantidad_Formateada=$miles.','.$cientos;
	   		return $Cantidad_Formateada;
		}
	} // fin de clase
?>