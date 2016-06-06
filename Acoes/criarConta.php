<?php

require_once '../Controller/UsuarioController.php';

$u = new Usuario();
$u->setNomeUsuario($_POST['nomeUsuario']);
$u->setEmailUsuario($_POST['emailUsuario']);
$u->setLoginUsuario($_POST['loginUsuario']);
$u->setSenhaUsuario($_POST['senhaUsuario']);

$uc = new UsuarioController();
$uc->setUsuario($u);
if ($uc->cadastrarUsuario()) {
    echo "<script>window.alert('Usuário cadastrado com sucesso! =D');</script>";
} else {
    echo "<script>window.alert('Falha ao cadastrar. =/')</script>";
}
echo "<script>window.location = '../index.php';</script>";
