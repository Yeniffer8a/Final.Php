<?php 
error_reporting(0);
    include '../vista/menu.html';
	include '../modelo/Facultad.php';
	include '../control/ControlFacultad.php';
	include '../control/ControlConexion.php';


	$idFacultad = $_POST['txtCodFacultad'];
	$nombreFacultad = $_POST['txtNomFacultad'];
	$bot = $_POST['btn'];
	switch ($bot) {
		case 'GUARDAR':
			$objFacultad = new Facultad($idFacultad,$nombreFacultad);
			$objControlFacultad = new ControlFacultad($objFacultad);
			$objControlFacultad->guardar();
			echo "Registro guardado exitosamente.";
			break;

		case 'CONSULTAR':
			$objFacultad = new Facultad($idFacultad,"");
			$objControlFacultad = new ControlFacultad($objFacultad);
			$objFacultad = $objControlFacultad->consultar();
			$nombreFacultad=$objFacultad->getNomFacul();
			break;

		case 'MODIFICAR':
			$objFacultad = new Facultad($idFacultad,$nombreFacultad);
			$objControlFacultad = new ControlFacultad($objFacultad);
			$objControlFacultad->modificar();
			echo "Registro modificado exitosamente.";
			break;

		case 'BORRAR':
			$objFacultad = new Facultad($idFacultad,$nombreFacultad);
			$objControlFacultad = new ControlFacultad($objFacultad);
			$objControlFacultad->borrar();
			echo "Registro eliminado exitosamente.";
			break;

	    case "LISTAR":
        $objFacultad= new Facultad(0,"");
        $objControlFacultad= new ControlFacultad($objFacultad);
        $mat=$objControlFacultad->listar();
           break;    

		
		default:
			# code...
			break;
	}

echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
    <link rel='icon' type='image/x-icon' href='../imagenes/fav.gif'>
	<title>Facultad</title>
	 <link href='../styleResponsive.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css' rel='stylesheet'>
  	<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js'></script>
  	<meta name='viewport' content='width=device, user-scalable=no, initial-scale=1.0, maximim-scale=1.0 minimum-scale=1.0>'
</head>

<body>
	 <form method='post' action='vistaFacultad.php'>
	 <center>
	 
	 <h1> Facultad </h1>
            <table class='table'>
            <thead class='table-dark'>
                <tr>
                <td colspan='2'><center>Facultad</center></td>
                </tr>
                <thead>
                
                <tr>
                <td>ID Facultad:</td>
                <td><input type='text' class='txtBox' name='txtCodFacultad' value='".$idFacultad."'></td>
                </tr>

                <tr>
                <td>Nombre Facultad:</td>
                <td> <input type='text' class='txtBox' name='txtNomFacultad' value='".$nombreFacultad."'></td>
                </tr>

                <tbody>
            </table>


             <table>
            <tr>
                <td class='border1'><input type='submit' class='btn btn-outline-secondary' name='btn' value='GUARDAR'></td>
                <td class='border1'><input type='submit' class='btn btn-outline-secondary' name='btn' value='CONSULTAR'></td>
                <td class='border1'><input type='submit' class='btn btn-outline-secondary' name='btn' value='MODIFICAR'></td>
                <td class='border1'><input type='submit' class='btn btn-outline-secondary' name='btn' value='BORRAR'></td>
                <td class='border1'><input type='submit' class='btn btn-outline-secondary' name='btn' value='LISTAR'></td>
            </tr>
            </table> 

            <table> <hr>";

        echo "<table class='table'> <thead class='table-dark'>";
        echo "<td> Código Facultad </td>";
        echo "<td> Nombre Facultad </td>";
        echo "<thead>";
        

            for($i=0;$i<sizeof($mat);$i++) {
                echo "<tr> 
                    <td>".$mat[$i][0]."</td><td>".$mat[$i][1]."</td>
                    </tr>";
         }
        echo "</table>";
            
        echo "</form>
    </body>
</html>
";
?>