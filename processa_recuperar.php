<?php
session_start();
ob_start();
include_once "conn.php";// arquivo que contém as informações de conexão ao banco de dados



// Obtém o endereço de e-mail fornecido pelo usuário
$email = $_POST['email'];

// Verifica se o endereço de e-mail está associado a uma conta de usuário
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
$stmt->execute(array(':email' => $email));
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
  // Se o endereço de e-mail não estiver associado a uma conta de usuário, exibe uma mensagem de erro
  header("Location: recuperar.php.php");
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Email nao econtrado!</div>";
    exit();
} else {
  // Se o endereço de e-mail estiver associado a uma conta de usuário, gera um código de redefinição de senha exclusivo e o armazena na tabela de usuários
  $reset_token = bin2hex(random_bytes(16));
  $reset_token_expires_at = date('Y-m-d H:i:s', strtotime('+1 day'));
  $stmt = $conn->prepare("UPDATE usuarios SET reset_senha = :reset_senha, reset_data = :reset_data WHERE id = :id");
  $stmt->bindParam(':reset_senha', $reset_token);
  $stmt->bindParam(':reset_data', $reset_token_expires_at);
  $stmt->bindParam(':id', $user['id']);
  $stmt->execute();

  // Envia um e-mail para o endereço de e-mail do usuário contendo um link que aponta para a página de redefinição de senha
  $reset_url = "http://localhost/login/codigo_reset.php?token=" . $reset_token;
  $to = $email;
  $subject = "Recuperação de senha";
  $message = "Para redefinir sua senha, clique no seguinte link: " . $reset_url;
  $headers = "From: webmaster@localhost";
  mail($to, $subject, $message, $headers);

  // Exibe uma mensagem informando ao usuário que um e-mail foi enviado com instruções sobre como redefinir a senha
  header("Location: index.php");
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Um e-mail foi enviado para o seu endereço de e-mail com instruções sobre como redefinir sua senha</div>";
    exit();
}
?>