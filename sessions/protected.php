<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <?php

            error_reporting(0);

            include('init.php');
            session_start();

            if($_SESSION['user']){
                echo "<h1>This is a protected page.</h1>";

                echo '<form action="logout.php" method="POST" class="logout-form">
                        <input type="submit" value="Logout" name="logout">
                    </form>';

            }
            else{

                header('location: sessions.php');

            }

        ?>
    </div>
    
</body>
</html>