<?php

class tipoEvidencia{

	var $idtipoEvidencia;
	var $nombreEvidencia;
	var $descripcionEvidencia;

	function __construct($idtipoEvidencia, $nombreEvidencia,$descripcionEvidencia){
		$this -> idtipoEvidencia = $idtipoEvidencia;
		$this -> nombreEvidencia = $nombreEvidencia;
		$this -> descripcionEvidencia = $descripcionEvidencia;
		
	}

	function setidtipoEvidencia($idtipoEvidencia){
		$this -> idtipoEvidencia = $idtipoEvidencia;
	}

	function getidtipoEvidencia(){
		return $this -> idtipoEvidencia;

	}

	function setnombreEvidencia($nombreEvidencia){
		$this -> nombreEvidencia = $nombreEvidencia;
	}

	function getnombreEvidencia(){
		return $this -> nombreEvidencia;
	}

	function setdescripcionEvidencia($descripcionEvidencia){
		$this -> descripcionEvidencia = $descripcionEvidencia;
	}

	function getdescripcionEvidencia(){
		return $this -> descripcionEvidencia;
	}

	

}

?>