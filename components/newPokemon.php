<?php
?>

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
                        <option value="opcion1" selected>Fuego</option>
                        <option value="opcion2">Planta</option>
                        <option value="opcion3">Agua</option>
                        <option value="opcion4">Eléctrico</option>
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

