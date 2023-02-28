<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "login";
$port = 3306;

try{
    $conn = new PDO("mysql:host=$host; port=$port;dbname=" . $dbname, $user, $pass);
    // echo "Conexão com baco de dados realizada com sucesso!";

    // $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

}catch(PDOException $err){
   // echo "Erro: Conexão com banco de dados não realizada! Erro gerado " .$err->getMessage();
}