<?php
session_start();
if(file_exists("components/seguridad.txt")){
    $hash = file_get_contents("components/seguridad.txt");
}
?>
<!DOCTYPE html>

<html lang="en">

<body>
<?php
include("components/header.php");
?>

<main>

    <section class="buscadorDePokemones">

        <article>

            <form method='GET' enctype='application/x-www-form-urlencoded' action='index.php'>
                <input type="text" placeholder="Ingrese el nombre, tipo o número de Pokemon" name="itemABuscar">

                <button type="submit" name="busqueda">¿Quién es este Pokemon?</button>
            </form>

        </article>

    </section>

    <section class="tablaDePokemones">

        <article>

            <?php
                if (empty($_REQUEST)) {
                    include('components/funcionTraerPokemones.php');
                }

                if (isset($_GET["itemABuscar"])) {
                    include('components/funcionTraerPokemonesBuscados.php');
                }
            ?>

        </article>
        <?php
        include("components/nuevoPokemon.php");
        ?>
    </section>

</main>

<?php
include("components/footer.php");
?>

</body>
</html>
