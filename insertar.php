<?php

require 'conexion.php';

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$clave = $_POST["clave"];
$rol = "cliente";

$insertar = "INSERT INTO usuarios (nombre,apellidos,email,clave,rol) VALUES ('$nombre','$apellidos','$email','$clave','$rol')";

$query = mysqli_query($conn,$insertar);

if($query){

    header("Location: index.php");
 
 }else{
    header("Location: registrarse.php");
 }


?>