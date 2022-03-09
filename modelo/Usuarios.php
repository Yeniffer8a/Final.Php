<?php

class Usuarios{

	var $nomUsuario;
	var $contrasena;
	var $perfil;

	function __construct($nomUsuario, $contrasena, $perfil){
		$this -> nomUsuario = $nomUsuario;
		$this -> contrasena = $contrasena;
		$this -> perfil = $perfil;
	}

	function setNomUsuario($nomUsuario){
		$this -> nomUsuario = $nomUsuario;
	}

	function getNomUsuario(){
		return $this -> nomUsuario;

	}

	function setContrasena($contrasena){
		$this -> contrasena = $contrasena;
	}

	function getContrasena(){
		return $this -> contrasena;
	}

	function setperfil($perfil){
		$this -> perfil = $perfil;
	}

	function getperfil(){
		return $this -> perfil;

	}


}

?>