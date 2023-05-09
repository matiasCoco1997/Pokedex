<?php
echo ("

        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='http://localhost/Pokedex/src/css/style.css'>
            <link rel='icon' href='../../Pokedex/src/images/logo-pokebola.png' type='image/png'>
            <script src='https://kit.fontawesome.com/dc0786cc41.js' crossorigin='anonymous'></script>
        
            <title>Pokedex</title>
        </head>

        <header>

            <a class='logo' href='../../Pokedex/index.php'><img src='../../Pokedex/src/images/logo-pokebola.png' alt='Pokebola'></a>
            <?php
                //PONER LA DIRECCION DEL INICIO en pokemon.php
            ?>
            <h1>Pokédex</h1>");
            
            if(!empty($_GET["error"])){
                echo("<p>Usuario o contraseña no pueden estar vacios</p>");
            }
            if(!empty($_SESSION["error"])){
                echo("<p>Usuario o contraseña incorrecta</p>");
            }
            if (!empty($_SESSION["nombreUsuario"])) {
                if ($_COOKIE['seguridad'] == $hash) {
                    echo("<h2>Bienvenido " .$_SESSION["nombreUsuario"] ."!</h2>");
                    echo"<div><a href='components/cerrarSesion.php'>Cerrar sesión</a></div>";
                    echo"<br>";
                } else{
                    setcookie("seguridad",0,time()-1000, '/');
                    session_destroy();
                    echo(include_once('login.php'));
                }
            }else{
                echo(include_once('login.php'));
            }

            echo("</header>");