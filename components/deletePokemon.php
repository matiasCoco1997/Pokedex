<?php
include_once("conexion.php");

// Construir la consulta SQL
$sql = "SELECT * FROM Pokemones";

// Ejecutar la consulta y obtener los resultados
$resultado = $conexion->query($sql);

$id = $_GET['id'];

foreach ($resultado as $elemento) {

    if($elemento["IDPokemon"] == $id ){

        $sql = "UPDATE pokemones SET isEnabled = 0 WHERE IDPokemon =" . "$id";
        $conexion->query($sql);

        echo $sql;

        //header('Location: ../index.php');
    }

}

// Cerrar la conexión con la base de datos
mysqli_close($conexion);
?>

