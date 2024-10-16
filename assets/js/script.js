document.addEventListener('DOMContentLoaded', function() {
    const produtos = document.querySelectorAll('.produto');
    let total = 0;

    produtos.forEach(produto => {
        const quantidadeElem = produto.querySelector('.detalhes-produto p:nth-child(2)');
        const precoElem = produto.querySelector('.detalhes-produto p:nth-child(3)');
        const removerBtn = produto.querySelector('.remover-produto button');
        let quantidade = parseInt(quantidadeElem.textContent.split(': ')[1]);
        const preco = parseFloat(precoElem.textContent.split(': ')[1].replace('R$', ''));

        total += quantidade * preco;

        quantidadeElem.addEventListener('change', function() {
            quantidade = parseInt(quantidadeElem.textContent.split(': ')[1]);
            atualizarTotal();
        });

        removerBtn.addEventListener('click', function() {
            produto.remove();
            atualizarTotal();
        });
    });

    document.querySelector('.total h1').textContent = `Total: R$ ${total.toFixed(2)}`;

    function atualizarTotal() {
        total = 0;
        produtos.forEach(produto => {
            const quantidadeElem = produto.querySelector('.detalhes-produto p:nth-child(2)');
            let quantidade = parseInt(quantidadeElem.textContent.split(': ')[1]);
            const preco = parseFloat(produto.querySelector('.detalhes-produto p:nth-child(3)').textContent.split(': ')[1].replace('R$', ''));
            total += quantidade * preco;
        });
        document.querySelector('.total h1').textContent = `Total: R$ ${total.toFixed(2)}`;
    }
});

// Remover itens do carrinho
let removerCarrinho = document.querySelectorAll('#remover');
for (let i = 0; i < removerCarrinho.length; i++) {
    let removeButtom = removerCarrinho[i];
    removeButtom.addEventListener('click', function (event) {
        let removeClicked = event.target;
        removeClicked.parentElement.parentElement.remove();
        alert('Removido');
        updateQuant();
    });
}

// Adicionar mais de um mesmo item
function updateQuant() {
    let cartContainer = document.querySelector('.carrinho-container');
    let cartProduct = cartContainer.querySelectorAll('.produto');
    let totalCart = 0;

    for (let i = 0; i < cartProduct.length; i++) {
        let productItem = cartProduct[i];
        let productPrice = productItem.querySelector('#valor_produto');
        let productQuant = productItem.querySelector('#quantidade_produto input');
        
        let valor = parseFloat(productPrice.innerText.replace('R$ ', '').replace(',', '.'));
        let quant = parseFloat(productQuant.value);

        totalCart += valor * quant;
    }

    document.querySelector('#total_produto').innerText = 'Total: R$ ' + totalCart.toFixed(2).replace('.', ',');
}

// Array com os caminhos para as suas imagens de banner
const bannerImages = [
            
];

// Função para mudar a imagem do banner
function changeBannerImage() {
    const banner = document.querySelector('.banner');
    const randomImage = bannerImages[Math.floor(Math.random() * bannerImages.length)];
    banner.style.backgroundImage = `url(${randomImage})`;
}

// Mudar a imagem do banner ao carregar a página
window.onload = changeBannerImage;