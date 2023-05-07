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
                        <input type="text" placeholder="Ingrese el nombre, tipo o número de Pokemon" name="itemABuscar" required>

                        <button type="submit" name="busqueda">¿Quién es este Pokemon?</button>
                    </form>

                </article>

            </section>

            <section class="tablaDePokemones">

                <article>

                    <h2>Listado de Pokemones</h2>

                    <table>

                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Tipo</th>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            if(empty($_REQUEST)){
                                include('components/funcionTraerPokemones.php');
                            }

                            if(isset($_GET["itemABuscar"])){
                                include('components/funcionTraerPokemonesBuscados.php');
                            }

                            ?>
                        </tbody>

                    </table>

                </article>

                <article class="nuevoPokemonContenedor">

                    <a href="components/newPokemon.php" class="nuevoPokemon" type="submit" name="nuevoPokemon">Nuevo Pokemon</a>

                </article>

            </section>

        </main>

        <?php
            include("components/footer.php");
        ?>

    </body>
</html>
