<?php
session_start();
ob_start();
include_once "conn.php";


// Verifica se o usuário está logado
if (!isset($_SESSION["usuario"])) {
  // Redireciona para o login
  header("Location: index.php");
  exit();
}

// Verifica o nível de acesso do usuário
$nivel = $_SESSION["nivel"];



if((!isset($_SESSION['id'])) AND (!isset($_SESSION['usuario']))){

header("Location: index.php");

$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Sessão nao encontrada!</div>";

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
                <h2>Area dos Usuarios</h2>
                </div>

                <?php

                  include_once "erro.php";

                // Exibe conteúdo diferente de acordo com o nível de acesso
                switch ($nivel) {
                  
                  case 1:
                    echo '<p>Bem-vindo, <span class="user text-uppercase">' . $_SESSION['usuario'] . '</span> com nível 1!</p><br>';
                    
                    break;

                  case 2:
                    echo '<p>Bem-vindo, <span class="user text-uppercase">' . $_SESSION['usuario'] . '</span> com nível 2!</p>';
                    break;

                  default:
                    echo "Erro: nível de acesso inválido.";
                    break;
                    
                };

                
                ?> 

    <?php
        include_once "links_footer.php";
    ?>
</body>