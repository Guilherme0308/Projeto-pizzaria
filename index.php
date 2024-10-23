<?php

// Inclui o arquivo de configuração global do aplicativo:
require($_SERVER['DOCUMENT_ROOT'] . '/Projeto-pizzaria/_config.php');

// Define o título desta página:
$page_title = $site_slogan;

// Define o conteúdo principal desta página:
$page_article = <<<HTML
<section class="home-banner">
    <img src="/src/img/pizza-5107039_640.jpg" alt="Pizza deliciosa" class="banner">
    <img src="/src/img/logo_pizzaria.png" alt="Logo da Pizzaria" class="logo-banner">
    <button type="button" class="banner-button">Fazer Pedido</button>
</section>
HTML;

// Inicia a seção de pizzas
$page_article .= '<section class="pizzas-content">';

$sql = "SELECT nome, preco, categoria, descricao, imagem FROM produtos";
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
                    <p>Preço: R$ {$row['preco']}</p>
                    <button class="order-button">Fazer Pedido</button>
                </div>
            </div>
        HTML;
    }
} else {
    $page_article .= "<p>Não há produtos disponíveis no momento.</p>";
}

// Finaliza a seção de pizzas
$page_article .= '</section>';

/***********
 * Fim do código PHP desta página! *
 * Cuidado ao alterar o código abaixo *
 **************************************/

// Inclui o cabeçalho do template nesta página:
require($_SERVER['DOCUMENT_ROOT'] . '/Projeto-pizzaria/_header.php');

// Exibe o conteúdo da página:
echo "<article>{$page_article}</article>";

// Inclui o rodapé do template nesta página.
require($_SERVER['DOCUMENT_ROOT'] . '/Projeto-pizzaria/_footer.php');
