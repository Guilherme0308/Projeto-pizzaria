<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $site_name ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <header>
        <img src="/src/img/logo_pizzaria.png" alt="Logo da Pizzaria" class="logo">
   
        <ul class="nav">

            <li><a href="/index.php">Home</a></li>
            <li><a href="/cardapio.php">Cardápio</a></li>
            <li><a href="/fazer_pedido.h">Fazer Pedido</a></li>
            <li><a href="/contatos.html">Contatos</a></li>
            <li><a href="/sobre.html">Sobre</a></li>
            <li><a href="/login.php" class="login">Login</a></li>
            <li><a href="/profile.html" class="profile"><i class="fa fa-user"></i></a></li>
            <li class="cart">
                <a href="/carrinho.html"><i class="fa fa-shopping-cart cart-icon"></i>
                <span class="cart-count"></span></a>
            </li>
            <div class="search-container">
                <input type="text" placeholder="Pesquisar...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </ul>
        <button class="menu-toggle"><i class="fa fa-bars"></i></button>
    </header>