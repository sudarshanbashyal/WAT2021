<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="urls.css">
    <link rel="stylesheet" href="../navStyle.css">
    <title>URLs and GET Requests</title>
</head>
<body>

    <?php
        
        include '../navbar/navbar.php';
    
    ?>

    <div class="container">

        <h1>Pick a Category</h1>
        <hr>

        <ul>
            <li><a href="urls.php?category=Films">Films</a></li>
            <li><a href="urls.php?category=Books">Books</a></li>
            <li><a href="urls.php?category=Music">Music</a></li>
        </ul>


        <?php
        
            if(isset($_GET['category'])){
                echo "<h2>Category is: $_GET[category]</h2>";
            }

        ?>
    </div>
    
    
</body>
</html>