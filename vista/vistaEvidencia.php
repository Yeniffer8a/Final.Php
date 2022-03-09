<?php 
error_reporting(0);
    include '../vista/menu.html';
	include '../modelo/Evidencia.php';
	include '../control/ControlEvidencia.php';
	include '../control/ControlConexion.php';


	$idEvidencia = $_POST['txtidEvidencia'];
	$tituloEvidencia = $_POST['txttituloEvidencia'];
	$fechaCreación= $_POST['fechaCreación'];
	$autorEvid= $_POST['txtautorEvid'];
	$tipoEvid= $_POST['txttipoEvid'];
	$bot = $_POST['btn'];

	switch ($bot) {
		case 'GUARDAR':
			$objEvidencia = new Evidencia($idEvidencia, $tituloEvidencia,$fechaCreación,$autorEvid,$tipoEvid);
			$objControlEvidencia = new ControlEvidencia($objEvidencia);
			$objControlEvidencia->guardar();
			echo "Registro guardado exitosamente.";
			break;

		case 'CONSULTAR':
			$objEvidencia = new Evidencia($idEvidencia,"","","","");
			$objControlEvidencia = new ControlEvidencia($objEvidencia);
			$objEvidencia = $objControlEvidencia->consultar();
			$tituloEvidencia=$objEvidencia->gettituloEvidencia();
			$fechaCreación=$objEvidencia->getfechaCreación();
			$autorEvid=$objEvidencia->getautorEvid();
			$tipoEvid=$objEvidencia->gettipoEvid();
			break;

		case 'MODIFICAR':
			$objEvidencia = new Evidencia($idEvidencia, $tituloEvidencia,$fechaCreación,$autorEvid,$tipoEvid);
			$objControlEvidencia = new ControlEvidencia($objEvidencia);
			$objControlEvidencia->modificar();
			echo "Registro modificado exitosamente.";
			break;

		case 'BORRAR':
			$objEvidencia = new Evidencia($idEvidencia, $tituloEvidencia,$fechaCreación,$autorEvid,$tipoEvid);
			$objControlEvidencia = new ControlEvidencia($objEvidencia);
			$objControlEvidencia->borrar();
			echo "Registro eliminado exitosamente.";
			break;

	    case 'LISTAR':
        $objEvidencia= new Evidencia(0,"","","","");
        $objControlEvidencia= new ControlEvidencia($objEvidencia);
        $mat=$objControlEvidencia->listar();
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
	
	<title>Evidencias</title>
		 <link href='../styleResponsive.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css' rel='stylesheet'>
  	<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js'></script>
  	<meta name='viewport' content='width=device, user-scalable=no, initial-scale=1.0, maximim-scale=1.0 minimum-scale=1.0>'
</head>
<body>

	 <form method='post' action='vistaEvidencia.php'>
	 <center>
	 <h1> Evidencia </h1>
	 		<table class='table'>
	 		<thead class='table-dark'>
                <tr>
                <td colspan='2'><center>Evidencia</center></td>
                </tr>
                <thead>
                <tr>
                <td>ID Evidencia:</td>
                <td><input type='text' class='txtBox' name='txtidEvidencia' value='".$idEvidencia."'></td>
                </tr>
                <tr>
                <td>Titulo Evidencia:</td>
                <td><input type='text' class='txtBox' name='txttituloEvidencia' value='".$tituloEvidencia."'></td>
                </tr>
                <tr>
                <td>Fecha Creación:</td>
                <td><input type='date' class='txtBox' name='fechaCreación' value='".$fechaCreación."'></td>
                </tr>
                <tr>
                <td>Autor Evidencia:</td>
                <td><input type='text' class='txtBox' name='txtautorEvid' value='".$autorEvid."'></td>
                </tr>
                <tr>
                <td>Tipo Evidencia:</td>
                <td><input type='file' class='txtBox' name='txttipoEvid' value='".$tipoEvid."'></td>
                </tr>
                <tbody>
            </table>
            <table>
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
        echo "<td> Código Evidencia </td>";
        echo "<td> Titulo Evidencia </td>";
        echo "<td> Fecha Creación </td>";
        echo "<td> Auto Evidencia </td>";
        echo "<td> Tipo Evidencia </td>";

        echo "<thead>";
        

            for($i=0;$i<sizeof($mat);$i++) {
                echo "<tr> 
                    <td>".$mat[$i][0]."</td><td>".$mat[$i][1]."</td><td>".$mat[$i][2]."</td><td>".$mat[$i][3]."</td><td>".$mat[$i][4]."</td>
                    </tr>";
         }
        echo "</table>";
            
        echo "</form>
    </body>
</html>
";
?>