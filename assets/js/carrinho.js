var quantidadeInput = document.getElementById('quantidade_produto');
var valorProduto = document.getElementById('valor_produto');
var totalProduto = document.getElementById('total_produto');
var removerButton = document.getElementById('remover');
var finalizarCompraButton = document.getElementById('finalizar_compra');

//manipulação de produtos do carrinho
function AtualizarTotal() {
    const quantidade = parseInt(quantidadeInput.value);
    const preco = parseFloat(valorProduto.textContent.replace('Preço: R$', '').replace(',', '.'));
    const total = quantidade * preco;
    totalProduto.textContent = `Total R$ ${total.toFixed(2).replace('.', ',')}`;
}

quantidadeInput.addEventListener('input', function () {
    AtualizarTotal();
})

removerButton.addEventListener('click', function () {
    document.querySelector('.produto').remove();

    var produtoId = produto.getAttribute('data-id');
    carrinho = carrinho.filter(p => p.id !== produtoId); // Filtra o produto removido
    localStorage.setItem('carrinho-container', JSON.stringify(carrinho)); // Atualiza o localStorage
});

quantidadeInput.addEventListener('input', AtualizarTotal);

finalizarCompraButton.addEventListener('click', function () {
    alert('Compra finalizada com sucesso!');

    localStorage.removeItem('carrinho-container');
});

// Inicializa o total
AtualizarTotal();