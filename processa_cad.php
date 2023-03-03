<?php
session_start();
ob_start();
include_once "conn.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os valores do formulário
    $usuario = $_POST["usuario"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $email = $_POST["email"];
    $nivel = $_POST["nivel"];

    // Insere os valores no banco de dados
    $sql = "INSERT INTO usuarios (usuario, senha, email, nivel) VALUES (:usuario, :senha, :email, :nivel)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->bindParam(":senha", $senha);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":nivel", $nivel);
    $stmt->execute();

    // Redireciona para a página de login
    header("Location: index.php");
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>";
    exit();
        }else{
            header("Location: cadastro.php");
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possivel fazer o cadastro!</div>";
            exit();
            }
  ?>