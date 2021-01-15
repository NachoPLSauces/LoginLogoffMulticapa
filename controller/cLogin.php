<?php
   
    define("OBLIGATORIO", 1);
    
    $entradaOk=true; 
    
    //Se crea un array de errores inicializado a null
    $aErrores=["codUsuario" => null,
               "password" => null];
    
    //Si el usuario pulsa iniciar sesión, se comprueba si los campos han sido introducidos correctamente
    if(isset($_REQUEST["iniciarSesion"])){
        $aErrores["codUsuario"]= validacionFormularios::comprobarAlfaNumerico($_REQUEST["codUsuario"], 16, 3, OBLIGATORIO);
        $aErrores["password"] = validacionFormularios::validarPassword($_REQUEST["password"], 8, 1, 1, OBLIGATORIO);
    
        foreach($aErrores as $campo => $error){
            if($error!=null){
                $entradaOk=false;
                $_REQUEST[$campo]="";
            }
        }
    }else{
        $entradaOk=false;
    }
    
    //Si los campos han sido rellenados correctamente se comprueba que existe el usuario
    if($entradaOk){
        $usuario=$_REQUEST["codUsuario"];
        $password=$_REQUEST["password"];
        
        $oUsuario= usuarioPDO::validarUsuario($usuario, $password);
        
        if(isset($oUsuario)){
            $_SESSION["usuarioDAW203LoginLogoffMulticapa"]=$oUsuario;
            //usuarioPDO::actualizarUltimaConexion($oUsuario->T01_CodUsuario);
            header('Location: index.php');
            exit;
        }
    }
    
    $vista = $vistas['login'];
    require_once $vistas['layout'];
?>