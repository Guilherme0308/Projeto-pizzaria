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
    