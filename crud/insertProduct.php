<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/insertProduct.css">
    <title>Add Product</title>
</head>
<body>

    <?php
        include 'navbar.php';
    ?>

    <div class="container">

        <form method="POST">

            <h2>Enter product Details: </h2>


            <input type="text" placeholder="Product Name" name="product-name" required>
            <input type="number" step="0.0001" placeholder="Product Price" name="product-price" required>
            <input type="text" placeholder="Product Image Name" name="product-image-name" required>
            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Clear">

        </form>

        <?php

            include 'connection.php';

            if(isset($_POST['submit'])){
                
                $productName = $_POST['product-name'];
                $productPrice = $_POST['product-price'];
                $productImageName = $_POST['product-image-name'];

                if(empty($productName) || empty($productPrice) || empty($productImageName)){
                    echo "<h2 class='error-message'>Please insert all the values</h2>";                    
                }
                else{
                    // sanitize input values
                    $productName = filter_var(trim($productName), FILTER_SANITIZE_SPECIAL_CHARS);
                    $productName = filter_var(trim($productImageName), FILTER_SANITIZE_SPECIAL_CHARS);

                    // make insert request to the database
                    $addQuery = "INSERT INTO products(ProductName, ProductPrice, ProductImageName) VALUES('$productName', $productPrice, '$productImageName');";
                    mysqli_query($connection, $addQuery);

                    // redirect to the home page
                    header("Location: http://localhost/wat2021/crud/displayProducts.php");
                }

            }

        ?>

    </div>
    
</body>
</html>