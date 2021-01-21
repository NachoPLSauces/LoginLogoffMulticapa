<?php
    //Llamada a la librería de validación
    require_once 'core/libreriaValidacion.php';
    
    //Se incluye la lógica del modelo
    require_once 'model/dbPDO.php';
    require_once 'model/usuario.php';
    require_once 'model/usuarioPDO.php';
    
    //Creamos un array que contiene las rutas de los archivos del controlador
    $controladores=["login" => "controller/cLogin.php",
                    "inicio" => "controller/cInicio.php",
                    "registro" => "controller/cRegistro.php"];
    
    //Creamos un array que contiene las rutas de los archivos de la vista
    $vistas=["login" => "view/vLogin.php",
            "inicio" => "view/vInicio.php",
            "registro" => "view/vRegistro.php",
            "layout" => "view/layout.php"];
?>