<?php 

if(isset($_POST["loginButton"])){

    $username = $_POST["loginUsername"];
    $password = $_POST["password"];

    $authenticationUser = $account->authenticateUser($username, $password);

    if($authenticationUser == true){
        $_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
    }
}

?>