<?php

require_once 'Coluna.php';

class SQL {

    private $tabela;
    private $colunas;
    private $codigo;

    function __construct($tabela) {
        $this->tabela = $tabela;
        $this->colunas = new ArrayObject();
    }

    function addColuna($nome, $conteudo) {
        array_push($this->colunas, new Coluna($nome, $conteudo));
    }

    function getCodigo() {
        return $this->codigo;
    }

    function insert() {
        $this->codigo = "";
        $this->codigo = "INSERT INTO " . $this->tabela . "(";
        $i = 0;
        foreach ($this->colunas as $coluna) {
            if ($i > 0) {
                $this->codigo.= ",";
            }
            $this->codigo.=$coluna->nome;
            $i++;
        }
        $this->codigo.= ") VALUES (";
        $i = 0;
        foreach ($this->colunas as $coluna) {
            if ($i > 0) {
                $this->codigo.= ",";
            }
            $this->codigo.=$coluna->conteudo;
            $i++;
        }
        $this->codigo.= ")";
    }

    function select() {
        $this->codigo = "";
        if (count($this->colunas) > 0) {
            $i = 0;
            $this->codigo = "SELECT ";
            foreach ($this->colunas as $coluna) {
                if ($i > 0) {
                    $this->codigo.=",";
                }
                $this->codigo.=$coluna->nome;
            }
            $this->codigo = " FROM ".$this->tabela;
        } else {
            $this->codigo = "SELECT * FROM ".$this->tabela;
        }
    }
}