<?php
if (!empty($_COOKIE['seguridad']) && !empty($_SESSION["nombreUsuario"])) {

    if ($_COOKIE['seguridad'] == $hash) {
       echo' <article class="nuevoPokemonContenedor">
        
           <a href="components/newPokemon.php" class="nuevoPokemon" type="submit" name="nuevoPokemon">Nuevo Pokemon</a>"
        
        </article>';
    }
};
?>
