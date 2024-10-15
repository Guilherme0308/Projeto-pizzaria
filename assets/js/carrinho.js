document.addEventListener('DOMContentLoaded', () => {
    const cartContainer = document.getElementById("carrinho-container");
    const totalProduto = document.getElementById("total_produto");
    const finalizarCompraButton = document.getElementById("finalizar_compra");

    // Function to get cart items from localStorage
    function getCartItems() {
        return JSON.parse(localStorage.getItem("cart")) || [];
    }

    // Function to update the displayed total price
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

    // Function to display cart items
    function displayCartItems() {
        const cartItems = getCartItems();
        cartContainer.innerHTML = ""; // Clear existing items

        // If cart is empty
        if (cartItems.length === 0) {
            cartContainer.innerHTML = "<p>Carrinho vazio!</p>";
            updateTotal();
            return;
        }

        // Iterate through each cart item
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

    // Function to remove an item from the cart
    function removeFromCart(index) {
        const cartItems = getCartItems();
        cartItems.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(cartItems));
        displayCartItems();
    }

    // Event delegation for quantity updates and item removal
    cartContainer.addEventListener("click", (e) => {
        if (e.target.classList.contains("remover")) {
            const index = e.target.getAttribute("data-index");
            removeFromCart(index);
        }
    });

    // Event listener for quantity changes
    cartContainer.addEventListener("input", (e) => {
        if (e.target.classList.contains("quantidade_produto")) {
            updateTotal();
        }
    });

    // Event listener for finalizing purchase
    finalizarCompraButton.addEventListener("click", () => {
        alert("Compra finalizada com sucesso!"); // Placeholder action
        // Implement your checkout logic here
    });

    // Initialize the cart display
    displayCartItems();
});
