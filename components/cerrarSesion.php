<?php
session_start();
if($_SESSION["nombreUsuario"]){
    setcookie("seguridad",0,time()-1000, '/');
    unlink("seguridad.txt");
    session_destroy();
    header("location:../../Pokedex/index.php");
    exit();
    }else{
            header("location:../../Pokedex/index.php");
            exit();
}
?>
