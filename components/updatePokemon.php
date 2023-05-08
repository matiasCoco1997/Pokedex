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

if (empty($_POST)) {

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
} else {
    $id = $_POST['id'] ?? $_POST['id'];
    $tipo = $_POST['opcion'] ?? $_POST['opcion'];
    $numero = $_POST['img-numero-Pokemon'] ?? $_POST['img-numero-Pokemon'];
    $nombre = $_POST['nombre-Pokemon'] ?? $_POST['nombre-Pokemon'];
    $descripcion = $_POST['descripcion-Pokemon'] ?? $_POST['descripcion-Pokemon'];
    $isEnabled = 1;

    $directorio = "../../Pokedex/src/images/";

    // Construir la consulta UPDATE
    $sql = "UPDATE pokemones SET";

    if ($_FILES["img-Pokemon"]["name"] == "") {
        echo "No se recibió ningún archivo en la solicitud POST";
    } else {
        $imagen = $_FILES["img-Pokemon"];

        $ruta_destino = $directorio . basename($_FILES["img-Pokemon"]["name"]);

        $sql .= " imagen = '$ruta_destino',";
    }

    if (!empty($nombre)) {
        $sql .= " nombre = '$nombre',";
    }

    if (!empty($numero)) {
        $sql .= " numero = '$numero',";
    }

    if (!empty($tipo)) {
        $sql .= " tipo = '$tipo',";
    }

    if (!empty($descripcion)) {
        $sql .= " descripcion = '$descripcion',";
    }

    $sql = rtrim($sql, ",");

    $sql .= " WHERE IDPokemon = $id";

    $conexion->query($sql);

    header("Location: ../index.php");
}

?>

<main>

    <section class="formPokemon">

        <article>

            <form method='POST' enctype='multipart/form-data' action='updatePokemon.php'>

                <div>
                    <label for="img-Pokemon">Imagen del Pokemon:</label>
                    <input type="file" placeholder="Cambiar imagen" name="img-Pokemon">
                    <?php if ($imagen) { ?>
                        <img class="visualizacion-imagen" src="<?php echo $imagen; ?>" alt="Imagen actual del Pokemon">
                    <?php } ?>
                </div>

                <div>
                    <label for="img-tipo-Pokemon">Seleccione el tipo de Pokemon:</label>
                    <select id="opcion" name="opcion">

                        <option
                            value="../../Pokedex/src/images/Tipo_fuego.png" <?php if ($tipo == "../../Pokedex/src/images/Tipo_fuego.png") {
                            echo " selected";
                        } ?>>Fuego
                        </option>
                        <option
                            value="../../Pokedex/src/images/Tipo_planta.png" <?php if ($tipo == "../../Pokedex/src/images/Tipo_planta.png") {
                            echo " selected";
                        } ?>>Planta
                        </option>
                        <option
                            value="../../Pokedex/src/images/Tipo_agua.png" <?php if ($tipo == "../../Pokedex/src/images/Tipo_agua.png") {
                            echo " selected";
                        } ?>>Agua
                        </option>
                        <option
                            value="../../Pokedex/src/images/Tipo_electrico.png" <?php if ($tipo == "../../Pokedex/src/images/Tipo_electrico.png") {
                            echo " selected";
                        } ?>>Eléctrico
                        </option>

                    </select>
                </div>

                <div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                </div>

                <div>
                    <label for="img-numero-Pokemon">Ingrese el número de Pokemon:</label>
                    <input type="number" placeholder="Ingrese el número del Pokemon" name="img-numero-Pokemon"
                           value="<?php echo $numero; ?>">
                </div>

                <div>
                    <label for="nombre-Pokemon">Ingrese nombre del Pokemon</label>
                    <input type="text" placeholder="Ingrese el nombre del Pokemon" name="nombre-Pokemon"
                           value="<?php echo $nombre; ?>">
                </div>

                <div>
                    <label for="descripcion-Pokemon">Ingrese la descripción del Pokemon</label>
                    <input type="text" placeholder="Ingrese la descripción del Pokemon" name="descripcion-Pokemon"
                           value="<?php echo $descripcion; ?>">
                </div>

                <button type="submit" name="newPokemon">Actualizar datos</button>

            </form>

        </article>

    </section>

</main>

<?php
include("footer.php");
?>

</body>
</html>

