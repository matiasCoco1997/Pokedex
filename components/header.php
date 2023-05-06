<?php
echo "
<header>

            <a class='logo' href='pokemon.php'><img src='src/images/logo-pokebola.png'></a>
            <?php
            //PONER LA DIRECCION DEL INICIO en pokemon.php
            ?>
            <h1>Pokédex</h1>

            <div id='menu-icon'><i class='fa-solid fa-bars icono'></i></div>

            <form id='login-form' class='formLogin' method='POST' enctype='application/x-www-form-urlencoded' action=''>

                <label>Login</label>

                <input name='user' placeholder='Usuario' required>

                <input name='password' placeholder='Contraseña' required>

                <button type='submit' name='submit'>Ingresar</button>

            </form>

        </header>
     ";