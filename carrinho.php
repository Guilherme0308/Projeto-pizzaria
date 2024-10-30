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
//
  

// Exemplo de produtos em um array


// Inclui o cabeçalho do template nesta página:
require($_SERVER['DOCUMENT_ROOT'] . '/_header.php');
$page_article = <<<HTML


    <main>
        <section>
            <div class="carrinho-container">
                    <div class="produto">
                        <img id="imagem_produto" src="<?= $produto['imagem']; ?>" alt="<?= $produto['nome']; ?>">

                        <div class="detalhes-produto">
                            <h1 id="nome_produto"><?= $produto['nome']; ?></h1>

                            <label for="quantidade">Quantidade:</label>
                            <input type="number" class="quantidade_produto" id="quantidade_produto" value="1" min="1">

                            <p id="valor_produto">Preço: R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></p>
                        </div>

                        <div class="remover-produto">
                            <button id="remover">Remover</button>
                        </div>
                    </div>

                <div class="total">
                    <h1 id="total_produto"></h1>
                    <button class="finalizar-compra" id="finalizar_compra">Finalizar Compra</button>
                </div>

            </div>
        </section>
    </main>
    

HTML;

