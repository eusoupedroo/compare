<?php
    include("config.php");
    include("includes/classes/User.php");
    include("includes/handlers/verify-user-authenticate.php");
    $cep = $userObject->getCEP();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare - Seu Melhor Buscador Online de Ofertas Em Supermercados E Postos De Gasolina</title>
    <!-- CSS Link -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- Jquery Link Extension -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

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

    <!-- Main Container -->
    <div class="wrapper indexPage">
        <div class="mainSection">
            <div class="logoContainer">
                <img src="assets/images/logo/logo.png">
            </div>

            <div class="searchContainer">
                <form action="shopping_list.php" method="GET">
                    <input class="searchBox" type="text" name="cep" placeholder="Digite seu CEP">
                    <input class="button" type="submit" value="buscar">
                    <input class="buttonTransparent" type="submit" onclick="useRegisterCep()" value="gostaria de usar o cep do seu cadastro ?">
                </form>
            </div>

        </div>
    </div>

    <script>
        function useRegisterCep() {
            var cep = <?php echo json_encode($cep); ?>;
            document.getElementsByName('cep')[0].value = cep;
            document.forms[0].submit();
        }
    </script>

     <!-- Js Extensions Files -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/menu.js"></script>
</body>

</html>