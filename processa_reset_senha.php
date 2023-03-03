<?php
session_start();
require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Verifica se as senhas coincidem
  if ($_POST['senha'] !== $_POST['confirma_senha']) {
      die('As senhas não coincidem.');
  }
  
// Verifica se o código de redefinição de senha é válido
$resetCode = $_POST['senha'];
$stmt = $conn->prepare('SELECT * FROM usuarios WHERE reset_senha = :reset_senha');
$stmt->execute(['reset_senha' => $resetCode]);
$user = $stmt->fetch();
if (!$user) {
    die('Código de redefinição de senha inválido.');
}

// Criptografa a nova senha
$senha = $_POST['senha'];
$hashedPassword = password_hash($senha, PASSWORD_DEFAULT);

// Atualiza a senha do usuário no banco de dados
$stmt = $conn->prepare('UPDATE usuarios SET senha = :senha, reset_senha = NULL WHERE id = :id');
$stmt->execute(['senha' => $hashedPassword, 'id' => $user['id']]);

// Redireciona para a página de login
header('Location: index.php');
exit;
}