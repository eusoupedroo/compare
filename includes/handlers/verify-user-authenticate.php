<?php 

function verifyUserAuthenticate(){    
    if (!isset($_SESSION["userLoggedIn"])) {
        header("Location: register.php");
        exit();
    } 
    
    return $_SESSION["userLoggedIn"];
}

verifyUserAuthenticate($_SESSION["userLoggedIn"]);

$userLoggedIn = verifyUserAuthenticate();
$userObject = new User($con, $userLoggedIn);


?>