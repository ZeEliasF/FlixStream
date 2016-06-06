<?php

require_once 'Conexao.php';

class Consulta {

    private $query;

    function __construct($query) {
        $this->query = $query;
    }

    function getQuery() {
        return $this->query;
    }

    function setQuery($query) {
        $this->query = $query;
    }

    public function executaConsulta() {
        try {
            $c = new Conexao();

            $con = $c->open();

            $resultado = $con->query($this->query);

            $con = NULL;
            $c->close();

            return $resultado;
        } catch (PDOException $e) {
             echo "<h3>ERRO! " . $e->getMessage() . "</h3>";
        }
    }

}
