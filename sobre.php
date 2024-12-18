<?php
$page_article .= <<<HTML
<section class="sobre">
    <div>
        <h1 class="title-sobre"> Sobre Nossa Xêro Pizzaria </h1>

        <p class="primari-text">
            Inauguramos uma unidade no Rio de Janeiro, no bairro Campo Grande. Investimos em tecnologia e delivery
            para melhorar a experiência dos amantes de pizza.
            Somos líderes em número de lojas - em 2020, somamos 100 lojas espalhadas pelo país - e estamos
            investindo R$ 150 milhões para dobrar de tamanho e chegar a 200 unidades em 2025.
            Xêro Brasil preserva o padrão mundial de qualidade para o produto e o serviço.
            Nosso processo é artesanal, com massas frescas que passam por 48 horas de fermentação. Este é um dos
            nossos principais atributos: abrimos cada uma de nossas pizzas à mão.
            Nossos fornos também são os mais quentes do mercado para que as pizzas cheguem quentinhas à casa dos
            nossos clientes.
            A gente ama o que faz e sabe que o brasileiro é apaixonado por pizzas.
            Por isso, nossa missão é vender pizza com mais diversão.
        </p>

        <p class="primari-text">
        <h1 class="more-info"> Para mais informações </h1>
        <ul>
            <li>E-mail: pizzariaxero.com</li>

            <li>Serviço disponível nas áreas de entrega Xero Pizza, todos os dias, de acordo com o horário de
                funcionamento de cada loja.
                Todas as promoções expostas não são cumulativas entre si ou com outras promoções e descontos.
                Cobramos taxa de entrega.
                Todos os nossos produtos</li>

            <li>Alérgicos: todos os nossos produtos contém ou podem conter
                traços de Trigo, Ovos, Leite e Soja.</li>

            <li>As formas de pagamento variam de acordo com cada loja.</li>

            <li>Imagens meramente ilustrativas.</li>
        </ul>
        </p>

        <p class="primari-text">XERÔ PIZZA BRASIl, Rua Capricorniano 5977 - 2 andar - Campo Grande , Rio de
            Janeiro/RJ - 22579-998</p>

        <p class="primari-text">
        <h1 class="more-info">Este projeto foi criado por:</h1>
        <ul>
            <li>Guilherme Alves de Souza Gregório</li>
            <li>João Tavares Rigueti de Oliveira</li>
            <li>Laryssa Esper Pereira</li>
            <li>Sarah Cristina Cabral</li>
        </ul>
        </p>
    </div>
</section>
HTML;

// Inclui o cabeçalho do template nesta página:
require($_SERVER['DOCUMENT_ROOT'] . '/Projeto-pizzaria/_header.php');

// Exibe o conteúdo da página:
echo "<article>{$page_article}</article>";

// Inclui o rodapé do template nesta página.
require($_SERVER['DOCUMENT_ROOT'] . '/Projeto-pizzaria/_footer.php');