<?php
session_start();
ob_start();
include_once "conn.php";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Coleta o código de redefinição de senha fornecido pelo usuário
  $resetCode = $_POST['reset_senha'];
  
  // Verifica se o código de redefinição de senha existe no banco de dados
  $stmt = $conn->prepare('SELECT id FROM usuarios WHERE reset_senha = :reset_senha');
  $stmt->execute(['reset_senha' => $resetCode]);
  $user = $stmt->fetch();
  header('Location: nova_senha.php');
}else{
   // Redireciona o usuário para a página de login
   header('Location: recuperar.php');
   $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Codigo errado!</div>";
 exit;
}
  
?>