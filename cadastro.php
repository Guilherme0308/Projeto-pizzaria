<?php
// Inclui o arquivo de configuração global do aplicativo
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

// Mensagem de erro padrão
$erro = '';

// isset() verifica se algo é diferente de null, no caso, se há uma variável tipo submit
if(isset($_POST['submit'])) {
    // Captura os dados enviados com segurança
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefone = $conn->real_escape_string($_POST['telefone']);
    $senha = $conn->real_escape_string($_POST['senha']);
    $cep = $conn->real_escape_string($_POST['cep']);
    $endereco = $conn->real_escape_string($_POST['endereco']);
    $numero = $conn->real_escape_string($_POST['numero']);
    $complemento = $conn->real_escape_string($_POST['complemento']);
    $cidade = $conn->real_escape_string($_POST['cidade']);
    $estado = $conn->real_escape_string($_POST['estado']);
    
    // Verifica se todos os campos obrigatórios foram preenchidos
    if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($cep) && !empty($endereco) && !empty($numero) && !empty($cidade) && !empty($estado)) {
        // Coloca os campos digitados no banco de dados em SQL
        $adicionar = $conn->query("INSERT INTO usuario (nome, email, telefone, cep, endereco, numero, complemento, cidade, estado, senha) 
        VALUES ('$nome', '$email', '$telefone', '$cep', '$endereco', '$numero', '$complemento', '$cidade', '$estado', '$senha')");
        
        if($adicionar) {
            // Redireciona para a tela de login
            header("Location: login.php");
            exit();
        } else {
            $erro = 'Erro ao cadastrar. Tente novamente.';
        }
    } else {
        $erro = 'Preencha todos os campos obrigatórios.';
    }
}

// Define o conteúdo principal da página
$page_article = <<<HTML
<section class="cadast">
    <div class="box-cadast">
        <h1>Criar Conta</h1>
        <p>Já é membro? <a href="login.php">Login</a></p>
        <form action="cadastro.php" method="POST">
            <div class="box-item" id="nome">
                <input name="nome" type="text" placeholder="Nome" required />
            </div>
            <div class="box-item" id="email">
                <input name="email" type="email" placeholder="E-mail" required />
            </div>
            <div class="box-item" id="telefone">
                <input name="telefone" type="number" placeholder="Telefone" required />
            </div>
            <div class="box-item" id="pass">
                <input name="senha" type="password" id="pass" placeholder="Senha" required />
            </div>
            <div class="box-item" id="endereco">
                <input name="endereco" type="text" id="endereco" placeholder="Endereço" required />
            </div>
            <div class="box-group">
                <input name="cep" type="number" id="cep" placeholder="CEP" required />
                <input name="numero" type="number" id="numero" placeholder="Número" required />
            </div>
            <div class="box-item" id="complemento">
                <input name="complemento" type="text" placeholder="Complemento" />
            </div>
            <div class="box-group" id="cidade">
                <input name="cidade" type="text" placeholder="Cidade" required />
                <input name="estado" type="text" placeholder="Estado" required />
            </div>
            <button name="submit" type="submit" id="btn">Enviar</button>
        </form>
        <p class='error'>$erro</p>
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
