<!DOCTYPE html>

<html lang="en">

<body>
<?php
include("header.php");
?>

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

$id = $_GET['id'];

$sql = "SELECT * FROM pokemones WHERE IDPokemon=$id";

$resultado = $conexion->query($sql);


if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $nombre = $fila['nombre'];
    $numero = $fila['numero'];
    $imagen = $fila['imagen'];
    $tipo = $fila['tipo'];
    $isEnabled = $fila['isEnabled'];
    $descripcion = $fila['descripcion'];
}

echo $nombre;


?>

<main>

    <section class="formPokemon">

        <article>

            <form method='POST' enctype='multipart/form-data' action='newPokemon.php'>

                <div>
                    <label for="img-Pokemon">Imagen del Pokemon:</label>
                    <input type="file" placeholder="Cambiar imagen" name="img-Pokemon" value="<?php echo $imagen; ?>" required>
                    <?php if ($imagen) { ?>
                        <img class="visualizacion-imagen" src="<?php echo $imagen; ?>" alt="Imagen actual del Pokemon">
                    <?php } ?>
                </div>



                <div>
                    <label for="img-tipo-Pokemon">Seleccione el tipo de Pokemon:</label>
                    <select id="opcion" name="opcion" required>

                        <option value="../../Pokedex/src/images/Tipo_fuego.png" <?php if ($tipo == "../../Pokedex/src/images/Tipo_fuego.png") { echo " selected"; } ?>>Fuego</option>
                        <option value="../../Pokedex/src/images/Tipo_planta.png" <?php if ($tipo == "../../Pokedex/src/images/Tipo_planta.png") { echo " selected"; } ?>>Planta</option>
                        <option value="../../Pokedex/src/images/Tipo_agua.png" <?php if ($tipo == "../../Pokedex/src/images/Tipo_agua.png") { echo " selected"; } ?>>Agua</option>
                        <option value="../../Pokedex/src/images/Tipo_electrico.png" <?php if ($tipo == "../../Pokedex/src/images/Tipo_electrico.png") { echo " selected"; } ?>>Eléctrico</option>

                    </select>
                </div>

                <div>
                    <label for="img-numero-Pokemon">Ingrese el número de Pokemon:</label>
                    <input type="number" placeholder="Ingrese el número del Pokemon" name="img-numero-Pokemon" value="<?php echo $numero; ?>" required>
                </div>

                <div>
                    <label for="nombre-Pokemon">Ingrese nombre del Pokemon</label>
                    <input type="text" placeholder="Ingrese el nombre del Pokemon" name="nombre-Pokemon" value="<?php echo $nombre; ?>" required>
                </div>

                <div>
                    <label for="descripcion-Pokemon">Ingrese la descripción del Pokemon</label>
                    <input type="text" placeholder="Ingrese la descripción del Pokemon" name="descripcion-Pokemon" value="<?php echo $descripcion; ?>" required>
                </div>

                <button type="submit" name="newPokemon">Crear Pokemon</button>

            </form>

        </article>

    </section>

</main>

<?php
include("footer.php");
?>

</body>
</html>

