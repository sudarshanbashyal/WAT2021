<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>

    <div class="container">
    
        <?php

            include 'init.php';
            error_reporting(0);

            echo "<form class='login-form' method='POST' action='register.php'>
                    <h2>Create an Account</h2>
                    <br>
                    
                    <label for='username'>Username</label>
                    <input type='text' id='username' name='username'>

                    <label for='password'>Password</label>
                    <input type='password' id='password' name='password'>

                    <input type='submit' value='register' name='register'>

                </form>";

            if(isset($_SESSION['registerError'])){
                echo "<strong class='error-message'>$_SESSION[registerError]</strong>";
            }

            echo "<br><br><strong><a href='registerForm.php'>Login to Account.</a></strong>";


        ?>
    
    </div>
    
</body>
</html>