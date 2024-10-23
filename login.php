<?php
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // Inclui o arquivo de configuração global do aplicativo:
    require($_SERVER['DOCUMENT_ROOT'] . '/Projeto-pizzaria/_config.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta SQL para evitar injeção de SQL
    $stmt = $conn->prepare("SELECT senha FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email); // 's' significa que é uma string
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows < 1) {
        // Se não houver resultados, redireciona para a página de login
        header("Location: login.php?error=1"); // Adiciona um parâmetro de erro à URL
        exit();
    } else {
        $row = $resultado->fetch_assoc();
        $senhaHash = $row['senha'];

        // Verifica se a senha digitada corresponde à senha hash armazenada
        if (password_verify($senha, $senhaHash)) {
            // Senha correta, redireciona para a página do perfil
            header("Location: /Projeto-pizzaria/profile.html");
            exit;
        } else {
            // Senha incorreta
            header("Location: login.php?error=2"); // Adiciona um parâmetro de erro à URL
            exit;
        }
    }

    $stmt->close(); // Fecha a declaração
    $conn->close(); // Fecha a conexão
}

require($_SERVER['DOCUMENT_ROOT'] . '/Projeto-pizzaria/_header.php'); 
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