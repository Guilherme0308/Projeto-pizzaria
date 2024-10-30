<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xero Pizzaria</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header>
        <img src="src/img/logo_pizzaria.png" alt="Logo da Pizzaria" class="logo">

        <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="cardapio.php">Cardápio</a></li>
            <li><a href="sobre.php">Sobre</a></li>
            <li><a href="login.php" class="login">Login</a></li>
            <li><a href="profile.php" class="profile"><i class="fa fa-user"></i></a></li>
            <li class="cart">
                <a href="carrinho.php"><i class="fa fa-shopping-cart cart-icon"></i>
                    <span class="cart-count">3</span></a>
            </li>
            <div class="search-container">
                <input type="text" placeholder="Pesquisar...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </ul>
        <button class="menu-toggle"><i class="fa fa-bars"></i></button>
    </header>

    <main>
        <section class="fazer-pedido">
            <div class="group-pedido">

                <div class="left">
                    <!-- informações -->
                    <div class="info-box">
                        <h1>Informações de Entrega</h1>
                        <ul>
                            <li>Nome: <?php echo htmlspecialchars($user_name); ?></li>
                            <li>Endereço: <?php echo htmlspecialchars($user_address); ?></li>
                            <li>E-mail: <?php echo htmlspecialchars($user_email); ?></li>
                            <li>Telefone: <?php echo htmlspecialchars($user_phone); ?></li>
                        </ul>
                        <button>Alterar informações</button>
                    </div>

                    <!-- pagamento -->
                    <div class="pag-box">
                        <h1>Pagamento</h1>

                        <img class="img-card" src="src/img/visa.svg" />
                        <img class="img-card" src="src/img/mastercard.svg" />
                        <img class="img-card" src="src/img/elo.svg" />

                        <form id="form-cartao" action="process_payment.php" method="POST">
                            <label>Nome Impresso no Cartão</label>
                            <input type="text" name="card_name" placeholder="Nome Impresso no Cartão" required />

                            <label>Número do Cartão</label>
                            <input class="cartao-required" name="card_number" type="text" placeholder="Número do Cartão" required />
                            <span class="span-required"></span>
                            
                            <label>CVV</label>
                            <input class="cartao-required" name="cvv" type="text" placeholder="CVV" required />
                            <span class="span-required"></span>

                            <label>Validade</label>
                            <select name="expiry_month" required>
                                <option value="">Mês</option>
                                <option value="01">Jan</option>
                                <option value="02">Fev</option>
                                <option value="03">Mar</option>
                                <option value="04">Abr</option>
                                <option value="05">Maio</option>
                                <option value="06">Jun</option>
                                <option value="07">Jul</option>
                                <option value="08">Ago</option>
                                <option value="09">Set</option>
                                <option value="10">Out</option>
                                <option value="11">Nov</option>
                                <option value="12">Dez</option>
                            </select>

                            <select name="expiry_year" required>
                                <option value="">Ano</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                            </select>

                            <button id="cartaoBtn" type="submit">Finalizar Compra</button>
                        </form>
                    </div>
                </div>

                <div class="right">
                    <!-- carrinho -->
                    <div class="car-box">
                        <h1>Carrinho</h1>

                        <ul id="preview_produtos">
                            <?php foreach ($cart_items as $item): ?>
                                <li>
                                    <span><?php echo htmlspecialchars($item['name']); ?></span>
                                    <span><?php echo htmlspecialchars($item['quantity']); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- total -->
                    <div class="total-box">
                        <h1>Total</h1>
                        <ul>
                            <li>
                                <span>subtotal</span>
                                <span id="valor_produto">R$<?php echo number_format($subtotal, 2, ',', '.'); ?></span>
                            </li>
                            <li>
                                <span>frete</span>
                                <span>R$5,00</span>
                            </li>
                            <li class="total_total">
                                <span>total</span>
                                <span id="total">R$<?php echo number_format($total, 2, ',', '.'); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
    </main>
    
    <script src="assets/js/script.js"></script>
    <script src="assets/js/carrinho.js"></script>
    <script src="assets/js/checkout.js"></script>
</body>

</html>
