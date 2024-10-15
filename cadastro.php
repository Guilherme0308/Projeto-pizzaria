<?php
    // isset() verifica se algo é diferente de null, no caso, se há uma variável tipo submit
    if(isset($_POST['submit'])){
        // importa o arquivo de conexão
        include_once('connect.php');
        
        // variável para cada campo com seu name=""
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];

        // coloca os campos digitados no banco de dados em sql
        $adicionar = mysqli_query($conexao, "INSERT INTO usuario (nome, email, telefone, cep, endereco, numero, complemento, cidade, estado, senha) 
        VALUES ('$nome', '$email', '$telefone', '$cep', '$endereco', '$numero', '$complemento', '$cidade', '$estado', '$senha')");

        header("Location: login.html");
    }

?>