<?php
if(!isset($_SESSION["usuarioDAW202LoginLogoffMulticapa"])){
    header('Location: ./index.php'); 
    exit;
}


//Si el usuario pulsa "Salir" se le dirige al Login
if (isset($_REQUEST['salir'])) { 
    session_destroy();
    $_SESSION['paginaEnCurso'] = $controladores['login'];
    header('Location: ./index.php'); 
    exit;
} 

//Variables que guardan información del usuario
$descripcionUsuario = $_SESSION["usuarioDAW202LoginLogoffMulticapa"]->getDescUsuario();
$numConexiones = $_SESSION["usuarioDAW202LoginLogoffMulticapa"]->getNumConexiones();

//Incluimos la lógica de la vista
$vista = $vistas['inicio'];
require_once $vistas['layout'];
?>