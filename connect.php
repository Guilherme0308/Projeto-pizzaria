<?php
    // dados do servidor local
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "xerodb";

    // variável que irá fazer a conexão
    $conexao = mysqli_connect($host, $user, $password, $database);

    // teste de conexão
    if(!$conexao){
        die("Houve um erro ao conectar. ".mysqli_connect_error());
    }
?>