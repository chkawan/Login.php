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

// Exibe conteúdo diferente de acordo com o nível de acesso
switch ($nivel) {
  case 1:
    echo "<h1>Bem-vindo, usuário com nível 1!</h1>";
    break;
  case 2:
    echo "<h1>Bem-vindo, usuário com nível 2!</h1>";
    break;
  case 3:
    echo "<h1>Bem-vindo, usuário com nível 3!</h1>";
    break;
  default:
    echo "Erro: nível de acesso inválido.";
    break;
}

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
                <h2>Bem-vindo <?php echo $_SESSION['usuario']; ?>!</h2>
                </div>

                <br><br>


                
        </form>

        <div class="back1">
            <a href="sair.php"><input type="button" value="Sair" class="btn btn-secondary btn-sm" ></a>
        </div>

    </div>


    <?php
        include_once "links_footer.php";
    ?>
</body>