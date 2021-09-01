<?php
    include 'conexion_be.php';

    $nombre_completo= $_POST['nombre_completo'];
    $correo= $_POST['correo'];
    $usuario= $_POST['usuario'];
    $contrasena= $_POST['contrasena'];
    // Encriptar contraseña
    $contrasena= hash('sha512', $contrasena);

    $querty = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
                VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    // Verificar que el correo no se repita
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0)
    {
        echo '
                <script>
                    alert("El correo ya está registrado");
                    window.location="../index.php";
                </script>
            ';
        exit();
        mysqli_close($conexion);
    }

    // Verificar que el usuario no se repita 
    $verificar_usuario= mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0)
    {
        echo '
                <script>
                    alert("El usuario ya está registrado");
                    window.location="../index.php";
                </script>
            ';
        exit();
        mysqli_close($conexion);
    }

    $ejecutar = mysqli_query($conexion, $querty);

    if($ejecutar)
    {
        echo '
            <script>
                alert("Usuario almacenado");
                window.location = "../index.php";
            </script>';
    }else
    {
        echo '
            <script>
                alert("Error al almacenar usuario, intente de nuevo");
                window.location = "../index.php";
            </script>';

    }
    mysqli_close($conexion);
?>