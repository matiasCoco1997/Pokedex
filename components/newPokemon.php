<!DOCTYPE html>

<html lang="en">

<body>
<?php
include("header.php");
?>

<main>

    <section class="creacionDePokemon">

        <article>

            <form method='POST' enctype='application/x-www-form-urlencoded' action='../index.php'>

                <div>
                    <label for="img-Pokemon">Ingrese la imagen del Pokemon:</label>
                    <input type="file" placeholder="Ingrese imagen del Pokemon" name="img-Pokemon" required>
                </div>

                <div>
                    <label for="img-tipo-Pokemon">Seleccine el tipo de Pokemon:</label>
                    <select id="opcion" name="opcion" required>
                        <option value="1" selected>Fuego</option>
                        <option value="2">Planta</option>
                        <option value="3">Agua</option>
                        <option value="4">Eléctrico</option>
                    </select>
                </div>

                <div>
                    <label for="img-numero-Pokemon">Ingrese el número de Pokemon:</label>
                    <input type="number" placeholder="Ingrese el número del Pokemon" name="numero-Pokemon" required>
                </div>

                <div>
                    <label for="nombre-Pokemon">Ingrese nombre del Pokemon</label>
                    <input type="text" placeholder="Ingrese el nombre del Pokemon" name="nombre-Pokemon" required>
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

$imagen = $_POST['img-Pokemon'];
$tipo = $_POST['opcion'];
$numero = $_POST['numero-Pokemon'];
$nombre = $_POST['nombre-Pokemon'];
$estado = 1;

// Construir la consulta SQL
$sql = "INSERT INTO pokemones (`imagen`, `nombre`, `numero`, `tipo`, `estado`) VALUES ( `$imagen`, `$nombre`, `$numero`, `$tipo`, `$estado`)";

$conexion->query($sql);
header('Location: ../index.php');

// Cerrar la conexión con la base de datos
mysqli_close($conexion);
?>
