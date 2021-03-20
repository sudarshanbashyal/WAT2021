<div class="container products-container">

    <?php
    
        if(isset($_SESSION['products'])){
            foreach($_SESSION['products'] as $product){
                echo 
                "<div class='product-display'>
                    <div class='product-image'>
                        <img src='$product[productImage]'>
                    </div>
                    <span class='product-category'>$product[productCategory]</span><br>
                    <span class='product-name'>$product[productName]</span><br>
                    <span class='text-success product-price'>&pound;$product[productPrice]</span>
                </div>";

                echo "<br>";
            }
        }
        elseif(isset($_SESSION['productError'])){
            echo "<div class='alert alert-warning' role='alert'>
                $_SESSION[productError];
            </div>";
        }
    
    ?>

</div>