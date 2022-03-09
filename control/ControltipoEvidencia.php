<?php

class ControltipoEvidencia{

	var $objtipoEvidencia;


function __construct($objtipoEvidencia){

	$this->objtipoEvidencia = $objtipoEvidencia;

}
	public $conn =  null;

	function guardar(){
		$idtipoEvidencia = $this->objtipoEvidencia->getidtipoEvidencia();
		$nombreEvidencia = $this->objtipoEvidencia->getnombreEvidencia();
		$descripcionEvidencia = $this->objtipoEvidencia->getdescripcionEvidencia();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "insert into tipoevidencia values ('".$idtipoEvidencia."','".$nombreEvidencia."','".$descripcionEvidencia."')";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();
	}

	function consultar(){
		$idtipoEvidencia = $this->objtipoEvidencia->getidtipoEvidencia();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql ="select * from tipoevidencia where idTipoEvid='".$idtipoEvidencia."'";
		$rs=$objControlConexion->ejecutarSelect($comandosql);
		if($row = $rs->fetch_array(MYSQLI_BOTH)){
			$nombreEvidencia=$row["nombEvid"];
			$this->objtipoEvidencia->setnombreEvidencia($nombreEvidencia);
			$descripcionEvidencia=$row["descripEvid"];
			$this->objtipoEvidencia->setdescripcionEvidencia($descripcionEvidencia);
		
		}
		$rs->free();
		$objControlConexion->cerrarBd();
		return $this->objtipoEvidencia;
	}

	function modificar(){
		$idtipoEvidencia = $this->objtipoEvidencia->getidtipoEvidencia();
		$nombreEvidencia = $this->objtipoEvidencia->getnombreEvidencia();
		$descripcionEvidencia = $this->objtipoEvidencia->getdescripcionEvidencia();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "update tipoevidencia set nombEvid ='".$nombreEvidencia."', descripEvid ='".$descripcionEvidencia."' where idTipoEvid ='".$idtipoEvidencia."'";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();	
	}

	function borrar(){
		$idtipoEvidencia = $this->objtipoEvidencia->getidtipoEvidencia();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "delete from tipoevidencia where idTipoEvid ='".$idtipoEvidencia."'";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();	
	}
}

 ?>