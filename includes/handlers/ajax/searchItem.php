<?php 
include("../../../config.php");


if (isset($_POST['product'])) {
    $item = $_POST['product'];

    
    $query_item = mysqli_query($con, "SELECT * FROM products WHERE titleProduct LIKE '%$item%' ");
    $data = array();
    while ($row = mysqli_fetch_assoc($query_item)) {
        $data[] = $row['titleProduct'];
    }
    echo json_encode(array_unique($data));
}
?>