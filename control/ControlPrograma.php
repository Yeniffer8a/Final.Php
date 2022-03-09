<?php

class ControlPrograma{

	var $objPrograma;


function __construct($objPrograma){

	$this->objPrograma = $objPrograma;

}
	public $conn =  null;

	function guardar(){
		$idPrograma = $this->objPrograma->getIDProg();
		$nombrePrograma = $this->objPrograma->getNomProg();
		$idFacultad = $this->objPrograma->getIDFacult();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "insert into programa values ('".$idPrograma."','".$nombrePrograma."','".$idFacultad."')";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();
	}

	function consultar(){
		$idPrograma = $this->objPrograma->getIDProg();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql="select * from programa where idPrograma = '".$idPrograma."'";
		$rs=$objControlConexion->ejecutarSelect($comandosql);
		if($row = $rs->fetch_array(MYSQLI_BOTH)){
			$nombrePrograma=$row["nombrePrograma"];
			$idFacultad=$row["fkFacultad"];
			$this->objPrograma->setNomProg($nombrePrograma);
			$this->objPrograma->setIDFacult($idFacultad);
		}
		$rs->free();
		$objControlConexion->cerrarBd();
		return $this->objPrograma;
	}
	

	function modificar(){
		$idPrograma = $this->objPrograma->getIDProg();
		$nombrePrograma = $this->objPrograma->getNomProg();
		$idFacultad = $this->objPrograma->getIDFacult();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "update programa set nombrePrograma = '".$nombrePrograma."', fkFacultad = '".$idFacultad."' where idPrograma='".$idPrograma."'";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();	
	}

	function borrar(){
		$idPrograma = $this->objPrograma->getIDProg();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "delete from programa where idPrograma='".$idPrograma."'";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();	
	}

		function listar(){

		$objConexion = new ControlConexion();
		$objConexion->abrirBd("localhost","root","","sivephp");
		$comandoSql="select * from programa";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			
			$mat[$i][0]=  $registro['idPrograma'];
			$mat[$i][1]=  $registro['nombrePrograma'];
			$mat[$i][2]=  $registro['fkFacultad'];
			$i=$i+1;
		}		

		$objConexion->cerrarBd();
		return $mat;
	}	
}

 ?>