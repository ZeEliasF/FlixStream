<?php

include_once '../Model/Usuario.php';
@include_once 'Model/Usuario.php';
class UsuarioController {
    private $usuario;
    
    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    
    function cadastrarUsuario(){
        if($this->usuario->cadastrarUsuario()){
            return true;
        } else {
            return false;
        }
    }
    
    function realizarLogin($login,$senha){
        $resultado = $this->usuario->realizarLogin($login,$senha);
        
        if($resultado != NULL){
            foreach ($resultado as $row){
                $this->usuario->setNomeUsuario($row['nomeUsuario']);
                $this->usuario->setEmailUsuario($row['emailUsuario']);
            }
            return true;
        } else{
            return false;
        }
    }
}
