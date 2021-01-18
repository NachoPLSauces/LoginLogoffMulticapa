<?php
//Se comprueba que el usuario se haya autentificado, en caso negativo, se le dirige al Login
if(!isset($_SESSION["usuarioDAW202LoginLogoffMulticapa"])){
    header("Location: ./index.php");
    exit;
}
//Si el usuario pulsa "Salir" se le dirige al Login
if (isset($_REQUEST['salir'])) { 
    session_destroy();
    header('Location: ./index.php'); 
    exit;
} 

//Variables que guardan información del usuario
$descripcionUsuario = $_SESSION["usuarioDAW202LoginLogoffMulticapa"]->DescUsuario;
$numConexiones = $_SESSION["usuarioDAW202LoginLogoffMulticapa"]->NumConexiones;

//Incluimos la lógica de la vista
$vista = $vistas['inicio'];
require_once $vistas['layout'];
?> 
