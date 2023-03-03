<?php
session_start();
ob_start();
include_once "conn.php";


// echo password_hash(1234, PASSWORD_DEFAULT);
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(!empty($dados['conect'])){
   

    $query_use = "SELECT id, usuario, senha, nivel
                    FROM usuarios 
                    WHERE usuario = :usuario
                    LIMIT 1";

                    $result_use = $conn->prepare($query_use);
                    $result_use->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
                    $result_use->execute();

                    if(($result_use) AND ($result_use->rowCount() !=0)){
                        $row_use = $result_use->fetch(PDO::FETCH_ASSOC);

                        if(password_verify($dados['senha'], $row_use['senha'])){
                            $_SESSION['id'] = $row_use['id'];
                            $_SESSION['usuario'] = $row_use['usuario'];
                            $_SESSION["nivel"] = $row_use["nivel"];
                            header("Location: dashbord.php");
                            
                            
                        }else{
                            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuario ou Senha incorreto!</div>";
                            header("Location: index.php");
                        }

                    }else{
                        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuario ou Senha incorreto!</div>";
                        header("Location: index.php");
                    };

                    
    };
?>