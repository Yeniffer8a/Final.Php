<?php 
 error_reporting(0);
session_start();
include("control/configBd.php");
include("modelo/Usuarios.php");
include("control/ControlUsuarios.php");
include("control/ControlConexion.php");

try{
    $usu=$_POST["txtUsuario"];
    $con=$_POST["txtContrasena"];
    $per=$_POST["perfil"];
    $bot=$_POST["btn"];
 
    if($bot=="INGRESAR"){
    $objUsuarios=new Usuarios($usu,$con,$per);
    $objCtrUsuario =new ControlUsuarios($objUsuarios);
        if($objCtrUsuario->validarIngreso()){
            $_SESSION['usuario']=  $usu;
            //$_SESSION['perfil']=  $per;
            header('Location: vista/menu.php');
        } 
        else{
            echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";
        }
    }
}
catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}
echo "<!DOCTYPE html>
<html>
<head>
<link rel='icon' type='image/x-icon' href='../imagenes/fav.gif'>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
  	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css' rel='stylesheet'>
  	<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js'></script>
  	<title> Login  </title>
</head>
<body>
  <form method='post' action='index.php'>
      <link href='Csslogin.css' rel='stylesheet'>
      <section class='vh-100 gradient-custom'>
      <div class='container py-5 h-100'>
        <div class='row d-flex justify-content-center align-items-center h-100'>
          <div class='col-12 col-md-8 col-lg-6 col-xl-5'>
            <div class='card bg-dark text-white' style='border-radius: 1rem;'>
              <div class='card-body p-5 text-center'>

                          <div class='mb-md-1 mt-md-2 pb-5'>

                        <h2 class='fw-bold mb-2 text-uppercase'>ACCESO</h2>
                        <p class='text-white-50 mb-5'>Por favor ingrese usuario y contraseña.</p>

                        <div class='form-outline form-white mb-4'>
                          <input type='text' id='typeEmailX' class='form-control form-control-lg' name='txtUsuario'>
                          <label class='form-label' for='typeEmailX'>Usuario</label>
                        </div>

                        <div class='form-outline form-white mb-4'>
                          <input type='password' id='typePasswordX' class='form-control form-control-lg' name='txtContrasena'>
                          <label class='form-label' for='typePasswordX'>Contraseña</label>
                        </div>

                        <input class='btn btn-outline-light btn-lg px-5' type='submit' name ='btn' value='INGRESAR'>


              
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </body>
</html>
";

 ?>