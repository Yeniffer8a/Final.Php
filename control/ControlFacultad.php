<?php

class ControlFacultad{

	var $objFacultad;


function __construct($objFacultad){

	$this->objFacultad = $objFacultad;

}
	public $conn =  null;

	function guardar(){
		$idFacultad = $this->objFacultad->getIDFacul();
		$nombreFacultad = $this->objFacultad->getNomFacul();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "insert into facultad values ('".$idFacultad."','".$nombreFacultad."')";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();
	}

	function consultar(){
		$idFacultad = $this->objFacultad->getIDFacul();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql ="select * from facultad where idFacultad ='".$idFacultad."'";
		$rs=$objControlConexion->ejecutarSelect($comandosql);
		if($row = $rs->fetch_array(MYSQLI_BOTH)){
			$nombreFacultad=$row["nombreFacultad"];
			$this->objFacultad->setNomFacul($nombreFacultad);
		}
		$rs->free();
		$objControlConexion->cerrarBd();
		return $this->objFacultad;
	}

	function modificar(){
		$idFacultad = $this->objFacultad->getIDFacul();
		$nombreFacultad = $this->objFacultad->getNomFacul();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "update facultad set nombreFacultad ='".$nombreFacultad."' where idFacultad='".$idFacultad."'";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();	
	}

	function borrar(){
		$idFacultad = $this->objFacultad->getIDFacul();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "delete from facultad where idFacultad='".$idFacultad."'";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();	
	}

	function listar(){

		$objConexion = new ControlConexion();
		$objConexion->abrirBd("localhost","root","","sivephp");
		$comandoSql="select * from facultad";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			
			$mat[$i][0]=  $registro['idFacultad'];
			$mat[$i][1]=  $registro['nombreFacultad'];
			$i=$i+1;
		}		

		$objConexion->cerrarBd();
		return $mat;
	}	
}

 ?>