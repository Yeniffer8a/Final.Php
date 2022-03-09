<?php

class Programa{

	var $idPrograma;
	var $nombrePrograma;
	var $idFacultad;

	function __construct($idPrograma, $nombrePrograma, $idFacultad){
		$this -> idPrograma = $idPrograma;
		$this -> nombrePrograma = $nombrePrograma;
		$this -> idFacultad = $idFacultad;
	}

	function setIDFacult($idFacultad){
		$this -> idFacultad = $idFacultad;
	}

	function getIDFacult(){
		return $this -> idFacultad;
	}

	function setNomProg($nombrePrograma){
		$this -> nombrePrograma = $nombrePrograma;
	}

	function getNomProg(){
		return $this -> nombrePrograma;
	}

	function setIDProg($idPrograma){
		$this -> idPrograma = $idPrograma;
	}

	function getIDProg(){
		return $this -> idPrograma;
	}

}

?>