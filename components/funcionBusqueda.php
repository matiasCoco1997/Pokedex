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

    // Obtener el término de búsqueda ingresado por el usuario
    $busqueda = $_POST["busqueda"];

    // Construir la consulta SQL
    $sql = "SELECT * FROM nombres WHERE nombre LIKE '%$busqueda%'";

    // Ejecutar la consulta y obtener los resultados
    $resultado = $conexion->query($sql);

    echo $resultado;

    foreach ($resultado as $elemento) {

        echo "<tr class='fila'>";

        echo "<td class='pokemonImg'><img src=" . $elemento["imagen"] . " alt=" . $elemento["nombre"] . "></td>";

        echo "<td class='tipo'><img src=" . $elemento["imagen"] . " alt='Tipo_de_pokemon'></td>";

        echo "<td class='tipo'>" . $elemento["numero"] . "</td>";

        echo "<td class='tipo'>" . $elemento["nombre"] . "</td>";

        echo '<td class="acciones">
                        <a href="components/updatePokemon.php"><i class="update fa-solid fa-pen-to-square"></i></a>
                        <a href="components/deletePokemon.php"><i class="delete fa-solid fa-trash"></i></a>
              </td>';
        echo ' </tr>';
    }

    // Cerrar la conexión con la base de datos
    mysqli_close($conexion);
?>
