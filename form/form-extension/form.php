<?php
    if(isset($_POST['submit'])){

        error_reporting(0);

        $username=$_POST['username'];
        $username=filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
        $password=$_POST['password'];
        $pizzaSize=$_POST['pizza-size'];
        $topping=$_POST['topping'];
        $extras=$_POST['extras'];

        if(empty($username) || empty($password) ||empty($pizzaSize) ||empty($topping) ||empty($extras)){
            echo "<h2>Please enter all the required values.</h2>";
        }
        else{
            echo "<h2>Thank you for your order: </h2></br>";
            echo "Customer Id: <strong>$username</strong> </br>";
            echo "Your Order: <strong>$pizzaSize $topping</strong> </br>";
            
            echo "Extra Toppings: ";
            foreach($extras as $extra){
                echo "<strong>$extra</strong> ";
            }
        }

    }
?>