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

        <form action="" method="POST">

                <div  class="row-md-12 titulo d-flex justify-content-center">
                <h2>Criar uma Conta</h2>
                </div>

                <br><br>

                <div class="input-grup row-md-12  mb-2 d-flex justify-content-center">
                    <label for="email">
                        E-Mail:
                            <input type="email" name="email" id="email" class="form-control">
                    </label>
                </div>

                <div class="input-grup row-md-12  mb-2 d-flex justify-content-center">
                    <label for="login">
                        Login:
                            <input type="tex" name="login" id="login" class="form-control">
                    </label>
                </div>

                <div class=" input-grup row-md-12  mb-2 d-flex justify-content-center password">
                    <label for="password">
                        Password:
                            <input type="password" name="password" id="password" class="form-control">
                    </label>
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