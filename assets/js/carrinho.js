// querySelectorAll retorna todos os elementos

function updateQuant(){
    const productQuant = parseFloat(document.getElementById('quantidade_produto').value);
    const productPrice = parseFloat(document.getElementById('valor_produto').value);
    const totalCart = productQuant * productPrice;
    // document.getElementById('total_produto').textContent = 'Total: R$ ' totalCart.toFixed(2).replace('.', ',');
    document.getElementById('total_produto').textContent = `R$ ${totalCart.toFixed(2)}`;
}

// remover itens do carrinho
let removerCarrinho = document.querySelectorAll('#remover');
console.log(removerCarrinho);
for (let i = 0; i < removerCarrinho.length; i++) {
    let removeButtom = removerCarrinho[i];
    removeButtom.addEventListener('click', function (event) {
        let removeClicked = event.target;
        // parentElement retorna o elemento relacionado
        // dois parentElement, pois buttom está dentro de uma div
        // que está na div produto
        removeClicked.parentElement.parentElement.remove();
        window.Alert('Removido');
        updateQuant();
    })
}

// // adicionar mais de um mesmo item
// function updateQuant() {
//     let cartContainer = document.querySelectorAll('.carrinho-container')[0];
//     let cartProduct = cartContainer.querySelectorAll('.produto');
//     let totalCart = 0;

//     for (let i = 0; i < cartProduct.length; i++) {
//         let productItem = cartProduct[i]; //produto
//         let productPrice = productItem.querySelector('#valor_produto')[0]; //valor
//         let productQuant = productItem.querySelector('#quantidade_produto input')[0]; //quantidade
//         console.log(productPrice, productQuant);

//         // Obtém o valor do preço e a quantidade
//         let valor = parseFloat(productPrice.innerText.replace('R$ ', '').replace(',', '.')); // Converte o valor para número
//         let quant = parseFloat(productQuant.value); // Converte a quantidade para número
//     }
//     // Atualiza o total no elemento
//     document.getElementById('#total_produto').innerText = 'Total: R$ ' + totalCart.toFixed(2).replace('.', ',');
//     totalCart += valor * quant; // Calcula o total
//     document.getElementById('#valor_produto').textContent = totalCart; 
// }