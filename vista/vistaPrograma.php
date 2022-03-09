<?php 
error_reporting(0);
    include '../vista/menu.html';
	include '../modelo/Programa.php';
	include '../control/ControlPrograma.php';
	include '../control/ControlConexion.php';

	$idPrograma = $_POST['txtCodPrograma'];
	$nombrePrograma = $_POST['txtNomPrograma'];
	$idFacultad = $_POST['txtCodFacul'];
	$bot = $_POST['btn'];
	switch ($bot) {
		case 'GUARDAR':
			$objPrograma = new Programa($idPrograma,$nombrePrograma,$idFacultad);
			$objControlPrograma = new ControlPrograma($objPrograma);
			$objControlPrograma->guardar();
			echo "Registro guardado exitosamente.";
			break;

		case 'CONSULTAR':
			$objPrograma = new Programa($idPrograma,"",NULL);
			$objControlPrograma = new ControlPrograma($objPrograma);
			$objPrograma = $objControlPrograma->consultar();
			$nombrePrograma=$objPrograma->getNomProg();
			$idFacultad=$objPrograma->getIDFacult();
			break;

		case 'MODIFICAR':
			$objPrograma = new Programa($idPrograma,$nombrePrograma,$idFacultad);
			$objControlPrograma = new ControlPrograma($objPrograma);
			$objControlPrograma->modificar();
			echo "Registro modificado exitosamente.";
			break;

		case 'BORRAR':
			$objPrograma = new Programa($idPrograma,$nombrePrograma,$idFacultad);
			$objControlPrograma = new ControlPrograma($objPrograma);
			$objControlPrograma->borrar();
			echo "Registro eliminado exitosamente.";
			break;

		case "LISTAR":
        $objPrograma= new Programa(0,"","");
        $objControlPrograma= new ControlPrograma($objPrograma);
        $mat=$objControlPrograma->listar();
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
	<title>Programa</title>
	 <link href='../styleResponsive.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css' rel='stylesheet'>
  	<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js'></script>
  	<meta name='viewport' content='width=device, user-scalable=no, initial-scale=1.0, maximim-scale=1.0 minimum-scale=1.0>'
	
</head>
<body>
	 <form method='post' action='vistaPrograma.php'>
	 <center>
	 <h1> Programa </h1>
            <table class='table'>
            <thead class='table-dark'>
                <tr>
                <td colspan='2'><center>Programa</center></td>
                </tr>
                <thead>
                <tr>
                <td>ID Programa:</td>
                <td><input type='text' class='txtBox' name='txtCodPrograma' value='".$idPrograma."'></td>
                </tr>
                <tr>
                <td>Nombre Programa:</td>
                <td><input type='text' class='txtBox' name='txtNomPrograma' value='".$nombrePrograma."'></td>
                </tr>
                <tr>
                <td>Facultad:</td>
                <td><input type='text' class='txtBox' name='txtCodFacul' value='".$idFacultad."'></td>
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
</html>
";
?>