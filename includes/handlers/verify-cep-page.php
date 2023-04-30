<?php 

$cepNumber = isset($_GET["cep"]) ? $_GET["cep"] : null;
$GLOBALS["cepNumber"] = $cepNumber;

function redirectUser(){
    header("Location: index.php");
    exit();
}

function sanitizeCEP(){
    $cep = $GLOBALS["cepNumber"];
    $cep = str_replace(" ","", $cep);
    $cep = str_replace("-","", $cep);
    $cep = preg_replace("/[^0-9]/", "", $cep);

    if(strlen($cep) != 8 ){
        header("Location: errorCep.php");
        exit();
    }

    $_SESSION['cep'] = $cep;
    return verifyCepExists($cep);
}

function verifyCepExists($cepNumber){
    global $con;
    $query = mysqli_query($con, "SELECT * FROM market WHERE marketCepAddress LIKE '$cepNumber' ");
    if(mysqli_num_rows($query) == 0){
        header("Location: errorCep.php");
        exit();
    } 

    return displayCityCep($cepNumber);
}
function displayCityCep($cepNumber){
    $url = "https://viacep.com.br/ws/{$cepNumber}/json/";
    $resultsURL = json_decode(file_get_contents($url));
    $city = $resultsURL->localidade;
    return $city;  
}

$GLOBALS["city"] = sanitizeCEP() ?: redirectUser();
