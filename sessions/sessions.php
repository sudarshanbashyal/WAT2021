<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <?php

            include 'init.php';
            error_reporting(0);

            if(!$_SESSION['user']){

                include('loginform.php');

            }
            else{

                echo "<h1>Welcome, ".$_SESSION['user']."!</h1>";

                echo '<form action="logout.php" method="POST" class="logout-form">
                        <input type="submit" value="Logout" name="logout">
                        <a class="protected-link" href="protected.php">Go to Protected Page</a>
                    </form>';

            }

        ?>

    </div>

</body>
</html>