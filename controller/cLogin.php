<?php
//Comprobamos si el usuario ha elegido crear una cuenta
if(isset($_REQUEST['crear'])){
    $_SESSION['paginaEnCurso'] = $controladores['registro'];
    header("Location: index.php");
    exit;
}

$error = ""; //Variable para almacenar los errores

//Comprobamos si se ha enviado el formulario
if(isset($_REQUEST['enviar'])){
    if($_REQUEST['usuario'] == null || $_REQUEST['password'] == null){
        $error = "Debes introducir un usuario y una contraseña";
    }
    else{
        $oUsuario = usuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['password']); //Se comprueba si existe el usuario
            
        if($oUsuario){
            //Establecemos como zona horaria la de Madrid
            date_default_timezone_set('Europe/Madrid'); 
            //Se guarda la última conexión
            $ultimaConexion = $oUsuario->FechaHoraUltimaConexion; 

            //Se actualiza la última conexión registrada en la base de datos
            $sql = "UPDATE Usuario SET NumConexiones=NumConexiones+1, FechaHoraUltimaConexion=? WHERE CodUsuario=?";
            
            $fechaHoraUltimaConexion = time();
            $codUsuario = $_REQUEST['usuario'];
            
            $consulta = DB::consultaSQL($sql, [$fechaHoraUltimaConexion, $codUsuario]);

            //Se guarda el usuario para comprobar si el usuario ha pasado por el Login al visualizar las demás páginas 
            $_SESSION['usuarioDAW202LoginLogoffMulticapa'] = $oUsuario;    

            //Si no es la primera vez que el usuario se conecta, se guarda la última conexión
            if($ultimaConexion != null){
                $_SESSION['fechaHoraUltimaConexionAnterior'] = $ultimaConexion;
            }  
            
            //Se dirige al usuario al inicio
            $_SESSION['paginaEnCurso'] = $controladores['inicio'];
            header('Location: index.php');
            exit;
        }
    }
}

//Si el usuario no existe se carga el Login
$vista = $vistas['login'];
require_once $vistas['layout'];
?>