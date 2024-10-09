// Select all "Adicionar ao Carrinho" buttons
const cartButtons = document.querySelectorAll(".card-button");

// Get cart count span
const cartCount = document.querySelector(".cart-count");

// Function to get cart items from localStorage
function getCartItems() {
    return JSON.parse(localStorage.getItem("cart")) || [];
}

// Function to save cart items to localStorage
function saveCartItems(items) {
    localStorage.setItem("cart", JSON.stringify(items));
}

// Function to update the cart count display
function updateCartCount() {
    const items = getCartItems();
    cartCount.textContent = items.length;
}

// Function to add an item to the cart
function addToCart(product) {
    const cartItems = getCartItems();
    cartItems.push(product);
    saveCartItems(cartItems);
    updateCartCount();
}

// Event listener for adding items to the cart
cartButtons.forEach(button => {
    button.addEventListener("click", (e) => {
        // Get product details
        const card = e.target.closest(".card");
        const product = {
            name: card.querySelector("h3, h2").textContent,
            price: card.querySelector(".price").textContent,
            image: card.querySelector("img").src
        };

        // Add to cart
        addToCart(product);
        alert(`${product.name} foi adicionado ao carrinho!`);
    });
});

// Initialize cart count on page load
document.addEventListener("DOMContentLoaded", updateCartCount);
