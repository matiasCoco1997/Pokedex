<?php
session_start();
if($_SESSION["nombreUsuario"]){
    setcookie("seguridad",0,time()-1000, '/');
    unlink("seguridad.txt");
    session_destroy();
    header("location:../index.php");
    exit();
    }else{
            header("location:../index.php");
            exit();
}
?>
