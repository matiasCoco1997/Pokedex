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
    die("La conexión falló: " . mysqli_connect_error());
}

// Construir la consulta SQL
$sql = "SELECT * FROM Pokemones";

// Ejecutar la consulta y obtener los resultados
$resultado = $conexion->query($sql);

$id = $_GET['id'];

foreach ($resultado as $elemento) {

    if($elemento["IDPokemon"] == $id ){

        $sql = "UPDATE pokemones SET isEnabled = 0 WHERE IDPokemon =" . "$id";
        $conexion->query($sql);

        header('Location: ../index.php');
    }

}

// Cerrar la conexión con la base de datos
mysqli_close($conexion);
?>