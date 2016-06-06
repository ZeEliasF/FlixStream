<!DOCTYPE html>
<?php
session_start();
if(empty($_SESSION['nomeUsuario'])){
    session_destroy();
}
?>

<html>
    <head>
        <title>Flixtream</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilo.css"/>
        <link rel="stylesheet" href="css/estilo-inicio.css"/>
        <script type="text/javascript" src="JavaScript/inicio.js"></script>
        <script type="text/javascript" src="JavaScript/jquery-2.2.3.min.js"></script>
    </head>
    <body <?php
    if (session_status() == PHP_SESSION_NONE) {
        echo "onload='exibeCapas()' onresize='exibeCapas()'";
    }
    ?>>
            <?php
            if (session_status() == PHP_SESSION_ACTIVE) {
                include './View/home.php';
            } else {
                include './View/inicio.php';
            }
            ?>
    </body>
</html>
