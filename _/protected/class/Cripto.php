<?php

class cripto{
	static function  criptografar($password){		
		$chave = $password."1701";
		$chave = base64_encode($chave);
		$chave = "".$chave."301";
		$chave = base64_encode($chave);
		return $chave;		
	}
	static function descriptografar($password){
		$valor = base64_decode($password);
		$valor = substr($valor,0,-3);
		$valor = base64_decode($valor);
		$valor = substr($valor,0,-4);
		return $valor;
	}		
}
?>