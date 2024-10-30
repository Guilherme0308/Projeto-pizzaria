<?php
session_start();

// Redireciona para a página de login se o usuário não estiver logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Inclui o arquivo de configuração do banco de dados
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

// Pega o ID do usuário da sessão e busca suas informações
$usuario_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT id, nome, email, telefone, cep, endereco, numero, complemento, cidade, estado FROM usuario WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();

// Inicializa a variável para armazenar o conteúdo do perfil
$page_article = '<section class="profile-content">';

// Verifique se os dados do usuário estão disponíveis
if ($resultado && $resultado->num_rows > 0) {
    $user = $resultado->fetch_assoc();  
    // Cria o cartão de perfil
    $page_article .= <<<HTML
        <div class="profile-card">
            <h2>Perfil de {$user['nome']}</h2>
            <p><strong>Email:</strong> {$user['email']}</p>
            <p><strong>Telefone:</strong> {$user['telefone']}</p>
            <p><strong>CEP:</strong> {$user['cep']}</p>
            <p><strong>Endereço:</strong> {$user['endereco']}, Nº {$user['numero']} {$user['complemento']}</p>
            <p><strong>Cidade:</strong> {$user['cidade']}</p>
            <p><strong>Estado:</strong> {$user['estado']}</p>
            <form action="logout.php" method="POST">
                <button type="submit" name="logout" class="logout-button">Sair</button>
            </form>
        </div>
    HTML;
} else {
    $page_article .= "<p>Não foi possível encontrar suas informações de perfil.</p>";
}

// Finaliza a seção de perfil
$page_article .= '</section>';

// Fecha a declaração
$stmt->close();

// Fecha a conexão ao banco de dados
$conn->close();

// Inclui o cabeçalho do template nesta página
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');

// Exibe o conteúdo do perfil
echo $page_article;

// Inclui o rodapé do template nesta página
require($_SERVER['DOCUMENT_ROOT'] . '/_footer.php');
?>
