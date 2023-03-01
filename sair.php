<?php
session_start();
ob_start();
unset($_SESSION['id'], $_SESSION['usuario'] );

$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Usuário deslogado com sucesso!</div>";

header("Location: index.php");
