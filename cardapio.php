<?php

// Inclui o arquivo de configuração global do aplicativo:
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

/**
 * Define o título desta página:
 * 
 *  → Na página inicial usaremos o 'slogan' do site.
 */
$page_title = $site_slogan;

// Define o conteúdo principal desta página:

//Banner
$page_article = <<<HTML
<section class="home-banner">
    <img src="/src/img/pizza-5107039_640.jpg" alt="Pizza deliciosa" class="banner">
    <img src="/src/img/logo_pizzaria.png" alt="Logo da Pizzaria" class="logo-banner">
    <button type="button" class="banner-button">Fazer Pedido</button>
</section>
HTML;

function gerarCartoes($conn, $sql, $sectionClass, $msgIndisponivel) {
    $html = "<section class='{$sectionClass}'>";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $html .= <<<HTML
                <div class="pizza-card">
                    <img src="{$row['imagem']}" alt="{$row['nome']}" class="pizza-image">
                    <div class="pizza-info">
                        <h2>{$row['nome']}</h2>
                        <p>Ingredientes: {$row['ingredientes']}</p>
                        <p>Preço: R$ {$row['preco']}</p>
                        <button class="order-button">Fazer Pedido</button>
                    </div>
                </div>
            HTML;
        }
    } else {
        $html .= "<p>{$msgIndisponivel}</p>";
    }
    $html .= '</section>';
    
    return $html;
}

// Geração de cartões para cada categoria de produtos
$page_article .= gerarCartoes($conn, "SELECT nome, ingredientes, preco, imagem FROM pizzassalgadas", "pizzassalgadas", "Não há pizzas salgadas disponíveis no momento.");
$page_article .= gerarCartoes($conn, "SELECT nome, ingredientes, preco, imagem FROM pizzasdoces", "pizzasdoces", "Não há pizzas doces disponíveis no momento.");
$page_article .= gerarCartoes($conn, "SELECT nome, ingredientes, preco, imagem FROM bebidasnaoalcoolicas", "bebidasnaoalcoolicas", "Não há bebidas não alcoólicas disponíveis no momento.");
$page_article .= gerarCartoes($conn, "SELECT nome, ingredientes, preco, imagem FROM bebidasalcoolicas", "bebidasalcoolicas", "Não há bebidas alcoólicas disponíveis no momento.");

/***********
 * Fim do código PHP desta página! *
 * Cuidado ao alterar o código abaixo *
 **************************************/

// Inclui o cabeçalho do template nesta página:
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');

// Exibe o conteúdo da página:
echo "<article>{$page_article}</article>";

// Inclui o rodapé do template nesta página.
require($_SERVER['DOCUMENT_ROOT'] . '/_footer.php');
