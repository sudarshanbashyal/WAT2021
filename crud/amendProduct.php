<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/amendProduct.css">
    <title>Product Details</title>
</head>
<body>
    
    <?php
        include 'navbar.php';
    ?>

    <?php
        include 'connection.php';
        $productId = $_GET['id'];
        $selectQuery = "SELECT * FROM products WHERE ProductId=$productId";
        $response = mysqli_query($connection, $selectQuery);

        $productName = "" ;
        $productPrice = "";
        $productImage = "";
        
        foreach($response as $product){
            $productName=$product['ProductName'];
            $productPrice=$product['ProductPrice'];
            $productImage=$product['ProductImageName'];
        }

    ?>

    <div class="container">
        <form action="updateProduct.php?id=<?php echo "$productId" ?>" method="POST" class='amend-form'>

            <div class="product-image-container">
                <img src="images/<?php echo "$productImage.jpg" ?>" alt="">
            </div>

            <div class="form-inputs">
                <input type="text" placeholder="Product Name" name="product-name" value="<?php echo $productName ?>" required>
                <input type="number" step="0.0001" placeholder="Product Price" name="product-price" value="<?php echo $productPrice ?>" required>
                <input type="text" placeholder="Product Image Name" name="product-image-name" required>
                <input type="submit" name="submit" value="Update">
                <input type="reset" name="reset" value="Clear">
            </div>

        </form>

    </div>

</body>
</html>