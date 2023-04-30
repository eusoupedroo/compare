<?php
    include("config.php");
    include("includes/classes/User.php");
    include("includes/handlers/verify-user-authenticate.php");
?>



<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ops! Algo Deu Errado Por Aqui.</title>
        <!-- CSS Link -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        
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

        <main class="main">
            <section class="home">
                <div class="home__container container">
                    <div class="home__data">
                        <span class="home__subtitle">Ooooops!</span>
                        <h1 class="home__title">Algo inesperado aconteceu.</h1>
                        <p class="home__description">
                           Certifique-se de que você inseriu seu CEP corretamente, caso tenha feito, <br> pode ser que nenhum supermercado da sua região seja nosso parceiro.
                        </p>
                        <a href="index.php" class="home__button">
                            Retornar
                        </a>
                    </div>

                    <div class="home__img">
                        <img src="assets/images/image/ghost-img.png" alt="">
                        <div class="home__shadow"></div>
                    </div>
                </div>
            </section>
        </main>

        <!--=============== Menu Js ===============-->
        <script src="assets/js/scrollreveal.min.js"></script>
        <script src="assets/js/menu.js"></script>
        
    </body>
</html>