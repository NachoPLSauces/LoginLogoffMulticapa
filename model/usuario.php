<?php
    class usuario{
        private $codUsuario;
        private $password;
        private $descUsuario;
        private $numConexiones;
        private $fechaHoraUltimaConexion;
        private $perfil;
        
        //Se crea el constructor de la clase usuario
        function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $perfil){
            $this->codUsuario=$codUsuario;
            $this->password=$password;
            $this->descUsuario=$descUsuario;
            $this->numConexiones=$numConexiones;
            $this->fechaHoraUltimaConexion=$fechaHoraUltimaConexion;
            $this->perfil=$perfil;
        }
        // Creamos los métodos get que devuelven el valor de cada atributo.
        function getCodUsuario(){
            return $this->codUsuario;
        }
        function getPassword(){
            return $this->password;
        }
        function getDescUsuario(){
            return $this->descUsuario;
        }
        function getNumConexiones(){
            return $this->numConexiones;
        }
        function getFechaHoraUltimaConexion(){
            return $this->fechaHoraUltimaConexion;
        }
        function getPerfil(){
            return $this->perfil;
        }
        // Creamos los métodos set que permiten modificar el valor de un atributo.
        function setCodUsuario($codUsuario){
           $this->codUsuario=$codUsuario; 
        }
        function setPassword($password){
            $this->password=$password;
        }
        function setDescUsuario($descUsuario){
            $this->descUsuario=$descUsuario;
        }
        function setNumConexiones($numConexiones){
            $this->numConexiones=$numConexiones;
        }
        function setFechaHoraUltimaConexion($fechaHoraUltimaConexion){
            $this->fechaHoraUltimaConexion=$fechaHoraUltimaConexion;
        }
        function setPerfil($perfil){
            $this->perfil=$perfil;
        }
    }
?>