<?php
session_start();


if (!empty($_POST['btningresar'])) {
    if (!empty($_POST['usuario']) and !empty($_POST['password'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        // echo "Datos campos {$usuario} {$password}";
        $sql = $conexion -> query("SELECT * FROM usuario where usuario = '$usuario' and clave = '$password';");
    if ($datos =$sql -> fetch_object()) {
        $_SESSION["id"] = $datos->id;
        $_SESSION['nombre'] = $datos ->nombres;
        $_SESSION['apellido'] = $datos -> apellidos;
        header("location: inicio.php");
    } else {
    echo "<div class = 'alert alert-danger'>Acceso denegado</div>";    
    }
    
    
    } else {
        echo "Campos vacios";
    }
}
