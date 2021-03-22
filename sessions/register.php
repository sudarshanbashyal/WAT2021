<?php

    include 'init.php';

    if(isset($_POST['register'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            $_SESSION['registerError'] = "Please fill in all the credentials.";
            header('location: registerForm.php');
        }
        else{

            $username = filter_var(trim($username), FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);

            $hashedPassword = md5($password);
            $selectQuery = "SELECT * FROM users WHERE username='$username';";
    
            $result = mysqli_query($connection, $selectQuery);

            // check if the user exists
            if(mysqli_num_rows($result)>0){

                $_SESSION['registerError'] = "User with that username already exists.";
                header('location: registerForm.php');

            }
            else{
                
                $insertQuery = "INSERT into users(username, password) VALUES('$username', '$hashedPassword');";
                mysqli_query($connection, $insertQuery);
                unset($_SESSION['error']);
                header('location: sessions.php');

            }

        }

    }else{
        header('location: registerForm.php');
    }

?>