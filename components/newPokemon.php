<!DOCTYPE html>

<html lang="en">

<body>
<?php
include("header.php");
?>

<main>

    <section class="creacionDePokemon">

        <article>

            <form method='POST' enctype='multipart/form-data' action='../index.php'>

                <div>
                    <label for="img-Pokemon">Ingrese la imagen del Pokemon:</label>
                    <input type="file" placeholder="Ingrese imagen del Pokemon" name="img-Pokemon" required>
                </div>

                <div>
                    <label for="img-tipo-Pokemon">Seleccine el tipo de Pokemon:</label>
                    <select id="opcion" name="opcion" required>

                        <option value="opcion1" selected>Fuego</option>
                        <option value="opcion2">Planta</option>
                        <option value="opcion3">Agua</option>
                        <option value="opcion4">Eléctrico</option>

                        <option value="../../Pokedex/src/images/Tipo_fuego.png" selected>Fuego</option>
                        <option value="../../Pokedex/src/images/Tipo_planta.png">Planta</option>
                        <option value="../../Pokedex/src/images/Tipo_agua.png">Agua</option>
                        <option value="../../Pokedex/src/images/Tipo_electrico.png">Eléctrico</option>

                    </select>
                </div>

                <div>
                    <label for="img-numero-Pokemon">Ingrese el número de Pokemon:</label>
                    <input type="number" placeholder="Ingrese el número del Pokemon" name="img-numero-Pokemon" required>
                </div>

                <div>
                    <label for="nombre-Pokemon">Ingrese nombre del Pokemon</label>
                    <input type="text" placeholder="Ingrese el nombre del Pokemon" name="nombre-Pokemon" required>
                </div>

                <div>
                    <label for="descripcion-Pokemon">Ingrese la descripción del Pokemon</label>
                    <input type="text" placeholder="Ingrese la descripción del Pokemon" name="descripcion-Pokemon" required>
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

//FALTA LEVANTAR LA OPCION DE LA IMAGEN (para pasarle la ruta de un archivo que yo suba)
$tipo = $_POST['opcion'] ?? $_POST['opcion'];
$numero = $_POST['numero-Pokemon'] ?? $_POST['numero-Pokemon'];
$nombre = $_POST['nombre-Pokemon'] ??$_POST['nombre-Pokemon'];
$descripcion = $_POST['descripcion-Pokemon'] ?? $_POST['descripcion-Pokemon'];
$estado = 1;

$directorio = "../../Pokedex/src/images/";

if (isset($_FILES["img-Pokemon"])) {

    $imagen = $_FILES["img-Pokemon"];

    $ruta_destino = $directorio  . basename($_FILES["img-Pokemon"]["name"]);

    if (move_uploaded_file($imagen["tmp_name"], $ruta_destino)) {

        // Construir la consulta SQL
        $sql = "INSERT INTO pokemones (`imagen`, `nombre`, `numero`, `tipo`, `descripcion` ,`estado`) VALUES ( '$ruta_destino', '$nombre', '$numero', '$tipo', '$descripcion', '$estado')";

        $conexion->query($sql);
        exit();

    } else {
        echo "<p>Ha ocurrido un error al subir la imagen.</p>";
    }
}

// Cerrar la conexión con la base de datos
mysqli_close($conexion);



