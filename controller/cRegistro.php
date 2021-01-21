<?php
if(isset($_REQUEST['cancelar'])){
    $_SESSION['paginaEnCurso'] = $controladores['login'];
    header("Location: index.php");
    exit;
}

//Variable obligatorio inicializada a 1
define("OBLIGATORIO", 1);

//Varible de entrada correcta inicializada a true
$entradaOK = true;       

//Array de errores inicializado a null
$aErrores = ["usuario" => null,
             "descripcion" => null,
             "password" => null];   

//Array de respuestas inicializado a null
$aRespuestas = ["usuario" => null,
                "descripcion" => null,
                "password" => null];

if(isset($_REQUEST['enviar'])){
    //Comprobar que el campo nombre se ha rellenado con alfabéticos
    $aErrores["usuario"] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 15, 3, OBLIGATORIO);
    
    if($aErrores["usuario"] == null){
        //Realizamos una consulta
        $sql = "SELECT CodUsuario FROM Usuario WHERE CodUsuario=?";
        $codUsuario = $_REQUEST['usuario'];
        $consulta = DB::consultaSQL($sql, [$codUsuario]);

        $registro = $consulta->fetchObject();
        if($registro != null){
            $aErrores['usuario'] = "El nombre introducido está en uso";
        }
    }  
        
    //Comprobar que el campo apellido1 se ha rellenado con alfabéticos
    $aErrores["descripcion"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 200, 1, OBLIGATORIO);
    //Comprobar que el campo apellido2 se ha rellenado con alfabéticos
    $aErrores["password"] = validacionFormularios::validarPassword($_REQUEST['password'], 16, 2, 3, OBLIGATORIO);
    
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
    $aRespuestas = ["usuario" => $_REQUEST['usuario'],
                    "descripcion" => $_REQUEST['descripcion'],
                    "password" => $_REQUEST['password']];

    $codUsuario = $aRespuestas['usuario'];
    $descUsuario = $aRespuestas['descripcion'];
    $password = hash("sha256",$codUsuario.$aRespuestas['password']);
    $oUsuario = usuarioPDO::altaUsuario($codUsuario, $password, $descUsuario);

    //Se guarda el código del usuario para comprobar si el usuario ha pasado por el Login al visualizar las demás páginas 
    $_SESSION['usuarioDAW202LoginLogoffMulticapa'] = $oUsuario;    
    $_SESSION['fechaHoraUltimaConexionAnterior'] = null;
    
    //Se dirige al usuario al inicio
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: index.php');
    exit;
}

//Incluimos la lógica de la vista
$vista = $vistas['registro'];
require_once $vistas['layout'];
?>