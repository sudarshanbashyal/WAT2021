<?php

    include 'init.php';

    if(isset($_POST['submit'])){

        $email = trim($_POST['email']);
        $password = md5($_POST['password']);

        // saving email to session
        $_SESSION['loginData']['email']=$email;

        if(empty($email) || empty($password)){
            $_SESSION['loginError']='Please fill in all the fields.';
            unset($_SESSION['registerSuccess']);
            header('Location: loginForm.php');
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['loginError']='Please make sure your email is correct.';
            unset($_SESSION['registerSuccess']);
            header('Location: loginForm.php');
        }
        else{

            $loginQuery = "SELECT * from users WHERE email='$email' AND password='$password'";
            $loginQueryResult = mysqli_query($connection, $loginQuery);

            // user does not exist
            if(mysqli_num_rows($loginQueryResult)==0){
                $_SESSION['loginError']='Invalid email or password.';
                unset($_SESSION['registerSuccess']);
                header('Location: loginForm.php');
            }
            else{

                unset($_SESSION['loginError']);
                // header('Location: loginForm.php');
                

                // save user to session
                foreach($loginQueryResult as $row){
                    $_SESSION['user'] = array("userName"=>$row['username'], "userId"=>$row['userId']);   
                }

                header('Location: products.php');

            }

        }
    }
    else{
        header('Location: products.php');
    }

?>