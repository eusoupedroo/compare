<?php 
include("config.php");
include("includes/classes/User.php");
include("includes/handlers/verify-cep-page.php");
include("includes/handlers/verify-user-authenticate.php");
include("includes/handlers/cart-content.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <title>Revise Aqui A Sua Lista De Desejos!</title>
    <!-- CSS Link Extension -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Jquery Link Extension -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <nav class="nav container">
            <a href="index.php" class="nav__logo">
                COMPARE
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link">Ínicio</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link" onclick="logout()">Sair Da Conta</a>
                    </li>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>
            <div class="cart">
                <a href="verifyListOrder.php">
                    <img src="assets/images/icons/cart.png" alt="">
                </a>
            </div>
        </nav>
    </header>
    
    <!-- Items Query List -->
    <div class="wrapper indexPage">
        <div class="wrapper">
            
            <div class="mainSection">
            
                <div class="textContainer">
                    <img src="assets/images/icons/bag.png" alt="">
                    <h2>Adicione aqui os produtos da sua lista</h2>
                    <span>
                        <?php
                            echo "Nós iremos buscar dentro de todos os supermercados de {$city}, aquele que atende todos os requisitos da sua lista com o menor preço.";
                        ?>
                    </span>   
                </div>

                <div class="searchContainerItem">
                    <form action="shopping_list.php" method="POST" id="addItemForm">
                        <input class="searchBox" type="text" name="itemList" id="itemList" placeholder="Pesquise alguma mercadoria: Arroz, Feijão, Macarrão, Chocolate">
                        <button type="submit" name="increaseItemButton" id="increaseItemButton" class="button">Adicionar carrinho</button>
                    </form>
                </div>
            
                <div id="suggestion-box"></div>
            </div>
        </div>
    </div>

    <!--  JS Script File -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/menu.js"></script>


</html>