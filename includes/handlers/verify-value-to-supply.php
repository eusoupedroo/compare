<?php 

$value = isset($_GET['valueToSupply']) ? validateValue($_GET['valueToSupply']) : "Nenhum valor encontrado";


function validateValue($value){
    if(is_numeric($value)){
        return $value;
    } else { echo "Inválido"; }
}


?>