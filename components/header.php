<?php
echo "

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

            <a class='logo' href='../../Pokedex/index.php'><img src='../../Pokedex/src/images/logo-pokebola.png' alt='alt'></a>
            <?php
                //PONER LA DIRECCION DEL INICIO en pokemon.php
            ?>
            <h1>Pokédex</h1>

            <a id='menu-icon'>Login</a>

            <form id='login-form' class='formLogin' method='POST' enctype='application/x-www-form-urlencoded' action=''>

                <label>Login</label>

                <input type='text' name='user' placeholder='Usuario' required>

                <input type='password' name='password' placeholder='Contraseña' required>

                <button type='submit' name='submit'>Ingresar</button>

            </form>

        </header>
";