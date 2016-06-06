<?php

require_once 'Consulta.php';
require_once 'SQL/SQL.php';

class Usuario {

    private $idUsuario;
    private $nomeUsuario;
    private $emailUsuario;
    private $loginUsuario;
    private $senhaUsuario;

    function __construct($idUsuario, $nomeUsuario, $emailUsuario, $loginUsuario, $senhaUsuario) {
        $this->idUsuario = $idUsuario;
        $this->nomeUsuario = $nomeUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->loginUsuario = $loginUsuario;
        $this->senhaUsuario = $senhaUsuario;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getEmailUsuario() {
        return $this->emailUsuario;
    }

    function getLoginUsuario() {
        return $this->loginUsuario;
    }

    function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    function setLoginUsuario($loginUsuario) {
        $this->loginUsuario = $loginUsuario;
    }

    function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    function cadastrarUsuario() {
        $sql = new SQL("usuario");
        $sql->addColuna("nomeUsuario", $this->nomeUsuario);
        $sql->addColuna("emailUsuario", $this->emailUsuario);
        $sql->addColuna("loginUsuario", $this->loginUsuario);
        $sql->addColuna("senhaUsuario", $this->senhaUsuario);
        $sql->insert();
        
        $c = new Consulta($sql->getCodigo());
        if($c->executaConsulta()){
            return true;
        } else {
            return false;
        }
    }

}
