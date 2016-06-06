<?php

require_once '../Controller/TituloController.php';

$capas = TituloController::aleatorizarCapas($_REQUEST['qtd']);
echo json_encode($capas);