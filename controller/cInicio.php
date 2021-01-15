<?php
    //Si no se ha iniciado sesión se dirige al usuario al index
    if(!isset($_SESSION["usuarioDAW203LoginLogoffMulticapa"])){
        header("Location: index.php");
        exit;
    }
    //Si el usuario pulsa cerrar sesión, se finaliza la sesión y se le dirige al index
    if(isset($_REQUEST["cerrarSesion"])){
        session_destroy();
        header("Location: index.php");
        exit;
    }
    
    //Se almacenan en variables los campos de la tabla usuario
    $numConexiones = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->NumConexiones;
    $descUsuario = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->DescUsuario;
    $fechaHoraUltimaConexion = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->FechaHoraUltimaConexion;
    
    //Incluimos la lógica de la vista
    $vista = $vistas['inicio'];
    require_once $vistas['layout'];
?>