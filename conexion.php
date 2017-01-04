<?php	
	// Conexion a la base de datos MySQL llamada "hospitalgante"
	$cn = mysql_connect('localhost','root','') or die("Error de conexion");
	$db = mysql_select_db("hospitalgante") or die("No se pudo conectar a la base de datos");
	return($cn);
	return($db);
	?>
		