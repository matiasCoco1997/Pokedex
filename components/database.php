<?php
//Establecer parametros para la conexion a la base de datos
$serverName = "localhost";
$username = "root";
$password = "";
$database = "pokedex_Grupo3";

$conexion = mysqli_connect($serverName, $username, $password);

// Verificar si la conexión es exitosa
if (!$conexion) {
    var_dump($conexion);
    die("La conexión falló: " . mysqli_connect_error());
};
$existeBaseDeDatos = mysqli_connect($serverName, $username, $password,$database);
if(!$existeBaseDeDatos){
        $sql = "CREATE DATABASE IF NOT EXISTS `pokedex_Grupo3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";

    // Ejecutar la consulta y obtener los resultados
        $resultado = $conexion->query($sql);


        $conexion = mysqli_connect($serverName, $username, $password, $database);

        $sql = "CREATE TABLE IF NOT EXISTS `pokemones` (
    `IDPokemon` int(11) NOT NULL,
    `nombre` varchar(20) NOT NULL,
    `numero` int(5) NOT NULL,
    `imagen` varchar(500) NOT NULL,
    `tipo` varchar(300) NOT NULL,
    `isEnabled` int(1) NOT NULL DEFAULT '1',
    `descripcion` text NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $resultado = $conexion->query($sql);

        $sql = "INSERT INTO `pokemones` (`IDPokemon`, `nombre`, `numero`, `imagen`, `tipo`, `isEnabled`, `descripcion`) VALUES
    (6, 'charmander', 10, '../../Pokedex/src/images/charmander.png', '../../Pokedex/src/images/Tipo_fuego.png', 1, 'descripción 1\r\n'),
    (7, 'charmander3', 333, '../../Pokedex/src/images/charmander.png', '../../Pokedex/src/images/Tipo_fuego.png', 0, 'descripcion 2\r\n'),
    (8, 'dasda', 111, '../../Pokedex/src/images/ContenedorCapsa1.jpg', '../../Pokedex/src/images/Tipo_fuego.png', 1, 'adadsdsa');";

        $resultado = $conexion->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS `usuarios` (
    `id_usuario` int(10) NOT NULL,
    `nombre` varchar(100) NOT NULL,
    `nombreUsuario` varchar(100) NOT NULL,
    `contrasenia` varchar(300) NOT NULL,
    `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $resultado = $conexion->query($sql);

        $sql = "INSERT INTO `usuarios` (`id_usuario`, `nombre`, `nombreUsuario`, `contrasenia`, `isAdmin`) VALUES
    (3, 'Administrador', 'administrador', 'e10adc3949ba59abbe56e057f20f883e', 1),
    (4, 'Juan', 'usuario', 'c33367701511b4f6020ec61ded352059', 0);";

        $resultado = $conexion->query($sql);

        $sql = "ALTER TABLE `pokemones`
    ADD PRIMARY KEY (`IDPokemon`);";

        $resultado = $conexion->query($sql);


        $sql = "ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`id_usuario`);";

        $resultado = $conexion->query($sql);


        $sql = "ALTER TABLE `pokemones`
        MODIFY `IDPokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;";

        $resultado = $conexion->query($sql);

        $sql = "ALTER TABLE `usuarios`
    MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;";

        $resultado = $conexion->query($sql);
}

?>
