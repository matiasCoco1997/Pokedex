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

$id = $_GET['id'];

// Ejecutar la consulta y obtener los resultados
$resultado = $conexion->query($sql);



// Cerrar la conexión con la base de datos
mysqli_close($conexion);
?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost/Pokedex/src/css/style.css">
        <link rel="icon" href="../src/images/logo-pokebola.png" type="image/png">
        <script src="https://kit.fontawesome.com/dc0786cc41.js" crossorigin="anonymous"></script>

        <title>Pokedex</title>
    </head>

    <body>
        <?php
            include("../../Pokedex/components/header.php");
        ?>

        <main>

            <section>
                <?php
                    foreach ($resultado as $elemento) {

                    if($elemento["IDPokemon"] == $id){

                        echo "<section>";

                            echo "<article class='contenedorPokemon'>";

                                echo "<span class='imgPokemon'>";
                                    echo"<img src=" . $elemento["imagen"] . " alt=' " . $elemento["nombre"] . "'>";
                                echo "</span>";

                                echo "<div>";

                                    echo "<span class='imgTipoPokemon'>";
                                        echo"<img src=" . $elemento["tipo"] . " alt='tipo_de_pokemon'>";
                                    echo "</span>";

                                    echo "<h2>" . $elemento["numero"] . " " . $elemento["nombre"] . "</h2>";

                                    echo "<p class='descripcionPokemon'>" . $elemento["descripcion"] ." </p>";

                                echo "</div>";

                            echo "</article>";

                        echo "</section>";
                    }

                }
                ?>
            </section>

        </main>

        <?php
            include("../../Pokedex/components/footer.php");
        ?>

    </body>
</html>
