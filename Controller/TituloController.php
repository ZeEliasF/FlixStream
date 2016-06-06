<?php

@include_once 'Model/Titulo.php';
@include_once '/../Model/Titulo.php';

class TituloController {

    private $titulo;

    function __construct($titulo) {
        $this->titulo = $titulo;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    static function aleatorizarCapas($quantidade){
        $capas = Titulo::aleatorizarCapas($quantidade);
        
        $retorno = array();
        
        foreach($capas as $row){
            array_push($retorno, $row['capaTitulo']);
        }
        
        return $retorno;
    }
}
