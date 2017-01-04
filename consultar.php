<?php
	include("conexion.php");
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Conectando PHP y MySQL</title>
		<link rel="stylesheet" media='only screen and (min-width: 481px)' type="text/css" href="estilos.css"/>
	</head>

	<body>
		<header>
			<table>
				<tr>
					<td>
						<img src="hospital_256.png"/>
					</td>
					<td>
						<h1> Gestión de la base de datos del hospital de Gante </h1>
					</td>
				</tr>
			</table>
		</header>

		<nav>
			<a href = "index.php">Inicio</a>
			<a href = "registrar.php">Registrar y Modificar</a>
			<a href = "consultar.php">Consultar</a>
			<a href = "estadisticas.php">Estadisticas</a>
		</nav>

		<section>
			<h1>Consultar datos</h1>
			<h2>Puede realizar la busqueda usando el nombre o el identificador del paciente</h2>
			<form name="formulario" action="consultar.php" method="post">
				<table>
					<tr>
						<td>
							<label>Nombre del paciente:</label>
						</td>
						<td>
							<input name="Name" type="text" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Identificador del paciente</label>
						</td>
						<td>
							<input name="Patient_ID" type="text" />
						</td>
					</tr>
					<tr>
						<td>
							<input name="button" type="submit" value="Listado de pacientes ingresados" />	
						</td>
						<td>
							<input name="button" type="submit" value="Consultar" />	
						</td>
					</tr>
				</table>
			</form>

<?php
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$var5="";

if(isset($_POST["button"])){
	$btn=$_POST["button"];
	$nam=$_POST["Name"];
	$patient_i=$_POST["Patient_ID"];

	if($btn=="Listado de pacientes ingresados"){
		
		$sql="select * from patient";
		$cs=mysql_query($sql,$cn);
		echo"<center>
				<table border='3'>
					<tr>
						<td>Name</td>
						<td>Gender</td>
						<td>Patient_ID</td>
						<td>Birth_Date</td>
						<td>Menopausal_Status</td>
						<td>Institution_ID</td>
					</tr>";
		while($resul=mysql_fetch_array($cs)){
			$var=$resul[0];
			$var1=$resul[1];
			$var2=$resul[2];
			$var3=$resul[3];
			$var4=$resul[4];
			$var5=$resul[5];

			
			switch ($var4) {
				case '161541000119104':
					$var4 = "perimenopausal";
					break;
				case '76498008':
					$var4 = "postmenopausal";
					break;
				case '22636003':
					$var4 = "premenopausal";
					break;
			}
			echo "<tr>
					<td>$var</td>
					<td>$var1</td>
					<td>$var2</td>
					<td>$var3</td>
					<td>$var4</td>
					<td>$var5</td>
				</tr>";
		}
			
		echo "</table>
</center>";
	}

	if($btn=="Consultar"){
		
		// Se puede realizar busqueda por nombre, aunque es preferible por numero de identificacion.
		if ($patient_i == ""){
			$sql="select * from patient where Name='$nam'";
		}
		else {
			$sql="select * from patient where Patient_ID='$patient_i'";
		}

		$cs=mysql_query($sql,$cn);
		echo"<center>
				<table border='3'>
					<tr>
						<td>Name</td>
						<td>Gender</td>
						<td>Patient_ID</td>
						<td>Birth_Date</td>
						<td>Menopausal_Status</td>
						<td>Institution_ID</td>
					</tr>";
		while($resul=mysql_fetch_array($cs)){
			$var=$resul[0];
			$var1=$resul[1];
			$var2=$resul[2];
			$var3=$resul[3];
			$var4=$resul[4];
			$var5=$resul[5];

			
			switch ($var4) {
				case '161541000119104':
					$var4 = "perimenopausal";
					break;
				
				case '76498008':
					$var4 = "postmenopausal";
					break;
				case '22636003':
					$var4 = "premenopausal";
					break;
			}
			echo "<tr>
					<td>$var</td>
					<td>$var1</td>
					<td>$var2</td>
					<td>$var3</td>
					<td>$var4</td>
					<td>$var5</td>
				</tr>";
		}

		echo "</table>
</center>";
	}
}
?>

		</section>

		<footer>
			Perfil del alumno:
			<a href="https://moodle.lab.dit.upm.es/user/profile.php?id=1813">Manuel Ramos Calderón</a>
			Enviar email a:
			<a href="manuel.ramos.calderon@alumnos.upm.es">manuel.ramos.calderon@alumnos.upm.es</a>
		</footer>
	</body>
</html>