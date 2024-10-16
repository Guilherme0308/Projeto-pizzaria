<?php
    // !empty não deixa os campos serem nulos
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){        
        // importa o arquivo de conexão
        require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');

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