<?php
if(!isset($_SESSION["usuarioDAW202LoginLogoffMulticapa"])){
    header('Location: ./index.php'); 
    exit;
}

//Si el usuario pulsa "CANCELAR" se le dirige al inicio
if (isset($_REQUEST['cancelar'])) { 
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: ./index.php'); 
    exit;
} 

//Si el usuario pulsa "BORRAR" se le dirige al login
if (isset($_REQUEST['borrar'])) { 
    usuarioPDO::borrarUsuario($_SESSION["usuarioDAW202LoginLogoffMulticapa"]->getCodUsuario());
    
    session_destroy();
    $_SESSION['paginaEnCurso'] = $controladores['login'];
    header('Location: ./index.php'); 
    exit;
} 

//Incluimos la lógica de la vista
$vista = $vistas['borrar'];
require_once $vistas['layout'];
?>