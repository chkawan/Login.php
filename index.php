<?php
session_start();
ob_start();
include_once "conn.php";
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

        <form action="validacao.php" method="post">

            <div  class="row-md-12 titulo d-flex justify-content-center">
            <h2>Testando Niveis de Acesso</h2>
            </div>

            
            <div class="alert" role="alert">
                <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
            <div class="input-grup row-md-12  mb-2 d-flex justify-content-center">
                <label for="login">
                    Usuario:
                        <input type="tex" name="usuario" id="usuario" class="form-control" 
                        value="<?php if(isset($dados['usuario'])) { echo $dados['usuario'];}?>">
                </label>
            </div>

            <div class=" input-grup row-md-12  mb-2 d-flex justify-content-center password">
                <label for="password">
                    Password:
                        <input type="password" name="senha" id="senha" class="form-control" 
                        value="<?php if(isset($dados['senha'])) { echo $dados['senha'];}?>">
                </label>
            </div>

            <div class="input-grup row-md-12  mb-3 d-grid gap-3 col-3 mx-auto  ">
                <input type="submit" value="Conectar" id="conect" name="conect" class="conect btn btn-success btn-sm form-control ">
            </div>

            <div class="input-grup row-md-12  mb-5" >
                <div class="row">
                    <div class="recuperar col-sm-6 d-flex justify-content-center"><a href="recuperar.php">Esqueceu a Senha.</a></div> 

                    <div class="novocadastro col-sm-6 d-flex justify-content-center"><a  href="cadastro.php">Criar conta.</a></div>
                </div>
            </div>

        </form>

    </div>


    <?php
        include_once "links_footer.php";
    ?>
</body>