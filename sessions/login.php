<?php

    error_reporting(0);

    include 'init.php';
    session_start();

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            $_SESSION['error'] = "Please fill in all the credentials.";
            header('location: sessions.php');
        }
        else{

            $username = filter_var(trim($username), FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);

            $hashedPassword = md5($password);
            $insertQuery = "SELECT * FROM users WHERE username='$username' AND password='$hashedPassword'";
    
            $result = mysqli_query($connection, $insertQuery);

            // check if the user exists
            if(mysqli_num_rows($result)==0){

                $_SESSION['error'] = "Invalid Email or Password. Please try again.";
                header('location: sessions.php');

            }
            else{
                
                foreach($result as $user){

                    $_SESSION['user']=$user['username'];
                    $_SESSION['error']="";
                    header('location: sessions.php');

                }

            }

        }

    }

?>