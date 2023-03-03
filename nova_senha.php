<?php
session_start();
require_once 'conn.php';


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

        <form action="processa_reset_senha.php" method="post">

                <div  class="row-md-12 titulo d-flex justify-content-center">
                <h2>Digite o Codgio enviado</h2>
                </div>

                <br><br>

                <div class="input-grup row-md-12  mb-2 d-flex justify-content-center">
                    <label for="senha">
                        Nova Senha:
                            <input type="password" name="senha" id="senha" class="form-control">
                    </label>
                </div>

                <div class="input-grup row-md-12  mb-2 d-flex justify-content-center">
                    <label for="confirma_senha">
                        Nova Senha:
                            <input type="password" name="confirma_senha" id="confirma_senha" class="form-control">
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
