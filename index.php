<?php
	include("conexion.php");
?>
<!DOCTYPE html>
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
						<h1> Gestión de la base de datos del hospital de Gante</h1>
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
			<h1>Inicio</h1>
			<table>
				<tr>
					<td>
						<p>Gestiones hospitalarias basadas en la eficiencia y la calidad.</p>
						<p>¡¡Te dejará sin sentido!!</p>
					</td>
					<td>
						<aside><img src = "manu.png"
							onmouseout = "this.src='imagen1.png'"
							onmouseover = "this.src='imagen2.png'"
							onclick = "this.src='imagen3.png'">
						</aside>
					</td>
				</tr>
			</table>
		</section>

		<footer>
			Perfil del alumno:
			<a href="https://moodle.lab.dit.upm.es/user/profile.php?id=1813">Manuel Ramos Calderón</a>
			Enviar email a:
			<a href="manuel.ramos.calderon@alumnos.upm.es">manuel.ramos.calderon@alumnos.upm.es</a>
		</footer>
	</body>
</html>