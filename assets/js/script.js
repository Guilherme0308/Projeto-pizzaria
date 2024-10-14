<<<<<<< HEAD
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
=======
document.addEventListener('DOMContentLoaded', () => {
    const cartContainer = document.getElementById("carrinho-container");
    const totalProduto = document.getElementById("total_produto");
    const finalizarCompraButton = document.getElementById("finalizar_compra");

    // Retrieve cart items from localStorage
    function getCartItems() {
        return JSON.parse(localStorage.getItem("cart")) || [];
    }

    // Update the total price display based on current cart items
    function updateTotal() {
        const cartItems = getCartItems();
        let total = 0;

        cartItems.forEach((item, index) => {
            const quantityInput = document.querySelector(`.quantidade_produto[data-index="${index}"]`);
            const quantity = parseInt(quantityInput.value);
            const price = parseFloat(item.price.replace("R$ ", "").replace(",", "."));
            total += quantity * price;
        });

        totalProduto.textContent = `R$ ${total.toFixed(2).replace('.', ',')}`;
    }

    // Render cart items in the DOM
    function displayCartItems() {
        const cartItems = getCartItems();
        cartContainer.innerHTML = ""; // Clear existing items

        if (cartItems.length === 0) {
            cartContainer.innerHTML = "<p>Carrinho vazio!</p>";
            totalProduto.textContent = "R$ 0,00";
            return;
        }

        cartItems.forEach((item, index) => {
            const productDiv = document.createElement("div");
            productDiv.classList.add("produto");
            productDiv.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <div class="detalhes-produto">
                    <h1>${item.name}</h1>
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" value="1" min="1" class="quantidade_produto" data-index="${index}">
                    <p class="valor_produto">Preço: ${item.price}</p>
                </div>
                <div class="remover-produto">
                    <button class="remover" data-index="${index}">Remover</button>
                </div>
            `;
            cartContainer.appendChild(productDiv);
        });

        updateTotal();
    }

    // Remove item from cart by index
    function removeFromCart(index) {
        const cartItems = getCartItems();
        cartItems.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(cartItems));
        displayCartItems();
    }

    // Event delegation for updating quantities and removing items
    cartContainer.addEventListener("click", (e) => {
        if (e.target.classList.contains("remover")) {
            const index = e.target.getAttribute("data-index");
            removeFromCart(index);
        }
    });

    cartContainer.addEventListener("input", (e) => {
        if (e.target.classList.contains("quantidade_produto")) {
            updateTotal();
        }
    });

    // Finalize purchase action
    finalizarCompraButton.addEventListener("click", () => {
        const cartItems = getCartItems();
        
        if (cartItems.length === 0) {
            alert("Não há produtos no carrinho.");
            window.location.href = "index.html"; // Redirect to home page
        } else {
            alert("Compra finalizada com sucesso!");
            // Implement further checkout logic here if needed
        }
    });

    // Initialize the cart display
    displayCartItems();
});
    
>>>>>>> 3823b1b8b79a31c04ea5deb352d075ceb5414cd7
