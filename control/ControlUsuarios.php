<?php

class ControlUsuarios{

	var $objUsuarios;


function __construct($objUsuarios){

	$this->objUsuarios = $objUsuarios;
    }
	public $conn =  null;

	function guardar(){
		$nomUsuario = $this->objUsuarios->getNomUsuario();
		$contrasena = $this->objUsuarios->getContrasena();
		$perfil = $this->objUsuarios->getperfil();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "insert into usuarios values ('".$nomUsuario."','".$contrasena."','".$perfil."')";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();
    }

	function consultar(){
		$nomUsuario = $this->objUsuarios->getNomUsuario();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql="select * from usuarios where usuario = '".$nomUsuario."'";
		$rs=$objControlConexion->ejecutarSelect($comandosql);
		if($row = $rs->fetch_array(MYSQLI_BOTH)){
			$contrasena=$row["contrasena"];
			$perfil=$row["perfil"];
			$this->objUsuarios->setContrasena($contrasena);
			$this->objUsuarios->setperfil($perfil);

        }
		$rs->free();
		$objControlConexion->cerrarBd();
		return $this->objUsuarios;
    }
	

	function modificar(){
		$nomUsuario = $this->objUsuarios->getNomUsuario();
		$contrasena = $this->objUsuarios->getContrasena();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "update usuarios set contrasena = '".$contrasena."' where usuario='".$nomUsuario."'";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();
    }

	function borrar(){
		$nomUsuario = $this->objUsuarios->getNomUsuario();
		$objControlConexion  = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","sivephp");
		$comandosql = "delete from usuarios where usuario='".$nomUsuario."'";
		$objControlConexion->ejecutarComandoSql($comandosql);
		$objControlConexion->cerrarBd();
    }

    function  validarIngreso(){
            $esValido=false;
            $objUsuario1 = new Usuarios('','','');
			$nomUsuario= $this->objUsuarios->getNomUsuario();
			$contrasena=$this->objUsuarios->getContrasena();
			$perfil=$this->objUsuarios->getperfil();

			$objControlConexion = new ControlConexion();
			try{
				$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
				$comandoSql="select * FROM usuarios  WHERE usuario='".$nomUsuario."' AND contrasena='".$contrasena."'";
				$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
				$registro = $recordSet->fetch_array(MYSQLI_BOTH);
				$objUsuario1->setNomUsuario($registro['usuario']);
				$objUsuario1->setContrasena($registro['contrasena']);
				$objUsuario1->setperfil($registro['perfil']);
;
                }
         	catch (Exception $e)
            	{
            	echo "ERROR ".$e->getMessage()."\n";
                }
            $objControlConexion->cerrarBd();

            if ($this->objUsuarios->getNomUsuario()==$objUsuario1->getNomUsuario() &&
               $this->objUsuarios->getContrasena()==$objUsuario1->getContrasena()  &&
               $this->objUsuarios->getNomUsuario() != "" &&
               $this->objUsuarios->getContrasena() != "")
			{
              $esValido = true;
            }
            else
            {
              $esValido = false;
            }
      return $esValido;
      }

	function listar(){

		$objConexion = new ControlConexion();
		$objConexion->abrirBd("localhost","root","","sivephp");
		$comandoSql="select * from usuarios";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			
			$mat[$i][0]=  $registro['usuario'];
			$mat[$i][1]=  $registro['contrasena'];
			$mat[$i][2]=  $registro['perfil'];
			$i=$i+1;
		}		

		$objConexion->cerrarBd();
		return $mat;
	}	
  }

 ?>