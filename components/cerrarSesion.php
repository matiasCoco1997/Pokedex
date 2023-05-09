<?php
session_start();
if($_SESSION["nombreUsuario"]){
    setcookie("seguridad",0,time()-1000, '/');
    unlink("seguridad.txt");
    header("location:../index.php");
    }else{
            header("location:../index.php");
}
?>
