<?php

class Evidencia{

	var $idEvidencia;
	var $tituloEvidencia;
	var $fechaCreación;
	var $autorEvid;
	var $tipoEvid;

	function __construct($idEvidencia, $tituloEvidencia,$fechaCreación,$autorEvid,$tipoEvid){
		$this -> idEvidencia = $idEvidencia;
		$this -> tituloEvidencia = $tituloEvidencia;
		$this -> fechaCreación = $fechaCreación;
		$this -> autorEvid = $autorEvid;
		$this -> tipoEvid = $tipoEvid;
	}

	function setidEvidencia($idEvidencia){
		$this -> idEvidencia = $idEvidencia;
	}

	function getidEvidencia(){
		return $this -> idEvidencia;

	}

	function settituloEvidencia($tituloEvidencia){
		$this -> tituloEvidencia = $tituloEvidencia;
	}

	function gettituloEvidencia(){
		return $this -> tituloEvidencia;
	}

	function setfechaCreación($fechaCreación){
		$this -> fechaCreación = $fechaCreación;
	}

	function getfechaCreación(){
		return $this -> fechaCreación;
	}

	function setautorEvid($autorEvid){
		$this -> autorEvid = $autorEvid;
	}

	function getautorEvid(){
		return $this -> autorEvid;
	}

	function settipoEvid($tipoEvid){
		$this -> tipoEvid = $tipoEvid;
	}

	function gettipoEvid(){
		return $this -> tipoEvid;
	}

}

?>