<?php


class trocaURL {
    public $url;
    
    public function __construct() {
        if (empty($_GET['pagina'])){
            $this->url = "paginas/home.php";
        } else {
            $this->url = "paginas/".$_GET["pagina"].".php";
        }
    }
}
