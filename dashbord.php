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
$id = $_SESSION["id"];
if ($nivel >= 2) {
  // se o nível de acesso for 2 ou maior, adiciona a classe "hide" aos botões
  $hide = 'hide';

} else {
  // caso contrário, não adiciona a classe "hide" aos botões
  $hide = '';
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
    <div class="container2 border col ">

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
                // Conecte-se ao banco de dados e recupere os dados dos usuários
                $statement = $conn->prepare("SELECT * FROM usuarios");
                $statement->execute();
                $usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?>
               

                <div class="table-responsive">
                  <table class="table table-striped nowarp">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Usuário</th>
                        <th>Email</th>
                        <th>Nível</th>
                        <th class="btn-acao <?php echo $hide; ?>">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                          <td><?= $usuario['id'] ?></td>
                          <td><?= $usuario['usuario'] ?></td>
                          <td><?= $usuario['email'] ?></td>
                          <td><?= $usuario['nivel'] ?></td>
                          <td class="btn-acao <?php echo $hide; ?>">
                            <a href="#" class="btn btn-primary btn-acao <?php echo $hide; ?>">Editar</a>
                            <a href="#" class="btn btn-danger btn-acao <?php echo $hide; ?>">Excluir</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <br><br>
                <div class="back">
                  <input type="button" value="Sair" onClick="window.location.href='sair.php'" class="btn btn-secondary btn-sm" >
                </div>
          </div>
          
        </form>
    <?php
        include_once "links_footer.php";
    ?>
</body>