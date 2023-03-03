<?php
session_start();
ob_start();
include_once "conn.php";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta o endereço de e-mail do usuário
    $email = $_POST['email'];
    
    // Verifica se o endereço de e-mail existe no banco de dados
    $stmt = $conn->prepare('SELECT id FROM usuarios WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();
    
    // Se o endereço de e-mail existir, gera um código de redefinição de senha aleatório e insere-o no banco de dados
    if ($user) {
        $resetCode = bin2hex(random_bytes(16));
        $stmt = $conn->prepare('UPDATE usuarios SET reset_SENHA = :reset_senha WHERE id = :id');
        $stmt->execute(['reset_senha' => $resetCode, 'id' => $user['id']]);
        
        // Envia um e-mail para o endereço fornecido com o código de redefinição de senha e instruções para redefinir a senha
        $to = $email;
        $subject = 'Recuperação de senha';
        $message = "Para redefinir sua senha, visite a página de redefinição de senha e insira o código a seguir: $resetCode";
        $headers = 'From: nivel@localhost' . "\r\n" .
            'Reply-To: nivel@localhost' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        mail($to, $subject, $message, $headers);
        
        // Redireciona o usuário para a tela de inserção de código de redefinição de senha
        header('Location: codigo_rest.php');
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Um e-mail foi enviado para o seu endereço de e-mail!</div>";
    exit();
  
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Email nao econtrado!</div>";
    exit();
    }
}

?>
<!DOCTYPE html>
<head>
    <title>Niveis de Acesso</title>

    <?php
        include_once "links_head.php";


    ?>

</head>

<body>
    <div class="container border col ">

        <form action="" method="post">

                <div  class="row-md-12 titulo d-flex justify-content-center">
                <h2>Recuperar a Senha!</h2>
                </div>

                <?php
                 include_once "erro.php";
                ?>

                <div class="input-grup row-md-12  mb-2 d-flex justify-content-center">
                    <label for="email">
                        E-Mail:
                            <input type="email" name="email" id="email" class="form-control">
                    </label>
                </div>

                <div class="input-grup row-md-12  mb-3 d-grid gap-3 col-3 mx-auto ">
                    <input type="submit" value="Enviar" id="enviar" name="enviar" class="btn btn-success btn-sm form-control ">
                </div>

        </form>

        <div class="back1">
            <input type="button" value="Voltar" onClick="JavaScript: window.history.back();" class="btn btn-secondary btn-sm" >
        </div>

    </div>


    <?php
        include_once "links_footer.php";
    ?>
</body>