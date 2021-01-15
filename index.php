<?php
    //Se inicia o recupera la sesión
    session_start();
    
    //Llamada a los ficheros de configuración
    require_once 'config/config.php';
    require_once 'config/confDB.php';

    //Se dirige al usuario al inicio o al login, dependiendo de si se a autentificado correctamente o no
    if(isset($_SESSION["usuarioDAW203LoginLogoffMulticapa"])){
        require_once $controlador["inicio"];
    }else{
        require_once $controlador["login"];
    }
?>

