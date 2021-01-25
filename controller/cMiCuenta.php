<?php
if(!isset($_SESSION["usuarioDAW202LoginLogoffMulticapa"])){
    header('Location: ./index.php'); 
    exit;
}

//Si el usuario pulsa cancelar le dirijo al inicio
if(isset($_REQUEST['cancelar'])){
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header("Location: index.php");
    exit;
}
            
//Array de errores inicializado a null
$aErrores = ["descripcion" => null];

//Variable obligatorio inicializada a 1
define("OBLIGATORIO", 1);

//Varible de entrada correcta inicializada a true
$entradaOK = true;           

//Array de respuestas inicializado a null
$aRespuestas = ["descripcion" => null];

if(isset($_REQUEST['editar'])){
    //Comprobar que el campo descripción se ha rellenado con alfanuméricos
    $aErrores["descripcion"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 200, 1, OBLIGATORIO);
    
    //Comprobar si algún campo del array de errores ha sido rellenado
    foreach ($aErrores as $clave => $valor) {
        //Comprobar si el campo ha sido rellenado
        if($valor!=null){
            $_REQUEST[$clave] = "";
            $entradaOK = false;
        }
    }

}
else{
    $entradaOK = false;
}

if($entradaOK){
    //Si los datos han sido introducidos correctamente
    $aRespuestas = ["descripcion" => $_REQUEST['descripcion']];

    $oUsuario = usuarioPDO::modificarUsuario($aRespuestas["descripcion"], $_REQUEST["usuario"]);

    //Se guarda el usuario con los campos actualizados 
    $_SESSION['usuarioDAW202LoginLogoffMulticapa'] = $oUsuario;
    
    //Se dirige al usuario al inicio
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: ./index.php'); 
    exit;
}

//Incluimos la lógica de la vista
$vista = $vistas['editar'];
require_once $vistas['layout'];
?>