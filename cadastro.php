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


<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['cadastrar'])){
var_dump($dados);
}
?>

    <div class="container border col ">

        <form action="processa_cad.php" method="POST">

                <div  class="row-md-12 titulo d-flex justify-content-center">
                <h2>Criar uma Conta</h2>
                </div>

                <?php
                 include_once "erro.php";
                 ?>

                <div class="input-grup row-md-12  mb-2 d-flex justify-content-center">
                    <label for="email">
                        E-Mail:
                            <input type="email" name="email" id="email" class="form-control" value="<?php if(isset($dados['email'])) { echo $dados['email'];}?>">
                    </label>
                </div>

                <div class="input-grup row-md-12  mb-2 d-flex justify-content-center">
                    <label for="login">
                        Usuario:
                            <input type="tex" name="usuario" id="usuario" class="form-control" value="<?php if(isset($dados['usuario'])) { echo $dados['usuario'];}?>">
                    </label>
                </div>

                <div class=" input-grup row-md-12  mb-2 d-flex justify-content-center password">
                    <label for="password">
                        Password:
                            <input type="password" name="senha" id="senha" class="form-control" value="<?php if(isset($dados['senha'])) { echo $dados['senha'];}?>">
                    </label>
                </div>
                <div class=" input-grup row-md-12  mb-2 d-flex justify-content-center">
                    <label for="nivel">Nível de acesso:</label>
                        <select id="nivel" name="nivel">
                            <option value="1">Administrador</option>
                            <option value="2">Usuário comum</option>
                            <option value="3">Vip</option>
                        </select>
                </div>
                
                <div class="input-grup row-md-12  mb-3 d-grid gap-3 col-3 mx-auto ">
                    <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar" class="btn btn-success btn-sm form-control ">
                </div>

                

        </form>
        
        <div class="back">
            <input type="button" value="Voltar" onClick="JavaScript: window.history.back();"  class="btn btn-secondary btn-sm">
        </div>
        

    </div>


    <?php
        include_once "links_footer.php";
    ?>
</body>