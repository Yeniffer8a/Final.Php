<?php

class ControlEvidencia{

	var $objEvidencia;


function __construct($objEvidencia){

	$this->objEvidencia = $objEvidencia;

}
	public $conn =  null;

	function guardar(){
		$idEvidencia = $this->objEvidencia->getidEvidencia();
		$tituloEvidencia = $this->objEvidencia->gettituloEvidencia();
		$fechaCreación = $this->objEvidencia->getfechaCreación();
		$autorEvid = $this->objEvidencia->getautorEvid();
		$tipoEvid = $this->objEvidencia->gettipoEvid();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "insert into evidencias values ('".$idEvidencia."','".$tituloEvidencia."','".$fechaCreación."','".$autorEvid."','".$tipoEvid."')";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();
	}

	function consultar(){
		$idEvidencia = $this->objEvidencia->getidEvidencia();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql ="select * from evidencias where idEvid ='".$idEvidencia."'";
		$rs=$objControlConexion->ejecutarSelect($comandosql);
		if($row = $rs->fetch_array(MYSQLI_BOTH)){
			$tituloEvidencia=$row["tituloEvid"];
			$this->objEvidencia->settituloEvidencia($tituloEvidencia);
			$fechaCreación=$row["fechaCreacEvid"];
			$this->objEvidencia->setfechaCreación($fechaCreación);
			$autorEvid=$row["autorEvid"];
			$this->objEvidencia->setautorEvid($autorEvid);
			$tipoEvid=$row["fkTipoEvid"];
			$this->objEvidencia->settipoEvid($tipoEvid);
		}
		$rs->free();
		$objControlConexion->cerrarBd();
		return $this->objEvidencia;
	}

	function modificar(){
		$idEvidencia = $this->objEvidencia->getidEvidencia();
		$tituloEvidencia = $this->objEvidencia->gettituloEvidencia();
		$fechaCreación = $this->objEvidencia->getfechaCreación();
		$autorEvid = $this->objEvidencia->getautorEvid();
		$tipoEvid = $this->objEvidencia->gettipoEvid();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "update evidencias set tituloEvid ='".$tituloEvidencia."', fechaCreacEvid ='".$fechaCreación."',autorEvid ='".$autorEvid."',fkTipoEvid ='".$tipoEvid."' where idEvid='".$idEvidencia."'";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();	
	}

	function borrar(){
		$idEvidencia = $this->objEvidencia->getidEvidencia();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "delete from evidencias where idEvid='".$idEvidencia."'";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();	
	}

	function listar(){

		$objConexion = new ControlConexion();
		$objConexion->abrirBd("localhost","root","","sivephp");
		$comandoSql="select * from evidencias";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			
			$mat[$i][0]=  $registro['idEvid'];
			$mat[$i][1]=  $registro['tituloEvid'];
			$mat[$i][2]=  $registro['fechaCreacEvid'];
			$mat[$i][3]=  $registro['autorEvid'];
			$mat[$i][4]=  $registro['TipoEvid'];
			$i=$i+1;
		}		

		$objConexion->cerrarBd();
		return $mat;
	}	
}

 ?>