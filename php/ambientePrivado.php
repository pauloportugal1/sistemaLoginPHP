<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: ../index.html");
        exit;
    }
?>

Seja bem vindo!
<a href="sair.php">Sair</a>
