<?php

// Inclui o arquivo de configuração global do aplicativo:
require($_SERVER['DOCUMENT_ROOT'] . '/Projeto-pizzaria/_config.php');

$page_article .= '<section class="pizzas-content">';

// Buscar dados de pizza do banco de dados
$sql = "SELECT nome, ingredientes, preco, imagem FROM pizzas";
$result = $conn->query($sql);

// Verifique se os dados estão disponíveis
if ($result && $result->num_rows > 0) {
    // Percorra cada registro de pizza e crie um cartão
    while ($row = $result->fetch_assoc()) {
        $page_article .= <<<HTML
            <div class="pizza-card">
                <img src="{$row['imagem']}" alt="{$row['nome']}" class="pizza-image">
                <div class="pizza-info">
                    <h2>{$row['nome']}</h2>
                    <span></span>
                    <p>Preço: R$ {$row['preco']}</p>
                    <button class="order-button">Fazer Pedido</button>
                </div>
            </div>
        HTML;
    }
} else {
    $page_article .= "<p>Não há pizzas disponíveis no momento.</p>";
}

// Finaliza a seção de pizzas
$page_article .= '</section>';



// Inclui o cabeçalho do template nesta página:
require($_SERVER['DOCUMENT_ROOT'] . '/Projeto-pizzaria/_header.php');

// Exibe o conteúdo da página:
echo "<article>{$page_article}</article>";

// Inclui o rodapé do template nesta página.
require($_SERVER['DOCUMENT_ROOT'] . '/Projeto-pizzaria/_footer.php');