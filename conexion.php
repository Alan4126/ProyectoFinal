<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sistemapeliculas";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

/*$email = $_POST["email"];
$clave = $_POST["clave"];

$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE email = '".$email."' and clave = '".$clave."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	header("Location: principal.php");
	
	
}
else if ($nr == 0) 
{
	header("Location: index.php");
	//echo "No ingreso"; 
}*/

?>