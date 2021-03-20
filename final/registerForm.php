<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="styles/register/registerForm.css">

    <title>Register An Account</title>
</head>
<body>

    <?php
    
        include 'navbar.php';
    
    ?>

    <div class="container shadow-sm p-3 mb-5 bg-white rounded">
    
        <form action="registerUser.php" method="POST">

            <h3>Create an Account</h3>

            <div class="form-group">

                <div class="row">
                
                    <div class="col">
                        <input placeholder="Username" class="form-control" type="text" name="username" id="username" value="<?php echo isset($_SESSION['post']['username'])?$_SESSION['post']['username']:'' ?>">
                    </div>

                    <div class="col">
                        <input placeholder="Email Address" class="form-control" type="email" name="email" id="email" value="<?php echo isset($_SESSION['post']['email'])?$_SESSION['post']['email']:'' ?>">
                    </div>
                    <br>
                
                </div>
               
                <div class="row">

                    <div class="col">
                        <input placeholder="Password" class="form-control" type="password" id="password" name="password">
                    </div>

                    <div class="col">
                        <input placeholder="Confirm Password" class="form-control" type="password" id="confirm-password" name="confirmPassword">
                    </div>
                    <br>

                </div>
                
                <select name="ageRange" id="age-range" class="form-control">
                    <option selected disabled>Please select your age range.</option>
                    <option <?php echo (isset($_SESSION['post']['ageRange'])&&$_SESSION['post']['ageRange']=='child')?'selected':'' ?> value="child">12 or younger</option>
                    <option <?php echo (isset($_SESSION['post']['ageRange'])&&$_SESSION['post']['ageRange']=='teen')?'selected':'' ?> value="teen">13 to 19</option>
                    <option <?php echo (isset($_SESSION['post']['ageRange'])&&$_SESSION['post']['ageRange']=='adult')?'selected':'' ?> value="adult">20 to 45</option>
                    <option <?php echo (isset($_SESSION['post']['ageRange'])&&$_SESSION['post']['ageRange']=='elderly')?'selected':'' ?> value="elderly">45 or older</option>
                </select>
                <br><br>

                <input type="checkbox" id="checkbox" name="checkbox" class="form-check-input">
                <label id="checkbox-label" for="checkbox">I agree to the terms and conditions.</label>
                <br>
                <?php
                
                    if(isset($_SESSION['registerError'])){
                        echo "<div class='alert alert-danger' role='alert'>
                            $_SESSION[registerError]
                        </div>";
                    }
                
                ?>

                <input class="btn btn-primary" type="submit" name="submit" value="Register">
                <br>

                <span>Alreay have an account? <a href="loginForm.php">Login Here.</a></span>

            </div>            

        </form>
    
    </div>

    <!-- bootstrap javascript cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
</body>
</html>