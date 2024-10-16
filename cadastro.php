<?php
    // isset() verifica se algo é diferente de null, no caso, se há uma variável tipo submit
    if(isset($_POST['submit'])){
        // importa o arquivo de conexão
        require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');
        
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

        header("Location: login.php");
    }

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xero Pizzaria</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <main>
        <section class="cadast">
            <div class="box-cadast">

                <h1>Criar Conta</h1>
                <p>Já é membro? <a href="login.php">Login</a></p>

                <form action="cadastro.php" method="POST">
                    <div class="box-item" id="nome">
                        <input name="nome" type="text" placeholder="Nome" request />
                    </div>

                    <div class="box-item" id="email">
                        <input name="email" type="email" placeholder="E-mail" request />
                    </div>

                    <div class="box-item" id="telefone">
                        <input name="telefone" type="number" placeholder="Telefone" request />
                    </div>

                    <div class="box-item" id="pass">
                        <input name="senha" type="password" id="pass" placeholder="Senha" request />
                    </div>

                    <div class="box-item" id="endereco">
                        <input name="endereco" type="text" id="endereco" placeholder="Endereço" request />
                    </div>

                    <div class="box-group">
                        <input name="cep" type="number" id="cep" placeholder="CEP" request />
                        <input name="numero" type="number" id="numero" placeholder="Número" request />
                    </div>

                    <div class="box-item" id="complemento">
                        <input name="complemento" type="text" placeholder="Complemento" />
                    </div>

                    <div class="box-group" id="cidade">
                        <input name="cidade" type="text" placeholder="Cidade" request />
                        <input name="estado" type="text" placeholder="Estado" request />
                    </div>

                    <button name="submit" type="submit" id="btn">Enviar</button>

                </form>

            </div>
        </section>
    </main>
</body>