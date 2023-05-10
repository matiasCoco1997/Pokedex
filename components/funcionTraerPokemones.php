<?php
include_once("conexion.php");

// Construir la consulta SQL
$sql = "SELECT * FROM pokemones";

// Ejecutar la consulta y obtener los resultados
$resultado = $conexion->query($sql);
?>

<style>
    #popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        padding: 20px;
        z-index: 9999;
        max-width: 80%;
    }

    #popup p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    #popup a {
        display: inline-block;
        background-color: #ea5454;
        color: #fff;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    #popup a:hover {
        background-color: #ea5454;
    }

    #popup button {
        display: inline-block;
        background-color: #e4e4e4;
        color: #000;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    #popup a:hover {
        background-color: #ea5454;
    }

    #popup button:hover {
        background-color: #c4c4c4;
    }

    .containerButtons{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
    }

    .eliminar-btn{
        border: none;
        font-size: 22px;
    }
</style>


<script>
    var idPokemon;

    function abrirPopup(e) {
        const boton = event.target;
        idPokemon = boton.getAttribute('data-id');
        document.getElementById("popup").style.display = "block";
    }

    function eliminarPokemon() {
        window.location.href = "components/deletePokemon.php?id=" + idPokemon;
    }

    function cerrarPopup() {
        document.getElementById("popup").style.display = "none";
    }

    const eliminarBtn = document.querySelector('.eliminar-btn');
    eliminarBtn.addEventListener('click', abrirPopup);
</script>


<h2> Listado de Pokemones </h2>
<table>
    <thead>
    <tr>
        <th> Imagen</th>
        <th> Tipo</th>
        <th> N°</th>
        <th> Nombre</th>
        <th> Acciones</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($resultado as $elemento) {

        if ($elemento["isEnabled"] == 1) {

            echo "<tr class='fila'>";

            echo "<td class='pokemonImg'><img src=" . $elemento["imagen"] . " alt=" . $elemento["nombre"] . "></td>";

            echo "<td class='tipo'><img src=" . $elemento["tipo"] . " alt='Tipo_de_pokemon'></td>";

            echo "<td class='tipo'>" . $elemento["numero"] . "</td>";

            echo "<td class='tipo'>" . $elemento["nombre"] . "</td>";


            echo "<td class='acciones'>";
            if (!empty($_COOKIE['seguridad']) && !empty($_SESSION["nombreUsuario"])) {
                if ($_COOKIE['seguridad'] == $hash) {
                    echo "<a href='components/updatePokemon.php?id=" . $elemento["IDPokemon"] . "' ><i class='update fa-solid fa-pen-to-square'></i></a>";
                    echo "<button class='eliminar-btn' onclick='abrirPopup()' data-id='{$elemento['IDPokemon']}'><i class='delete fa-solid fa-trash'></i></button>";
                }
            }

            echo "<a href='components/Pokemon.php?id=" . $elemento["IDPokemon"] . "' ><i class='fa-solid fa-eye'></i></a>";

            echo '</td>';
            echo ' </tr>';

        }

    }

    echo ' <div id="popup" style="display: none;">';
    echo ' <p>¿Está seguro de que desea eliminar este elemento?</p>';
    echo ' <div class="containerButtons">';
    echo ' <button onclick="eliminarPokemon()">Eliminar</button>';
    echo ' <button onclick="cerrarPopup()">Cancelar</button>';
    echo ' </div>';
    echo ' </div>';

    // Cerrar la conexión con la base de datos
    mysqli_close($conexion);
    ?>
    </tbody>
</table>
