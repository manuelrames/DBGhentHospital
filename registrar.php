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
						<h1> Gestión de la base de datos del hospital </h1>
						<h2> En esta ventana puede incluir, modificar y eliminar datos de la base de datos</h2>
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

		<?php

if(isset($_POST["button"])){
	$btn=$_POST["button"];
	
	if($btn=="Registrar"){
		$nam=$_POST["Name"];
		$gende=$_POST["Gender"];
		$patient_i=$_POST["Patient_ID"];
		$birth_dat=$_POST["Birth_Date"];
		$menopausal_statu=$_POST["Menopausal_Status"];
		$institution_i=$_POST["Institution_ID"];

		switch ($menopausal_statu) {
				case 'perimenopausal':
					$menopausal_statu = "161541000119104";
					break;
				
				case 'postmenopausal':
					$menopausal_statu = "76498008";
					break;
				case 'premenopausal':
					$menopausal_statu = "22636003";
					break;
		}
		
		$sql="insert into patient values ('$nam','$gende','$patient_i','$birth_dat','$menopausal_statu','$institution_i')";
		
		$cs=mysql_query($sql,$cn);
		echo "<script> alert('Se he insertado correctamente');</script>";
	}
	if($btn=="Modificar"){
		$nam=$_POST["Name"];
		$gende=$_POST["Gender"];
		$patient_i=$_POST["Patient_ID"];
		$birth_dat=$_POST["Birth_Date"];
		$menopausal_statu=$_POST["Menopausal_Status"];
		$institution_i=$_POST["Institution_ID"];

		switch ($menopausal_statu) {
				case 'perimenopausal':
					$menopausal_statu = "161541000119104";
					break;
				
				case 'postmenopausal':
					$menopausal_statu = "76498008";
					break;
				case 'premenopausal':
					$menopausal_statu = "22636003";
					break;
		}
		
		$sql="update patient set Name='$nam',Gender='$gende',Birth_Date='$birth_dat', Menopausal_Status='$menopausal_statu', Institution_ID='$institution_i' where Patient_ID='$patient_i'";
		
		$cs=mysql_query($sql,$cn);
		echo "<script> alert('Se ha actualizado correctamente');</script>";
	}
		
	if($btn=="Eliminar"){
		$patient_i=$_POST["Patient_ID"];
			
		$sql="delete from patient where Patient_ID='$patient_i'";
		
		$cs=mysql_query($sql,$cn);
		echo "<script> alert('Se ha eliminado correctamente');</script>";
	}
}

?>
		
		<section>
			<h1>Registrar y modificar datos</h1>
			<form name="formulario" action="registrar.php" method="post">
				<table>
					<tr>
						<td>
							<label>Nombre y apellido del paciente:</label>
							<br>
							<label>Genero:</label>
							<br>
							<label>Identificador de paciente:</label>
							<br>
							<label>Fecha de nacimiento:</label>
							<br>
							<label>Estado menopausico:</label>
							<br>
							<label>Identificador del hospital:</label>
							<br>
						</td>
						<td>
							<input name="Name" type="text" />
							<br>
							<input name="Gender" type="text" />
							<br>
							<input name="Patient_ID" type="text" />
							<br>
							<input name="Birth_Date" type="text" />
							<br>
							<input name="Menopausal_Status" type="text" />
							<br>
							<input name="Institution_ID" type="text" />
							<br>
						</td>
					</tr>
					<tr>
						<td>
							<input name="button" type="submit" value="Registrar" />
						</td>
						<td>
							<input name="button" type="submit" value="Modificar" />
						</td>
						<td>
							<input name="button" type="submit" value="Eliminar" />
						</td>
					</tr>
				</table>	
			</form>
		</section>

		<footer>
			Perfil del alumno:
			<a href="https://moodle.lab.dit.upm.es/user/profile.php?id=1813">Manuel Ramos Calderón</a>
			Enviar email a
			<a href="manuel.ramos.calderon@alumnos.upm.es">manuel.ramos.calderon@alumnos.upm.es</a>
		</footer>
	</body>
</html>