<?php

    include 'connection.php';
    $productId = $_GET['id'];

    if (isset($_POST['submit'])){
        
        $productName = $_POST['product-name'];
        $productPrice = $_POST['product-price'];
        $productImage = $_POST['product-image-name'];

        if(empty($productName) || empty($productPrice) || empty($productImage)){
            echo "<h2 class='error-message'>Please enter all the required values</h2>";
        }
        else{

            $updateQuery = "UPDATE products SET ProductName='$productName', ProductPrice=$productPrice, ProductImageName='$productImage' WHERE ProductId=$productId";
            mysqli_query($connection, $updateQuery);

            header("Location: http://localhost/wat2021/crud/displayProducts.php");

        }
    }
?>