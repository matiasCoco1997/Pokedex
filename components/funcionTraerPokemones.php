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
?>
<h2> Listado de Pokemones </h2>
<table>
    <thead>
    <tr>
        <th> Imagen</th>
        <th> Tipo</th>
        <th> N°</th>
        <th> Nombre</th>
        <th> Acciones</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($resultado as $elemento) {

        if ($elemento["isEnabled"] == 1) {

            echo "<tr class='fila'>";

            echo "<td class='pokemonImg'><img src=" . $elemento["imagen"] . " alt=" . $elemento["nombre"] . "></td>";

            echo "<td class='tipo'><img src=" . $elemento["tipo"] . " alt='Tipo_de_pokemon'></td>";

            echo "<td class='tipo'>" . $elemento["numero"] . "</td>";

            echo "<td class='tipo'>" . $elemento["nombre"] . "</td>";

            echo "<td class='acciones'>";

            echo "<a href='components/updatePokemon.php?id=" . $elemento["IDPokemon"] . "' ><i class='update fa-solid fa-pen-to-square'></i></a>";

            echo "<a href='components/deletePokemon.php?id=" . $elemento["IDPokemon"] . "' ><i class='delete fa-solid fa-trash'></i></a>";

            echo "<a href='components/Pokemon.php?id=" . $elemento["IDPokemon"] . "' ><i class='fa-solid fa-eye'></i></a>";

            echo '</td>';

            echo ' </tr>';
        }

    }

    // Cerrar la conexión con la base de datos
    mysqli_close($conexion);
    ?>
    </tbody>
</table>
