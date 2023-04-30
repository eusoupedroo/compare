<?php 
include("config.php");
include("includes/classes/User.php");
include("includes/handlers/verify-user-authenticate.php");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <!-- Jquery Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
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
   
    <!-- Main Container -->
   <div class="mainContentSectionPage">
        <div class="menuOptions">
            <div class="UsernameHeader">
                <h2> Olá, 
                    <?php 
                        echo $userObject->getFirstName();
                    ?>
                </h2>

                <span>
                    Dentro do menu abaixo você pode editar seus dados, sair da conta e até verificar o histórico de suas compras já feitas pela plataforma
                </span>
            </div>

            <div class="optionsMenu">
                <button class="button">
                    <a href="userInformationPage.php">
                        Editar Dados
                    </a>
                </button>
                <button class="button">
                    <a href="#">
                        Histórico de Compras
                    </a>
                </button>
                <button class="button" onclick="logout()">
                    <a href="#">
                        Sair 
                    </a>
                </button>
            </div>
        </div>
   </div>

    <!-- JS Link -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/menu.js"></script>
        
        

</body>
</html>