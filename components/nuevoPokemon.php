<?php
if (!empty($_COOKIE['seguridad']) && !empty($_SESSION["nombreUsuario"])) {

    if ($_COOKIE['seguridad'] == $hash) {
       echo' <article class="nuevoPokemonContenedor">
        
           <a href="components/newPokemon.php" class="nuevoPokemon" type="submit">Nuevo Pokemon</a>
        
        </article>';
    }
};
?>
