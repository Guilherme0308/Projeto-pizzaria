<?php

// Inclui o arquivo de configuração global do aplicativo:
require($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

$page_article .= '<section class="pizzas-content">';

// Buscar dados de pizza do banco de dados
$sql = "SELECT nome, ingredientes, preco, imagem FROM produtos";
$result = $conn->query($sql);
$carrinho 

$sql = "SELECT nome, preco, categoria, descricao, imagem, FROM produtos";
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
                    <button class="order-button">Adicionar ao carrinho</button>
                    <a href="?adicionar=<?php echo key ?>">Adicionar ao carrinho!</a>
                </div>
            </div>
        HTML;
    }
} else {
    $page_article .= "<p>Não há produtos disponíveis no momento.</p>";
}

// Finaliza a seção de pizzas
$page_article .= '</section>';


    if(isset($_GET['adicionar'])){
        //vamos adicionar ao carrinho
        $id_Produto = (int) $_GET['adicionar'];
        if(isset($itens[$id_Produto])){
            if(isset($_SESSION[$id_Produto])){
                $_SESSION[$id_Produto]['quantidade']++;
            }else{
              $_SESSION[$id_Produto] = array('quantidade'=>1,'none'=> [$carrinho]);  
            }
        }else{
            die('Você não pode adicionar um item inexistente.');
        }
    }



// Inclui o cabeçalho do template nesta página:
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');

// Exibe o conteúdo da página:
echo "<article>{$page_article}</article>";

// Inclui o rodapé do template nesta página.
require($_SERVER['DOCUMENT_ROOT'] . '/_footer.php');