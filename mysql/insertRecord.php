<?php

    include 'connection.php';

    if(isset($_POST['submit'])){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];

        if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($gender) || empty($age)){
            echo "<h2 style='font-family:sans-serif; color:red; text-align:center;'>Please enter all the values</h2>";
        }
        else{
            $firstName=filter_var($firstName, FILTER_SANITIZE_SPECIAL_CHARS);
            $lastName=filter_var($lastName, FILTER_SANITIZE_SPECIAL_CHARS);
            $email=filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
            $password=filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
            $password=md5($password); // encrypting the password

            // sql queries and db entry
            $insertQuery = "INSERT INTO users(firstName, surname, email, password, gender, age) VALUES('$firstName', '$lastName', '$email', '$password', '$gender', $age)";
            mysqli_query($connection, $insertQuery);
            header('Location: http://localhost/wat2021/mysql/selectRecord.php');

        }

    }

?>