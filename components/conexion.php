<?php
//Establecer parametros para la conexion a la base de datos
$serverName = "localhost";
$username = "root";
$password = "";
$database = "pokedex";

// Establecer la conexión con la base de datos
$conexion = mysqli_connect($serverName, $username, $password, $database);

// Verificar si la conexión es exitosa
if (!$conexion) {
    var_dump($conexion);
    die("La conexión falló: " . mysqli_connect_error());
};
?>