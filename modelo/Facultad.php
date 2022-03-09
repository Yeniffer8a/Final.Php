<?php

class Facultad{

	var $idFacultad;
	var $nombreFacultad;

	function __construct($idFacultad, $nombreFacultad){
		$this -> idFacultad = $idFacultad;
		$this -> nombreFacultad = $nombreFacultad;
	}

	function setNomFacul($nombreFacultad){
		$this -> nombreFacultad = $nombreFacultad;
	}

	function getNomFacul(){
		return $this -> nombreFacultad;

	}

	function setIDFacul($idFacultad){
		$this -> idFacultad = $idFacultad;
	}

	function getIDFacul(){
		return $this -> idFacultad;
	}

}

?>