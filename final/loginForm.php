<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="styles/login/login.css">

    <title>Login</title>
</head>
<body>

    <?php
    
        include 'navbar.php';
    
    ?>

    <div class="container shadow-sm p-3 mb-5 bg-white rounded">
    
        <form action="loginUser.php" method="POST">

            <h2>Sign In</h2>

            <div class="form-group">

                <input class="form-control" type="email" id="email" name="email" placeholder="Email">
                <br>
                <input class="form-control" type="password" id="password" name="password" placeholder="Password">

                <?php
                
                    if(isset($_SESSION['loginError'])){
                        echo "<div class='alert alert-danger' role='alert'>
                            $_SESSION[loginError]
                        </div>";
                    }

                    if(isset($_SESSION['registerSuccess'])){
                        echo "<div class='alert alert-success' role='alert'>
                            $_SESSION[registerSuccess]
                        </div>";
                    }
                
                ?>

                <input class="btn btn-primary" type="submit" value="Log In" name="submit">
                <br>

                <span class="register-link">Do not have an account? <a href="registerForm.php">Register Here.</a></span>

            </div>
        
        </form>
    
    </div>
    <!-- bootstrap javascript cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    
</body>
</html>