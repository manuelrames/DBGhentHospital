<?php
	include("conexion.php");
?>

<?php
	// Matriz usada para introducir el identificador de cada paciente
	// para ser usada posteriormente en la obtención del número de pacientes cuyo
	// tamaño del tumor varía.

	$IDPacientes = array ();

	// Código para obtener el % de pacientes con ER positivo

	$varSumER = 0;
	$varSumPatient = 0;
	$sqlER="select * from patient,study where patient.Patient_ID=study.Patient_ID and study.ER=416053008";
	$cs=mysql_query($sqlER,$cn);
	while($resul=mysql_fetch_array($cs)){
		$varSumER++;
	}
	$sqlERtotal="select * from patient";
	$cs2=mysql_query($sqlERtotal,$cn);
	while($resul=mysql_fetch_array($cs2)){
		$varSumPatient++;
		array_push($IDPacientes, $resul[2]);
	}
	$varPorcER = 0;
	$varPorcER = ($varSumER/$varSumPatient)*100;

	// Código para obtener el identificador de los pacientes con HER2 negativo menores de 50 años

	$sqlHER2="select * from patient,study where patient.Patient_ID=study.Patient_ID and Birth_Date > '1965/01/01' and study.HER2=431396003";
	$cs3=mysql_query($sqlHER2,$cn);
	$varHER2_ID = "";

	// Código para obtener el número de pacientes cuyo estadio del tumor
	// varía a lo largo de los estudios y dibujar una gráfica
	// comparativa entre estos y el número total de pacientes.

	$sizes = array();
	$numCambios = 0;
	for ($i=0; $i < count($IDPacientes); $i++) { 
		$id = $IDPacientes[$i];
		$sqlTumor="select * from diagnosis where Patient_ID = '$id'";
		$csTumor=mysql_query($sqlTumor,$cn);
		$count = 0;
		while($resul=mysql_fetch_array($csTumor)){
			$sizes[$count]=$resul[0];
			$count++;
		}
   		for ($j=0; $j < count($sizes); $j++) { 
   			if ($sizes[0] != $sizes[$j]){
   				$numCambios++;
   				break;
   			}
   		}
	}
	
	// Código para calcular la reducción media del tumor
	// en pacientes con y sin quimoterapia


	// Código para obtener el ratio de pacientes que abandona el estudio
	// (menos de 4 visitas)

	$varTodasVisitas = 0;
	$varParticipantes = 0;
	$sqlTodasVisitas="select * from visit where Visit_Number = 4";
	$cs4=mysql_query($sqlTodasVisitas,$cn);
	$sqlParticipantes="select * from visit where Visit_Number = 1";
	$cs5=mysql_query($sqlParticipantes,$cn);
	while($resul=mysql_fetch_array($cs4)){
		$varTodasVisitas++;
	}
	while($resul=mysql_fetch_array($cs5)){
		$varParticipantes++;
	}
	$ratioAbandono = 0;
	$ratioAbandono = ($varTodasVisitas/$varParticipantes)*100;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Conectando PHP y MySQL</title>
		<link rel="stylesheet" media='only screen and (min-width: 481px)' type="text/css" href="estilos.css"/>

		<!--Load the AJAX API-->
    	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript">

      	// Load the Visualization API and the piechart package.
      	google.load('visualization', '1.0', {'packages':['corechart']});

      	// Set a callback to run when the Google Visualization API is loaded.
      	google.setOnLoadCallback(drawChart);

      	// Callback that creates and populates a data table,
      	// instantiates the pie chart, passes in the data and
      	// draws it.
      	function drawChart() {
        	// Create the data table.
        	var data = new google.visualization.DataTable();
        	data.addColumn('string', 'Pacientes con cambios o sin cambios en el estadio del tumor');
        	data.addColumn('number', 'Número de pacientes');
        	data.addRows([
        	  ['Con cambios en el estadio del tumor', 4],
        	  ['Sin cambios en el estadio del tumor', 6],
        	]);

        	// Set chart options
        	var options = {'title':'Pacientes cuyo tumor ha cambiado de estadio',
        	               'width':400,
        	               'height':300,
        	            	is3D: true,
        	           		backgroundColor:'#A1F3CD'};

        	// Instantiate and draw our chart, passing in some options.
        	var chart = new google.visualization.PieChart(document.getElementById('query_3'));
        	chart.draw(data, options);
      	}

      	// Set a callback to run when the Google Visualization API is loaded.
      	google.setOnLoadCallback(drawChart2);

      	// Callback that creates and populates a data table,
      	// instantiates the pie chart, passes in the data and
      	// draws it.
      	function drawChart2() {
        	// Create the data table.
        	var data = new google.visualization.DataTable();
        	data.addColumn('string', 'Pacientes con ER postivo VS ER negativo');
        	data.addColumn('number', 'Número de pacientes');
        	data.addRows([
        	  ['ER negativo', 4],
        	  ['ER positivo', 6],
        	]);

        	// Set chart options
        	var options = {'title':'Pacientes con ER postivo VS ER negativo',
        	               'width':400,
        	               'height':300,
        	               	is3D: true,
        	           		backgroundColor:'#A1F3CD'};

        	// Instantiate and draw our chart, passing in some options.
        	var chart = new google.visualization.PieChart(document.getElementById('query_1'));
        	chart.draw(data, options);
      	}

      	// Set a callback to run when the Google Visualization API is loaded.
      	google.setOnLoadCallback(drawChart3);

      	// Callback that creates and populates a data table,
      	// instantiates the pie chart, passes in the data and
      	// draws it.
      	function drawChart3() {
        	// Create the data table.
        	var data = new google.visualization.DataTable();
        	data.addColumn('string', 'Abandonos del estudio');
        	data.addColumn('number', 'Número de pacientes');
        	data.addRows([
        	  ['Abandonaron el estudio', 4],
        	  ['Completaron el estudio', 6],
        	]);

        	// Set chart options
        	var options = {'title':'Pacientes con HER2 postivo VS HER2 negativo menores de 50 años',
        	               'width':400,
        	               'height':300,
        	           		is3D: true,
        	           		backgroundColor:'#A1F3CD'};

        	// Instantiate and draw our chart, passing in some options.
        	var chart = new google.visualization.PieChart(document.getElementById('query_5'));
        	chart.draw(data, options);
      	}
    	</script>


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
			<h1>Estadisticas sobre los pacientes almacenados</h1>
			<h2>Número de pacientes ingresados actualmente: <?php echo $varSumPatient ?></h2>
			<form name="formulario" action="consultar.php" method="post">
				<table>
					<tr>
						<td>
							<label>Porcentaje de pacientes con ER positivo:</label>
						</td>
						<td>
							<label>Identificador de los pacientes con HER2 negativo menores de 50 años:</label>
						</td>
						<td>
							<label>Número de pacientes cuyo estadio del tumor varía a lo largo de los estudios:</label>
						</td>
						<td>
							<label>Reducción media del tumor en pacientes con y sin quimoterapia:</label>
						</td>
						<td>
							<label>Ratio de pacientes que abandona el estudio (menos de 4 visitas):</label>
						</td>
					</tr>
					<tr>
						
					</tr>
					<tr>
						<td id="query_1">
							<?php echo $varPorcER ?>
						</td>
						<td>
							<?php
								echo"<center>
									<table border='3'>
										<tr>
											<td>Patient_ID</td>
										</tr>";
								while($resul=mysql_fetch_array($cs3)){
									$varHER2_ID=$resul[2];
									echo "<tr>
											<td>$varHER2_ID</td>
										</tr>";
								}

								echo "</table>
								</center>";
							?>
						</td>
						<td id="query_3">
							<?php echo $numCambios ?>
						</td>
						<td>
							No realizada...
						</td>
						<td id="query_5">
							<?php echo $ratioAbandono ?>
						</td>
					</tr>
				</table>
			</form>
		</section>

		<footer>
			Perfil del alumno:
			<a href="https://moodle.lab.dit.upm.es/user/profile.php?id=1813">Manuel Ramos Calderón</a>
			Enviar email a:
			<a href="manuel.ramos.calderon@alumnos.upm.es">manuel.ramos.calderon@alumnos.upm.es</a>
		</footer>
	</body>
</html>