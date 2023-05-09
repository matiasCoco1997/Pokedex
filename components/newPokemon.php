<?php
session_start();

include("header.php");

if (!empty($_COOKIE['seguridad']) && !empty($_SESSION["nombreUsuario"])) {

    if ($_COOKIE['seguridad'] == $hash) {
echo'

<main>

    <section class="formPokemon">

        <article>

            <form method="POST" enctype="multipart/form-data" action="newPokemon.php">

                <div>
                    <label for="img-Pokemon">Ingrese la imagen del Pokemon:</label>
                    <input type="file" placeholder="Ingrese imagen del Pokemon" name="img-Pokemon" required>
                </div>

                <div>
                    <label for="img-tipo-Pokemon">Seleccine el tipo de Pokemon:</label>
                    <select id="opcion" name="opcion" required>

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

</main>';
    }
}

include("footer.php");

echo"</body>
    </html>";


include_once("conexion.php");

//FALTA LEVANTAR LA OPCION DE LA IMAGEN (para pasarle la ruta de un archivo que yo suba)
$tipo = $_POST['opcion'] ?? $_POST['opcion'];
$numero = $_POST['img-numero-Pokemon'] ?? $_POST['img-numero-Pokemon'];
$nombre = $_POST['nombre-Pokemon'] ??$_POST['nombre-Pokemon'];
$descripcion = $_POST['descripcion-Pokemon'] ?? $_POST['descripcion-Pokemon'];
$isEnabled = 1;

$directorio = "../../Pokedex/src/images/";

        if (isset($_FILES["img-Pokemon"])) {

            $imagen = $_FILES["img-Pokemon"];

            $ruta_destino = $directorio . basename($_FILES["img-Pokemon"]["name"]);

            if (move_uploaded_file($imagen["tmp_name"], $ruta_destino)) {

                // Construir la consulta SQL
                $sql = "INSERT INTO pokemones (`imagen`, `nombre`, `numero`, `tipo`, `descripcion` ,`isEnabled`) VALUES ( '$ruta_destino', '$nombre', '$numero', '$tipo', '$descripcion', '$isEnabled')";

                $conexion->query($sql);

                header("Location: ../index.php");

            } else {
                echo "<p>Ha ocurrido un error al subir la imagen.</p>";
            }
        }


// Cerrar la conexión con la base de datos
mysqli_close($conexion);


