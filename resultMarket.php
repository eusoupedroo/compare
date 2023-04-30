<?php

$html = '';

include("config.php");
include("includes/classes/Market.php");
include("includes/classes/User.php");
include("includes/handlers/verify-user-authenticate.php");
include("includes/handlers/cart-content.php");
include("includes/handlers/remove-item-cart.php");


$cep = isset($_SESSION['cep']) ? $_SESSION['cep'] : "CEP não encontrado";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encontramos Os Melhores Resultados Para Você</title>
    <!-- Jquery Link Extension -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <!-- CSS Link Extension -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-rv7QbR9D5bZV5BH5qs0jJ6UaP6rQIFyUbw0AXdoJTFKuItF9Uf7ZWy/v+Bdrjw6JN+6PPIr/hwnzkmnFJzbGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body id="resultMarket">
    
    <!-- NavBar Section -->
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

    <div class="gridViewContainer">
        <h2>Encontramos os melhores resultados para você</h2>
        <?php 

            if(isset($_SESSION['itemList'])){
                $query_products = "

                    SELECT round(SUM(p.priceProduct),2) as 'priceProduct', p.marketId 
                    FROM products p 
                    INNER JOIN market m ON p.marketId = m.id 
                    WHERE p.titleProduct in ('" . implode("', '", $_SESSION['itemList']) .  "') AND
                    m.marketCepAddress in ($cep)
                    GROUP BY m.id 
                    ORDER BY p.priceProduct             
                
                ";
                $sql = mysqli_query($con, $query_products);
                if(mysqli_num_rows($sql) > 0 ){

                    while($row = mysqli_fetch_assoc($sql)){
                        $marketObject = new Market($con, $row['marketId']);

                            echo "
                                    <div class='container'>
                                        <div class='card dark'>
                                            <img src='" . $marketObject->getProfilePictureMarket() . "' class='card-img-top'>
                                            <div class='card-body'>
                                            <div class='text-section'>
                                                <h5 class='card-title'>"
                                                                                . $marketObject->getMarketName() .
                                                                            "</h5>
                                                <p class='card-text'>Rua Eugênio De Bona Castelan, 790.</p>
                                            </div>
                                            <div class='cta-section'>
                                                <div></div>
                                                <a href='#' class='btn btn-light'> R$ " .$row['priceProduct']. "</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                ";
                    }
                }
            }
        ?>
    </div>

    <!-- Js Extensions Files -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/menu.js"></script>
</body>
</html>