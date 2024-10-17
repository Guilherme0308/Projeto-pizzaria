<?php
// Inclui o arquivo de configuração global do aplicativo
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

// Define o título desta página
$page_title = $site_slogan;

// Mensagem de erro padrão
$erro = '';

// Checa se os campos de email e senha foram enviados
if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // Captura os dados enviados com segurança
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $_POST['senha']; // Não escapando a senha aqui para password_verify funcionar corretamente
    
    // Verifica os dados no banco de dados
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado = $conn->query($sql);

    if($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();
        
        // Verifica se a senha está correta
        if(password_verify($senha, $usuario['senha'])) {
            // Redireciona para o perfil do usuário
            header("Location: index.html");
            exit();
        } else {
            // Senha incorreta
            $erro = 'Senha incorreta. Tente novamente.';
        }
    } else {
        // Usuário não encontrado
        $erro = 'Usuário não encontrado. Verifique o e-mail.';
    }
} elseif (isset($_POST['submit'])) {
    // Campos não preenchidos
    $erro = 'Preencha todos os campos.';
}

// Define o conteúdo principal da página
$page_article = <<<HTML
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
        <p class="error">$erro</p>
    </div>
</section>
HTML;

/***********
 * Fim do código PHP desta página!
 * Cuidado ao alterar o código abaixo
 **************************************/

// Inclui o cabeçalho do template nesta página
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');
// Exibe o conteúdo da página
echo "<article>{$page_article}</article>";
// Inclui o rodapé do template nesta página
require($_SERVER['DOCUMENT_ROOT'] . '/_footer.php');
?>
