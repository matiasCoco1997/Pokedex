<?php
session_start();
if($_SESSION["nombreUsuario"]){
    setcookie("seguridad",0,time()-1000, '/');
    $fp = fopen("seguridad.txt", "w"); // abrir archivo en modo escritura
    ftruncate($fp, 0); // truncar contenido del archivo a cero bytes
    fclose($fp); // cerrar el archivo
    header("location: ../index.php");
    }else{
            header("location:../index.php");
}
?>
