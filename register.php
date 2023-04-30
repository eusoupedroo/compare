<?php 
include("config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse, Crie Sua Conta</title>

    <!-- CSS Link -->
    <link rel="stylesheet" href="assets/css/register.css">
    <!-- JQuery Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- JS Link -->
    <script src="assets/js/register.js"></script>
        
</head>
<body>

<!-- The default form is the login form -->
<?php 
    if(isset($_POST["registerButton"])){
        echo '
            <script>
                $(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
            </script>

        '; } else {

        echo '
            <script>
                $(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
            </script>
        ';
    }
?>

    <div class="mainSectionContainer">
        <!-- Header Section -->
        <div class="headerContainer">
            <div class="headerContent">
                <a href="index.php">
                    <img src="assets/images/logo/logo.png"  alt="logo">
                </a>
                <span>
                    Nosso objetivo com esse site é construir um ranking de supermercados da sua cidade mostrando do menor até o maior preço á partir da sua lista de compras
                </span>
            </div>
        </div>

        <!-- Form Login Section -->
        <div class="loginContainer">
            <div class="loginContent">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>
                        Acessar sua conta
                    </h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <input type="text" name="loginUsername" id="loginUsername" placeholder="Username">
                    </p>
                    <p>
                        <input type="password" name="password" id="password" placeholder="Senha">
                    </p>
                    <button type="submit" name="loginButton">Entrar</button>
                    <div class="doNotHaveAccount">
                        <span id="hideLogin">
                            Ainda não tenho uma conta
                        </span>
                    </div>
                </form>

            </div>
        </div>  

        <!-- Form Register Section -->
        <div class="registerContainer">
            <div class="registerContent">                
                <form id="registerForm" action="register.php" method="POST">
                    <h2> Junte-se a nós </h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
                        <input type="text" name="username" id="username" placeholder="Crie um nome de usuário" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <input type="text" name="firstName" id="firstName" placeholder="Primeiro Nome" required>
                    </p>
                    
                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <input type="text" name="lastName" id="lastName" placeholder="Último Nome" required>
                    </p>
                    
                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
                        <input type="email" name="emailUser" id="emailUser" placeholder="E-mail" required>
                    </p>
                    
                    <p>
                        <?php echo $account->getError(Constants::$cepInvalidCharacters); ?>
                        
                        <input type="text" name="cepUser" id="cepUser" placeholder="Código Postal (CEP)" required>
                    </p>
                    
                    <p>
                        <?php echo $account->getError(Constants::$addressUserTaken); ?>
                        <input type="text" name="addressUser" id="addressUser" placeholder="Endereço" required>
                    </p>
                    
                    <p>
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
                        <input type="password" name="passwordUser" id="passwordUser" placeholder="Senha" required>
                    </p>
                    
                    <p>

                        <input type="password" name="confirmPasswordUser" id="confirmPasswordUser" placeholder="Confirmar Senha" required>
                    </p>
                    
                    <button type="submit" name="registerButton">cadastrar-me</button>
                    
                    <div class="haveAccount">
                        <span id="hideRegister">
                            Já possui uma conta ? Clique aqui
                        </span>
                    </div>
                </form>

            </div>
        </div> 

    </div>

</body>
</html>