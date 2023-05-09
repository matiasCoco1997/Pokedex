<?php
    echo("<a id='menu-icon'>Login</a>");
    echo("<form id='login-form' class='formLogin' method='POST' enctype='application/x-www-form-urlencoded' action='components/chequearLogin.php'>");
    echo("<label>Login</label>");
    echo("<input type='text' name='user' placeholder='Usuario' required>");
    echo("<input type='password' name='password' placeholder='Contraseña' required>");
    echo("<button type='submit' name='submit'>Ingresar</button>");
    echo("</form>");
?>