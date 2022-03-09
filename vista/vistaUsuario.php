<?php 
    error_reporting(0);
    include '../vista/menu.html';
	include '../modelo/Usuarios.php';
	include '../control/ControlUsuarios.php';
	include '../control/ControlConexion.php';

	$nomUsuario = $_POST['txtUsuario'];
	$contrasena = $_POST['txtContrasena'];
	$perfil = $_POST['txtperfil'];

	$objUsuario = new Usuarios($nomUsuario,$contrasena, $perfil);
	$tipoPerfil=$objUsuario->getperfil();

	$bot = $_POST['btn'];

	switch ($bot) {
		case 'GUARDAR':
			$objUsuario = new Usuarios($nomUsuario,$contrasena, $perfil);
			$objControlUsuarios = new ControlUsuarios($objUsuario);
			$objControlUsuarios->guardar();
			echo "Registro guardado exitosamente.";
			break;

		case 'CONSULTAR':
			$objUsuario = new Usuarios($nomUsuario,"", "");
			$objControlUsuarios = new ControlUsuarios($objUsuario);
			$objUsuario = $objControlUsuarios->consultar();
			$contrasena=$objUsuario->getContrasena();
			break;

		case 'MODIFICAR':
			$objUsuario = new Usuarios($nomUsuario,$contrasena, $perfil);
			$objControlUsuarios = new ControlUsuarios($objUsuario);
			$objControlUsuarios->modificar();
			echo "Registro modificado exitosamente.";
			break;

		case 'BORRAR':
			$objUsuario = new Usuarios($nomUsuario,$contrasena, $perfil);
			$objControlUsuarios = new ControlUsuarios($objUsuario);
			$objControlUsuarios->borrar();
			echo "Registro eliminado exitosamente.";
			break;

		case "LISTAR":
        $objUsuario= new Usuarios("","","");
        $objControlUsuarios= new ControlUsuarios($objUsuario);
        $mat=$objControlUsuarios->listar();
           break;   
		
		default:
			# code...
			break;

}
if ($tipoPerfil!=2)
{
echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<link rel='icon' type='image/x-icon' href='../imagenes/fav.gif'>
    <title>Programa</title>
     <link href='../styleResponsive.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css' rel='stylesheet'>
  	<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js'></script>
  	<meta name='viewport' content='width=device, user-scalable=no, initial-scale=1.0, maximim-scale=1.0 minimum-scale=1.0>'
	
</head>
<body>
	 <form method='post' action='vistaUsuario.php'>
	 <div class='contenedor'>
	 <center>
	 <h1> Registro de Usuario </h1>
	 <div class='table-resposive'>
            <table class='table'>
            <thead class='table-dark'>
                <tr>
                <td colspan='2'><center>Usuarios</center></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>Usuario:</td>
                <td><input type='text' class='txtBox' name='txtUsuario' value='".$nomUsuario."'></td>
                </tr>
                <tr>
                <td>Contraseña:</td>
                <td><input type='password' class='txtBox' name='txtContrasena' value='".$contrasena."'></td>
                </tr>
                <tr>
                <td>Tipo Perfil:</td>
                <td><select name='txtperfil'><option value='1'>Administrador</options><option value='2'>Operario</options></select> </td>

                </tr>
                </tbody>
            </table>
            </div>
            <table >

            <tr>
                <td class='border1'><input type='submit' class='btn btn-outline-secondary' name='btn' value='GUARDAR'></td>
                <td class='border1'><input type='submit' class='btn btn-outline-secondary' name='btn' value='CONSULTAR'></td>
                <td class='border1'><input type='submit' class='btn btn-outline-secondary' name='btn' value='MODIFICAR'></td>
                <td class='border1' ><input type='submit' class='btn btn-outline-secondary' name='btn' value='BORRAR'></td>
                <td class='border1' ><input type='submit' class='btn btn-outline-secondary' name='btn' value='LISTAR'></td>
            </tr>

            </table>

";
        echo "<table class='table'> <thead class='table-dark'>";
        echo "<td> Código Programa </td>";
        echo "<td> Nombre Programa </td>";
        echo "<td> Facultad </td>";
        echo "<thead>";
        

            for($i=0;$i<sizeof($mat);$i++) {
                echo "<tr> 
                    <td>".$mat[$i][0]."</td><td>".$mat[$i][1]."</td><td>".$mat[$i][2]."</td>
                    </tr>";
         }
        echo "</table>";
            
        echo "</form>
    </body>
</html>";
} else
	echo "NO TIENES PERMISOS";
 ?>