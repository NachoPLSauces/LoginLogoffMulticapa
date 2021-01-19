<?php
    //Se inicia o recupera la sesión
    session_start();
    
    //Llamada a los ficheros de configuración
    require_once 'config/confDB.php';
    require_once 'config/config.php';

    //Se dirige al usuario al inicio o al login, dependiendo de si se a autentificado correctamente o no
    if(isset($_SESSION["usuarioDAW202LoginLogoffMulticapa"])){
        require_once $controladores[$_SESSION['controlador']];
    }else{
        require_once $controladores["login"];
    }
?>