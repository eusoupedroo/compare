<?php 
    class Constants {

        // passwords fields error sections 
        public static $passwordNotAlphanumeric = "Por favor, informe na sua senha apenas caracteres alfanuméricos";
        public static $passwordCharacters = "Sua senha deve ter entre 5 e 30 caracteres";
        public static $passwordsDoNoMatch = "Senhas não conferem";


        // emails fields error sections 
        public static $emailInvalid = "E-mail não válido";
        public static $emailsDoNotMatch =  "Os e-mails informadas não são iguais";
        public static $emailTaken = "E-mail já esta sendo usado por outra conta";

        // first and last names error sections 
        public static $lastNameCharacters = "Seu ultimo nome deve conter entre 2 até 25 caracteres";
        public static $firstNameCharacters = "Seu primeiro nome deve conter entre 2 até 25 caracteres";
        
        // username error sections
        public static $usernameCharacters = "Seu nome de usuário deve conteer entre 2 até 25 caracteres";
        public static $usernameTaken = "Esse nome de usuário já está e uso por outra conta";

        // address error sections
        public static $addressUserTaken = "Endereço muito pequeno, especifique mais";

        // cep error sections
        public static $cepInvalidCharacters = "CEP deve possuir 8 dígitos";

        // login error sections
        public static $loginFailed = "Seu e-mail e/ou senha estão incorretos";

    }
?>