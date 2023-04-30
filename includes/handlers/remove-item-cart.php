<?php 

if(!isset($_SESSION)){
  session_start();
}

if(isset($_POST['item'])){

  $itemID = $_POST['item'];
  echo $itemID;
  if(isset($_SESSION['itemList'])){

    $itemList = $_SESSION['itemList'];
    $index = array_search($itemID, $itemList);
    
    if($index !== false){
      unset($itemList[$index]);
      $_SESSION['itemList'] = array_values($itemList);
      print_r($_SESSION['itemList']);
      
    }
  }
}

?>
