    document.addEventListener('DOMContentLoaded', () => {
        const quantidadeInput = document.getElementById('quantidade_produto');
        const valorProduto = document.getElementById('valor_produto');
        const totalProduto = document.getElementById('total_produto');
        const removerButton = document.getElementById('remover');
        const finalizarCompraButton = document.getElementById('finalizar_compra');

        // Atualiza o total do produto
        const atualizarTotal = () => {
            const quantidade = parseInt(quantidadeInput.value);
            const preco = parseFloat(valorProduto.textContent.replace('Preço: R$', '').replace(',', '.'));
            const total = quantidade * preco;
            totalProduto.textContent = `Total R$ ${total.toFixed(2).replace('.', ',')}`;
        };

        // Evento para atualizar o total quando a quantidade mudar
        quantidadeInput.addEventListener('input', atualizarTotal);

        // Evento para remover o produto
        removerButton.addEventListener('click', () => {
            document.querySelector('.produto').remove();
            totalProduto.textContent = 'R$ 0,00';
        });

        // Evento para finalizar a compra
        finalizarCompraButton.addEventListener('click', () => {
            alert('Compra finalizada com sucesso!');
        });

        // Inicializa o total
        atualizarTotal();
    });
