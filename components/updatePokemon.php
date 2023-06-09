<!DOCTYPE html>

<html lang="en">

<body>
<?php
session_start();
if(file_exists("seguridad.txt")){
    $hash = file_get_contents("seguridad.txt");
}

include("header.php");

if (!empty($_COOKIE['seguridad']) && !empty($_SESSION["nombreUsuario"])) {

if ($_COOKIE['seguridad'] == $hash) {

        include("conexion.php");

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
            $id = $_POST['id'];
            $tipo = $_POST['opcion'];
            $numero = $_POST['img-numero-Pokemon'];
            $nombre =  $_POST['nombre-Pokemon'];
            $descripcion = $_POST['descripcion-Pokemon'];
            $isEnabled = 1;



            $directorio = "../../Pokedex/src/images/";

            // Construir la consulta UPDATE
            $sql = "UPDATE pokemones SET";

            if ($_FILES["img-Pokemon"]["name"] == "") {
                echo "No se recibió ningún archivo en la solicitud POST";
            }
            else {
                $imagen = $_FILES["img-Pokemon"];

                $ruta_destino = $directorio . basename($_FILES["img-Pokemon"]["name"]);

                $sql .= " imagen = '$ruta_destino',";

                move_uploaded_file($imagen["tmp_name"], $ruta_destino);
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

                            <input type="hidden" name="id" value="<?php echo $id ?>">

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

    }
}else{
    header("Location: ../index.php");
}
?>

</body>
</html>

