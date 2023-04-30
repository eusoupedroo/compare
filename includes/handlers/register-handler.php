<?php 

if(isset($_POST["registerButton"])){

    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $emailUser = $_POST["emailUser"];
    $cepUser = $_POST["cepUser"];
    $addressUser = $_POST["addressUser"];
    $passwordUser = $_POST["passwordUser"];
    $confirmPasswordUser = $_POST["confirmPasswordUser"];

    $wasSuccessful = $account->register($username, $firstName, $lastName, $emailUser, $cepUser, $addressUser, $passwordUser, $confirmPasswordUser);

    if($wasSuccessful==true){
      $_SESSION['userLoggedIn'] = $username;
      header('Location:index.php');
    }

}

?>