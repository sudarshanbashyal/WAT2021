<?php

    include 'init.php';

    if(isset($_POST['submit'])){
        
        // saving form data to php sessions
        foreach($_POST as $key=>$value){
            $_SESSION['post'][$key]=$value;
        }

        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $ageRange = $_POST['ageRange'];
        $checkbox = $_POST['checkbox'];

        if(empty($username) || empty($email) || empty($password) || empty($confirmPassword)){

            $_SESSION['registerError'] = 'Please fill in all the input forms.';
            header('Location: registerForm.php');

        }
        // checking if the ageRange is selected
        elseif(empty($ageRange)){

            $_SESSION['registerError'] = 'Please select your age range.';
            header('Location: registerForm.php');
        }
        // checking is the checkbox is selected
        elseif(empty($checkbox)){

            $_SESSION['registerError'] = 'You must agree to the terms and conditions to continue.';
            header('Location: registerForm.php');

        }
        //validating email
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['registerError'] = 'Please make sure your email is correct.';
            header('Location: registerForm.php');
        }
        else{
            // username at least 6 characters long
            if(strlen($username)<6){

                $_SESSION['registerError']='Your username must be at least 6 characters long.';
                header('Location: registerForm.php');

            }
            // check if password contains lowercase, uppercase and number
            elseif(!preg_match('/[A-Z]/',$password) || !preg_match('/[a-z]/',$password) || !preg_match('/[0-9]/',$password)){

                $_SESSION['registerError']='Your password must contain at least one uppercase letter, one lowercase letter and a number.';
                header('Location: registerForm.php');

            }
            // check if the passwords match
            elseif($password!==$confirmPassword){

                $_SESSION['registerError']='Your passwords do not match';
                header('Location: registerForm.php');

            }
            else{
                // check if the person with same email exists
                $emailQuery = "SELECT * FROM users WHERE email='$email'";
                $queryResult = mysqli_query($connection, $emailQuery);

                if(mysqli_num_rows($queryResult)!==0){
                    $_SESSION['registerError']='User with the email already exists';
                    header('Location: registerForm.php');
                }
                else{
                    unset($_SESSION['registerError']);

                    $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
                    $password = md5($password);
                    
                    $insertQuery = "INSERT INTO users(username, email, password, ageRange) VALUES('$username', '$email', '$password', '$ageRange')";
                    $insertReturnCall = mysqli_query($connection, $insertQuery);

                    if($insertQuery){
                        unset($_SESSION['loginError']);
                        header('Location: loginForm.php');
                        $_SESSION['registerSuccess']='Registered Successfully! You can now log in.';
                    }
                    else{
                        $_SESSION['registerError'] = 'Could not register. Please try again.';
                        header('Location: registerForm.php');
                    }
                }
            }
            
        }
        
    }
    else{
        header('Location: registerForm.php');
    }


?>