<?php
    include 'connection.php';

    $productId = $_GET['id'];
    $deleteQuery = "DELETE FROM products WHERE ProductId=$productId";

    mysqli_query($connection, $deleteQuery);
    header("Location: http://localhost/wat2021/crud/displayProducts.php");
?>