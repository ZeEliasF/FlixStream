<?php

require_once 'Consulta.php';

class Titulo {

    private $idTitulo;
    private $nomeTitulo;
    private $sinopseTitulo;
    private $capaTitulo;
    
    function getIdTitulo() {
        return $this->idTitulo;
    }

    function getNomeTitulo() {
        return $this->nomeTitulo;
    }

    function getSinopseTitulo() {
        return $this->sinopseTitulo;
    }

    function getCapaTitulo() {
        return $this->capaTitulo;
    }

    function setIdTitulo($idTitulo) {
        $this->idTitulo = $idTitulo;
    }

    function setNomeTitulo($nomeTitulo) {
        $this->nomeTitulo = $nomeTitulo;
    }

    function setSinopseTitulo($sinopseTitulo) {
        $this->sinopseTitulo = $sinopseTitulo;
    }

    function setCapaTitulo($capaTitulo) {
        $this->capaTitulo = $capaTitulo;
    }

    static function aleatorizarCapas($quantidade) {
        $c = new Consulta("SELECT capaTitulo FROM titulo ORDER BY RAND() LIMIT " . $quantidade);

        $resultado = $c->executaConsulta();

        if ($resultado->rowCount()) {
            return $resultado;
        }
    }

}
