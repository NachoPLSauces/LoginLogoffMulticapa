<?php
    class DB{ //Creo una clase que se llama DB(DATA BASE).
        public static function consultaSQL($SQL, $parametros){ //Creo una función que se llama consultasSQL.
            try{
                $miDB = new PDO(DSN, USER, PASSWORD); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.
                
                $consulta=$miDB->prepare($SQL); //Preparamos la consulta SQL.
                $consulta->execute($parametros); //Ejecutamos la consulta pasando los parámetros.
            }catch(PDOException $miExcepcionPDO){
                echo "<p style='color:red;'>Error ".$miExcepcionPDO->getMessage()."</p>"; //Muestro el mensaje de la excepción de errores.
                echo "<p style='color:red;'>Código de error ".$miExcepcionPDO->getCode()."</p>"; //Muestro el código del error.
            }finally {
                unset($miDB); //Cierro la conexión a la base de datos.
            }
            return $consulta; //Devuelvo el resultado de la consulta.
        }
    }
?>

