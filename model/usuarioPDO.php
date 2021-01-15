<?php
    class usuarioPDO{
        //Función que permite validar el Login de un usuario
        public static function validarUsuario($codUsuario, $password){
            $oUsuario=null;
            
            $sql="SELECT * FROM Usuario where CodUsuario=? and Password=?";
            $encriptarPassword=hash("sha256", ($codUsuario.$password));
            $resultado=DB::consultaSQL($sql, [$codUsuario, $encriptarPassword]);
            
            if($resultado->rowCount()>0){
                $oUsuario=$resultado->fetchObject();
            }
            return $oUsuario;
        }
        
        //Función que permite dar de alta un usuario
        public static function altaUsuario($codUsuario, $password, $descUsuario){
            $oUsuario=null;
            
            $sql="INSERT INTO Usuario (CodUsuario, Password, DescUsuario, NumConexiones, FechaHoraUltimaConexion) values (?,?,?,1,?)";
            $resultado=DB::consultaSQL($sql, [$codUsuario, $password, $descUsuario, time()]);
            
            if($resultado->rowCount()>0){
                $oUsuario=$resultado->fetchObject();
            }
            return $oUsuario;
        }
    }
?>