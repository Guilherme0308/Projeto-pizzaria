<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/img/favicon.png">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title><?php echo $site_name; ?> .::. <?php echo $page_title; ?></title>
</head>

<body>
    <header>
        <div class="header-wrapper">
            <a href="./index.php" title="Página inicial">
                <img src="./src/img/logo_pizzaria.png" alt="Logo da Pizzaria" class="logo">
            </a>
            <button class="menu-toggle"><i class="fa fa-bars"></i></button>
        </div>
        <nav>
            <ul class="nav">
                <li><a href="./index.php" title="Início"><i class="fa-solid fa-house fa-fw"></i> Home</a></li>
                <li><a href="./cardapio.php" title="Cardápio"><i class="fa-solid fa-utensils fa-fw"></i> Cardápio</a></li>
                <li><a href="./sobre.php" title="Sobre"><i class="fa-solid fa-circle-info fa-fw"></i> Sobre</a></li>
                <?php if (isset($user)): ?>
                    <div class="header-user-info">
                    <?php 
// Define a default profile image URL
$default_photo_url = 'src/img/user.png'; 

// Check if user has a photo; if not, use the default image
$photo_url = !empty($user['photo']) ? htmlspecialchars($user['photo']) : $default_photo_url;
?>

    
<img src="<?php echo $photo_url; ?>" alt="User Photo" class="profile-image">
                    
</div>

<?php endif; ?>

                <li class="cart">
                    <a href="./carrinho.php" title="Carrinho"><i class="fa fa-shopping-cart cart-icon"></i>
                    <span class="cart-count"></span></a>
                </li>
            </ul>
        </nav>

        <div class="search-container">
            <input type="text" placeholder="Pesquisar..." aria-label="Pesquisar">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </header>