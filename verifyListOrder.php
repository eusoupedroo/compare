<?php
include("config.php");
include("includes/classes/User.php");
include("includes/handlers/verify-user-authenticate.php");
include("includes/handlers/cart-content.php");
include("includes/handlers/remove-item-cart.php");

$itemList = isset($_SESSION['itemList']) && $_SESSION['itemList'] ? $_SESSION['itemList'] : array();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Lista De Compras</title>

    <link rel="stylesheet" href="assets/css/style.css">
     <!-- Jquery Link Extension -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body id="verifyOrder.php">
    
    <!-- Header Section -->
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
        </nav>
    </header>


    <!-- Content Page Section -->
    <div class="mainContainer">
            <div class="headerContent">
                <h2>
                    Revise aqui sua lista de compras
                </h2>
            </div>
        <div class="mainSection">
            <div class="tracklistContainer">
                <ul class="tracklist">
                    
                    <?php
                        $counter = 0;
                        if (isset($_SESSION['itemList']) && !empty($_SESSION['itemList'])) {
                            foreach (array_unique($itemList) as $item) {
                                echo "
                                    <li class='tracklistRow'>
                                        <div class='trackCount'>
                                            <input type='number' value='1'>
                                        </div>

                                        <div class='trackInfo'>
                                            <span class='trackName'>" . $item . "</span>
                                        </div>
                                        
                                        <div class='trackOptions'>
                                            <img src='assets/images/icons/delete.png' name='$item'>
                                        </div>
                                    </li>
                                ";
                                $counter = $counter + 1;
                            }
                        }                        
                    ?>

                </ul>
            </div>
            
            <!-- Content Page Section -->
            <div class="confirmListOrder">
                <button class="button">
                    <a href="resultMarket.php" class="searchPricesLink">
                        Confirmar Lista
                    </a>
                </button>
            </div>
        </div>
    </div>

    <!-- Javascript File -->
    <script type="text/javascript" src="assets/js/script.js"></script>   
</body>
</html>