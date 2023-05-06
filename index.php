<?php
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

                    <form method='POST' enctype='application/x-www-form-urlencoded' action='index.php'>
                        <input type="text" placeholder="Ingrese el nombre, tipo o número de Pokemon" name="itemABuscar" required>

                        <button>¿Quién es este Pokemon?</button>
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

                            <tr class="fila">
                                <td class="pokemonImg"><img src="src/images/charmander.png" alt="alt"></td>
                                <td class="tipo"><img src="src/images/Tipo_fuego.png" alt="alt"></td>
                                <td>1</td>
                                <td>Charmander</td>
                                <td class="acciones">
                                    <a href="components/updatePokemon.php"><i class="update fa-solid fa-pen-to-square"></i></a>
                                    <a href="components/deletePokemon.php"><i class="delete fa-solid fa-trash"></i></a>
                                </td>
                            </tr>

                            <tr class="fila">
                                <td class="pokemonImg"><img src="src/images/charmander.png" alt="alt"></td>
                                <td class="tipo"><img src="src/images/Tipo_fuego.png" alt="alt"></td>
                                <td>2</td>
                                <td>Charmander</td>
                                <td class="acciones">
                                    <a href="components/updatePokemon.php"><i class="update fa-solid fa-pen-to-square"></i></a>
                                    <a href="components/deletePokemon.php"><i class="delete fa-solid fa-trash"></i></a>
                                </td>
                            </tr>


                            <tr class="fila">
                                <td class="pokemonImg"><img src="src/images/charmander.png" alt="alt"></td>
                                <td class="tipo"><img src="src/images/Tipo_fuego.png" alt="alt"></td>
                                <td>3</td>
                                <td>Charmander</td>
                                <td class="acciones">
                                    <a href="components/updatePokemon.php"><i class="update fa-solid fa-pen-to-square"></i></a>
                                    <a href="components/deletePokemon.php"><i class="delete fa-solid fa-trash"></i></a>
                                </td>
                            </tr>


                            <?php
                                /*ACA HAY QUE HACER EL FOR EACH CON LOS POKEMONES QUE EXISTAN (hacer la logica con los tr y los td) TAMBIEN EL TEMA DE LA LAS ACCIONES SI ESTA LOGUEADO EL ADMIN*/
                            ?>
                        </tbody>

                    </table>

                </article>

                <article class="nuevoPokemonContenedor">

                    <button class="nuevoPokemon" type="submit" name="nuevoPokemon">Nuevo Pokemon</button>

                </article>

            </section>

        </main>

        <?php
            include("components/footer.php");
        ?>

    </body>
</html>
