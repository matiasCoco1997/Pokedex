<?php
session_start();
include_once("conexion.php");
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$especialidad = $_POST['especialidad'];

if(!empty($_POST['user'])&&!empty($_POST['password'])){
    $posibleUsuario = $_POST['user'];
    $posibleContrasenia = md5($_POST['password']);
    $sql = "SELECT * FROM `usuarios` WHERE `nombreUsuario`='$posibleUsuario'";
    $query = mysqli_query($conexion,$sql) or die("Fallo en la consulta");

    if(mysqli_num_rows($query) > 0){

        $datos = mysqli_fetch_assoc($query);
        $contraseniabbdd = $datos['contrasenia'];
        $nombreUsuario = $datos['nombre'];

        if($posibleContrasenia == $contraseniabbdd){
            session_regenerate_id(true);
            $_SESSION["nombreUsuario"] = $nombreUsuario;
            $hash = md5(time());
            file_put_contents("seguridad.txt",$hash);
            setcookie("seguridad",$hash,time()+900, '/');
            unset($_SESSION["error"]);
            header("location:../index.php");
            exit();
        }

    }else{
        $_SESSION["error"]="constraseña";
        setcookie("seguridad",0,time()-900);
        header("location:../index.php");
        exit();

    }

}else{
    header('location:../index.php?error=1');
    unset($_SESSION["error"]);
}

?>