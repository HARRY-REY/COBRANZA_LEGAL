<?php
    session_start();
    include('php/conexion_be.php');

    if(!isset($_SESSION['usuario']))
    {
        echo'
            <script>
                alert("Debe usted iniciar sesión");
                window.location="index.php";
            </script>';
            //header("location:index.php");
            session_destroy();
            die();
    }
            //session_destroy();
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT correo, nombre_completo FROM usuarios WHERE correo='$usuario' ";
    $resultado = $conexion -> query($sql);
    $row = $resultado -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <h1>¡Bienvenido
    <?php 
        echo utf8_decode($row['nombre_completo']);
    ?>!</h1>
    <a href="php/cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>