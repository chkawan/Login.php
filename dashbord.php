<?php
session_start();
ob_start();
include_once "conn.php";

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