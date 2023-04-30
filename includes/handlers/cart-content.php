<?php 

if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['itemList'] = array();
  $items = $_POST['itemList'];
  $_SESSION['itemList'] = $items;
}



?>