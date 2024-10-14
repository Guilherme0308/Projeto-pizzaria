<?php
    $host = "localhost";
    $database = "xerodb";
    $user = "root";
    $password = "";

    $conectar = new conectar($host, $user, $password, $database);

    if($conectar->connect_errno){
        echo "falha ao conectar:(" . $conectar->connect_errno . ")" . $conectar->connect_errno;
    }
    else{
        echo "conectado ao banco de dados";
    }
?>