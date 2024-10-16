<?php

    // !empty não deixa os campos serem nulos
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){        
        // importa o arquivo de conexão
        require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // coloca os campos digitados no banco de dados em sql
        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha' ";

        $resultado = $conexao->query($sql);

        if(mysqli_num_rows($resultado) < 1){
            header("Location: login.php");
        }
        else{
            header("Location: profile.html");
        }

    }
    else{
        // login errado: volta para a tela de login
        header('Location: login.php');
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
        <section class="logi">


            <div class="login-box">
                <h1>Login</h1>
                <p>Ainda não é membro? <a href="cadastro.php">Cadastre-se</a></p>

                <form action="login.php" method="POST">
                    <div class="box-item">
                        <input name="email" type="email" placeholder="E-mail" request />
                        <input name="senha" type="password" placeholder="Senha" request />
                    </div>

                    <button name="submit" type="submit" id="btn">Acessar</button>

                </form>

            </div>
        </section>
    </main>
</body>