<?php

class SBDateTime{
	var $dia = 1;
	var $mes = 1;
	var $ano = 1900;
	
	function ehBissexto(){
		if($this->ano % 4 == 0)
			if($this->ano % 100 == 0)
				if($this->ano % 400 == 0)
					return true;
				else
					return false;
			else
				return true;
		else
			return false;
	}
	
	function setDia($dia){
		$this->dia = $dia;
	}
	
	 function setMes($mes){
		$this->mes = $mes;
	}
	
	 function setAno($ano){
		$this->ano = $ano;
	}
	
	function SBDateTime($data){		
		$a = (int)$data[0].$data[1].$data[2].$data[3];
		$m = (int)$data[5].$data[6];
		$d = (int)$data[8].$data[9];
		
		$this->setAno($a);
		$this->setMes($m);
		$this->setDia($d);		
     }
	
	 function  passaAno(){
		$this->ano++;
	}
	
	 function passaMes(){
		$this->mes++;
		if($this->mes == 13){
			$this->mes = 1;
			$this->passaAno();
		}
		if($this->mes<10)
			$this->mes = "0".$this->mes;
	}
	
	 function passaDia(){
		$this->dia++;		
		if($this->mes ==2){
			if($this->dia>28)
				if(!$this->ehBissexto()){
					$this->dia = 1;
					$this->passaMes();
				}
				else{
					if($this->dia == 30){
						$this->dia = 1;
						$this->passaMes();
					}
				}
				
		}
		
		elseif($this->mes < 8){
			if ($this->mes % 2 !=0){
				if($this->dia == 32){
					$this->dia = 1;
					$this->passaMes();
				}
				elseif($this->dia == 31){
					$this->dia = 1;
					$this->passaMes();
				}
			}
		}
		
		else{
			if($this->mes % 2 == 0){
				if($this->dia == 32){
					$this->dia = 1;
					$this->passaMes();
				}
				elseif($this->dia == 31){
					$this->dia = 1;
					$this->passaMes();
				}
			}
		}
		
		if($this->dia<10)
			$this->dia = "0".$this->dia;		
	}
	
	
	function passaAnos($anos){
		for ($i=0;$i<$anos;$i++)
			$this->passaAno();
	}
	
	 function passaMeses($meses){
		for ($i=0;$i<$meses;$i++)
			$this->passaMes();
	}
	
	 function passaDias($dias){
			for ($i=0;$i<$dias;$i++)
			$this->passaDia();
	}
	
	function voltaAno() {
		$this->ano--;
	}
	
	function voltaMes() {
		$this->mes--;
		if ($this->mes == 0) {
			$this->mes = 12;
			$this->voltaAno();
		}
		else if($this->mes<10)
			$this->mes = "0".$this->mes;
	}
	
	function voltaDia() {
		$this->dia--;
		if ($this->dia == 0) {
			$this->voltaMes();
			if ($this->mes == 2) {
				if(!$this->ehBissexto()){
					$this->dia = 28;
				}
				else{					
					$this->dia = 1;					
				}
			}
			elseif($this->mes < 8){
				if ($this->mes % 2 !=0){
					$this->dia = 31;
				}
				else{
					$this->dia = 30;
				}
			}
				
			else{
				if($this->mes % 2 == 0){
					$this->dia = 31;		
				}
				else{
					$this->dia = 30;
				}
			}
		}
		
		if($this->dia<10)
			$this->dia = "0".$this->dia;					
	}
	
	function voltaAnos($anos) {
		for ($i = 0; $i < $anos; $i++) {
			$this->voltaAno();
		}
	}
	
	function voltaMeses($meses){
		for ($i = 0; $i < $meses; $i++) {
			$this->voltaMes();
		}
	}
	
	function voltaDias($dias){
		for ($i = 0; $i < $dias; $i++) {
			$this->voltaDia();
		}
	}
	
	 function toString(){		
		return $this->ano.'-'.$this->mes.'-'.$this->dia;		
	}

	function compareTo($outraData){
		$outraData = new SBDateTime($outraData);
		if ($this->ano == $outraData->ano)
			if($this->mes == $outraData->mes)
				return $this->dia - $outraData->dia;
			else
				return $this->mes - $outraData->mes;
		else
			return $this->ano - $outraData->ano;
	}
	
}
?>