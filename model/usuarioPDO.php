<?php
    class usuarioPDO implements UsuarioDB{
        //Función que permite validar el Login de un usuario
        public static function validarUsuario($codUsuario, $password){
            $oUsuario=null;
            
            $sql="SELECT * FROM Usuario where CodUsuario=? and Password=?";
            $encriptarPassword=hash("sha256", ($codUsuario.$password));
            $resultado= DBPDO::consultaSQL($sql, [$codUsuario, $encriptarPassword]);
            
            if($resultado->rowCount()>0){
                $usuarioConsulta = $resultado->fetchObject();
                $oUsuario = new usuario($usuarioConsulta->CodUsuario, 
                                        $usuarioConsulta->Password, 
                                        $usuarioConsulta->DescUsuario, 
                                        $usuarioConsulta->NumConexiones+1, 
                                        $usuarioConsulta->FechaHoraUltimaConexion, 
                                        $usuarioConsulta->Perfil);
                
                date_default_timezone_set('Europe/Madrid');                 
                //Se actualiza la última conexión registrada en la base de datos
                $sql = "UPDATE Usuario SET NumConexiones=NumConexiones+1, FechaHoraUltimaConexion=? WHERE CodUsuario=?";

                DBPDO::consultaSQL($sql, [time(), $codUsuario]);
            }
            
            return $oUsuario;
        }
        
        //Función que permite dar de alta un usuario
        public static function altaUsuario($codUsuario, $password, $descUsuario){
            $oUsuario=null;
            
            $sql="INSERT INTO Usuario (CodUsuario, Password, DescUsuario, NumConexiones, FechaHoraUltimaConexion) values (?,?,?,1,?)";
            $resultado=DBPDO::consultaSQL($sql, [$codUsuario, $password, $descUsuario, time()]);
            
            $sql = "SELECT * FROM Usuario WHERE CodUsuario=?";
            $consulta = DBPDO::consultaSQL($sql, [$codUsuario]);
            
            if($consulta->rowCount()>0){
                $usuarioConsulta = $consulta->fetchObject();
                $oUsuario = new usuario($usuarioConsulta->CodUsuario, 
                                        $usuarioConsulta->Password, 
                                        $usuarioConsulta->DescUsuario, 
                                        $usuarioConsulta->NumConexiones, 
                                        $usuarioConsulta->FechaHoraUltimaConexion, 
                                        $usuarioConsulta->Perfil);
            }
            return $oUsuario;
        }
        
        //Función que permite comprobar si ya existe un usuario con el codUsuario introducido
        public static function validarCodNoExiste($codUsuario){
            $error = "";
            $sql = "SELECT CodUsuario FROM Usuario WHERE CodUsuario=?";
            $consulta = DBPDO::consultaSQL($sql, [$codUsuario]);

            $registro = $consulta->fetchObject();
            if($registro != null){
                $error = "El código introducido no está disponible";
            }
            
            return $error;
        }
    }
?>