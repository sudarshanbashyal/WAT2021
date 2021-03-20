<?php

    include 'init.php';

    if(!isset($_SESSION['user'])){
        header('Location: loginForm.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="styles/products/products.css">
    <title>Products</title>
</head>
<body>

    <?php
    
        include 'navbar.php';
    
    ?>

    <div class="container">

        <?php

            $products=array();
            $productQuery = '';

            if(isset($_GET['search'])){
                
                $searchQuery = $_GET['searchQuery'];
                $category='';
                $sort='';

                if(isset($_GET['category'])) $category=$_GET['category'];
                if(isset($_GET['sort']) && $_GET['sort']!==''){ 
                    $sort=$_GET['sort'];
                    $productQuery="SELECT * FROM products WHERE productName LIKE '%$searchQuery%' AND productCategory LIKE '%$category%' ORDER BY $sort";
                }
                else{
                    $productQuery="SELECT * FROM products WHERE productName LIKE '%$searchQuery%' AND productCategory LIKE '%$category%'";
                }
                
                // set search queries to session
                
                $products= mysqli_query($connection,$productQuery);

                if(mysqli_num_rows($products)==0){
                    unset($_SESSION['products']);
                    $_SESSION['productError']="No products found. Please try again.";
                }
                else{
                    $_SESSION['products']=$products;
                }

                // storing search queries in session
                $_SESSION['search']['query']=$searchQuery;
                $_SESSION['search']['category']=$category;
                $_SESSION['search']['sort']=$sort;

            }
            else{

                // unset search sessions
                unset($_SESSION['search']['query']);
                unset($_SESSION['search']['category']);
                unset($_SESSION['search']['sort']);

                $productQuery='SELECT * from products';
                $products= mysqli_query($connection,$productQuery);

                if(mysqli_num_rows($products)==0){
                    $_SESSION['productError']="No products found. Please try again.";
                    unset($_SESSION['products']);
                }
                else{
                    $_SESSION['products']=$products;
                }
                
            }  

        ?>

        <?php
        
            include 'searchForm.php';
            include 'displayProducts.php';

        ?>
    
    </div>

    <!-- bootstrap javascript cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
</body>
</html>