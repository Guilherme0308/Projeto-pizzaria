function addToCart(produtoId) {
     // Pegando o ID do produto a partir do atributo 'data-product-id'
     const productId = this.getAttribute('data-product-id');
    
     // Você pode usar o localStorage ou sessionStorage para armazenar dados do produto (opcional)
     let cart = JSON.parse(localStorage.getItem('cart')) || [];
     
     // Adiciona o produto ao carrinho
     cart.push({ id: productId, quantity: 1 });
     
     // Atualiza o carrinho no localStorage
     localStorage.setItem('cart', JSON.stringify(cart));
    // Redirecionando para a página de carrinho
    window.location.href = '/carrinho';
}