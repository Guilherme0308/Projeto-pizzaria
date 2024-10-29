<?php
session_start(); // Inicia a sessão

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // Inclui o arquivo de configuração global do aplicativo:
    require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta SQL para evitar injeção de SQL
    $stmt = $conn->prepare("SELECT id, senha FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows < 1) {
        // Se não houver resultados, redireciona para a página de login
        header("Location: login.php?error=1");
        exit();
    } else {
        $row = $resultado->fetch_assoc();
        $senhaHash = $row['senha'];

        // Verifica se a senha digitada corresponde à senha hash armazenada
        if (password_verify($senha, $senhaHash)) {
            // Senha correta, inicia a sessão e armazena o ID do usuário
            $_SESSION['user_id'] = $row['id'];
            header("Location: /profile.php");
            exit;
        } else {
            // Senha incorreta
            header("Location: login.php?error=2");
            exit;
        }
    }

    $stmt->close();
    $conn->close();
}

require($_SERVER['DOCUMENT_ROOT'] . '/_header.php'); 
?>



<body>
    <main>
        <section class="logi">


            <div class="login-box">
                <h1>Login</h1>
                <p>Ainda não é membro? <a href="cadastro.php">Cadastre-se</a></p>

                <form action="login.php" method="POST">
                    <div class="box-item">
                        <input name="email" type="email" placeholder="E-mail" required />
                        <input name="senha" type="password" placeholder="Senha" required />
                    </div>

                    <button name="submit" type="submit" id="btn">Acessar</button>

                </form>

            </div>
        </section>
    </main>
</body>