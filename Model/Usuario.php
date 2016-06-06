<?php

include_once 'Consulta.php';

class Usuario {

    private $idUsuario;
    private $nomeUsuario;
    private $emailUsuario;
    private $loginUsuario;
    private $senhaUsuario;

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
        $sql = "INSERT INTO usuario(nomeUsuario,emailUsuario,loginUsuario,senhaUsuario)";
        $sql .= "VALUES('";
        $sql .= $this->nomeUsuario . "','";
        $sql .= $this->emailUsuario . "','";
        $sql .= $this->loginUsuario . "','";
        $sql .= md5($this->senhaUsuario) . "')";

        $c = new Consulta($sql);
        if ($c->executaConsulta()) {
            return true;
        } else {
            return false;
        }
    }

    function realizarLogin($login, $senha) {

        $sql = "SELECT nomeUsuario,emailUsuario FROM usuario ";
        $sql .= "WHERE loginUsuario = '" . $login . "' ";
        $sql .= "AND senhaUsuario = '" . md5($senha) . "'";
        
        echo $sql;
        $c = new Consulta($sql);

        $retorno = $c->executaConsulta();
        if ($retorno->rowCount()>0){
            return $retorno;
        } else {
            $sql = "SELECT nomeUsuario,emailUsuario FROM usuario ";
            $sql .= "WHERE emailUsuario = '" . $login . "' ";
            $sql .= "AND senhaUsuario = '" . md5($senha) . "'";

            echo $sql;
            $c->setQuery($sql);
            $retorno = $c->executaConsulta();
            if ($retorno->rowCount()>0) {
                return $retorno;
            } else {
                return NULL;
            }
        }
    }
}
