<?php 
session_start();
if($_SESSION['usuario']== null)header('Location: ../index.php');
echo '
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/x-icon" href="../imagenes/fav.gif">
	<title> SIVEPHP - Sistema de Verificación | PHP </title>

<style>

img{
  width: 60%;
  height: 70%;
}
img.logo{
  width: 5%;
  height: 5%;
}
img.social{
  width: 10%;
  height: 15%;
}
footer {
  background-color: black;
  position: absolute;
  width: 100%;
  height: 30px;
  color: white;
}
</style>
</head>
<body>

<div class="jumbotron text-center">
<table>
<img class="logo"src="../imagenes/LOGO.png" alt="Juan Sebastian Cardona Serna"> 
  <p>¡En buscar de la mejor calidad!</p> 
</div>

	<center>
	<div class="container-fluid">
<nav class="navbar navbar-expand-md navbar-dark bg-dark border-5 border-bottom border-dark">
<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
<span class="navbar-toggler-icon"></span>
</button>
<div id="MenuNavegacion" class="collapse navbar-collapse ">
<ul class="navbar-nav ms-5" >
  <li class="nav-item"><a href="../vista/vistaPrograma.php" class="navbar-brand"> &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp Programa &nbsp &nbsp </a></li>
  <li class="nav-item"> <a href="../vista/vistaFacultad.php" class="navbar-brand"> Facultad &nbsp &nbsp </a></li>
  <li class="nav-item"><a href="../vista/vistaUsuario.php" class="navbar-brand">  Usuario  &nbsp &nbsp </a></li>
  <li class="nav-item"><a href="../vista/vistaEvidencia.php" class="navbar-brand">  Evidencias  &nbsp &nbsp </a></li>
  <li class="nav-item"><a href="../vista/infoContacto.html" class="navbar-brand">  Contactanos  </a></li>
  <li class="nav-item"><a href="../vista/cerrarSesion.php" class="navbar-brand">  Cerrar Sesion  </a></li>
</ul>
	</div>


</nav>
  </div>

</center>


&nbsp
&nbsp
  
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h3>David Ramirez </h3>
      <img src="../imagenes/david.jpeg">
      <p> <img class="social"src="https://img.icons8.com/material-sharp/24/000000/facebook-circled--v3.png"/></p>
    </div>
    <div class="col-sm-3">
      <h3>Salomon Bedoya</h3>
      <img src="../imagenes/Salomon.jpeg">
      <p> <img class="social"src="https://img.icons8.com/material-sharp/24/000000/facebook-circled--v3.png"/></p>
    </div>
    <div class="col-sm-3">
      <h3> Yenifer Ochoa </h3>    
      <img src="../imagenes/yen.jpeg" alt="Yenifer Ochoa Velasquez"> 
      <p> <img class="social"src="https://img.icons8.com/material-sharp/24/000000/facebook-circled--v3.png"/></p>
    </div>
   <div class="col-sm-3">
      <h3>  Sebastian Cardona  </h3>         
      <img src="../imagenes/sebas.jpg" alt="Juan Sebastian Cardona Serna"> 
      <p> <img class="social"src="https://img.icons8.com/material-sharp/24/000000/facebook-circled--v3.png"/></p>
    </div>
  </div>
</div>

<footer>
  SIVEPHP || Programación orientada a la web con PHP - Instituto Tecnologíco Metropolitano ITM 
</footer>
</body>
</html>
';
 ?>


