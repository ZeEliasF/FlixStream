<?php

require_once '../Controller/UsuarioController.php';

$u = new Usuario();
$uc = new UsuarioController();
$uc->setUsuario($u);

if($uc->realizarLogin($_POST['loginUsuario'], $_POST['senhaUsuario'])){
    session_start();
    $_SESSION['nomeUsuario'] = $uc->getUsuario()->getNomeUsuario();
    $_SESSION['emailUsuario'] = $uc->getUsuario()->getEmailUsuario();
    echo "<script>window.location = '../index.php'</script>";
} else {
    echo "<script>window.alert('Login ou senha incorretos. =(');</script>";
    echo "<script>window.location = '../index.php'</script>";
}
