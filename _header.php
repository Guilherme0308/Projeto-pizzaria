<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_name ?><?php echo $page_title ?></title>
</head>
<body>
    <header>
            <a href="/" title="Página inicial"><img src="<?php echo $site_logo ?>" >
        <div class="search-container">
            <input type="text" placeholder="Pesquisar">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
        <ul class="nav">
            <li><a href="/index.html">Home</a></li>
            <li><a href="/cardapio.html">Cardápio</a></li>
            <li><a href="/fazer_pedido.html">Fazer Pedido</a></li>
            <li><a href="#">Contatos</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="/login.html" class="login">login</a></li>
            <li><a href="#" class="profile"><i class="fa fa-user"></i></a></li>
            <li><a href="#" class="cart"><i class="fa fa-shopping-cart"></i></a></li>
        </ul>

    </header>
    <section class="home-banner">
        <img src="/src/img/pizza-5107039_640.jpg" alt="Delicious pizza" class="banner">
        <img src="/src/img/logo_pizzaria.png" alt="Pizzeria logo" class="logo-banner">
        <button type="submit" class="banner-button">Fazer Pedido</button>
    </section>