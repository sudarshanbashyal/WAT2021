<?php
    // error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP Fundamentals</title>
</head>
<body>

    <div class="container">

        <h2>php fundamentals</h2>
    
        <?php  

            // printing the current day
            echo "<strong>Current Day: </strong>";

            $day = date('l');
            echo "<h3>It's $day</h3>";

            echo "<hr>";

            // checking if the today is midweek
            echo "<strong>Is today a midweek?</strong>";

            if($day=='Wednesday'){
                echo "<h3>Today is midweek.</h3>";
            }
            else{
                echo "<h3>Today is not midweek.</h3>";
            }

            echo "<hr>";

            // checking the current time
            echo "<strong>Time of day:</strong>";

            $currentTime = date("H");

            if($currentTime<12){
                echo "<h3>Good Morning!</h3>";
            }
            else if($currentTime>12 && $currentTime<18){
                echo "<h3>Good Afternoon! ($currentTime)</h3>";
            }
            else{
                echo "<h3>Good Night!!</h3>";
            }

            echo "<hr>";

            // password length validator
            echo "<strong>Password Validator:</strong><div class='password-validator'>";

            $password = 'password';
            
            if(strlen($password)>10 || strlen($password)<4){
                echo "<div><h3>Current Password: '$password'</h3>";
                echo "<strong style='color:red'>Password Length is Invalid.</strong></div>";
            }
            else{
                echo "<div><h3>Current Password: '$password'</h3>";
                echo "<strong style='color:green;'>Password Length is Valid.</strong></div>";
            }

            // password output validator
            $wordPassword = 'username';
            if(strtolower($wordPassword)=='username' || strtolower($wordPassword)=='password'){
                echo "<div><h3>Current Password: '$wordPassword'</h3>";
                echo "<strong style='color:red'>Invalid Password (Cannot be 'username' or 'password').</strong></div>";
            }
            else{
                echo "<div><h3>Current Password: '$wordPassword'</h3>";
                echo "<strong style='color:green;'>Valid Password.</strong></div>";
            }

            echo "</div><hr>";

            // ticket discount calculator
            echo "<strong>Ticket Discount Calculator:</strong>";

            $initialTicketPrice = 25;
            $discount;
            $membershipDiscount = 10;
            $isMember = true;
            $age=15;

            // calculating discount based on age
            if($age<12) $discount = 50;
            else if($age>12 && $age<18) $discount=25;
            else if($age>65) $discount=25;
            else $discount=25;

            // increasing discount is member
            if($isMember) $discount+=10;

            $finalTicketPrice = $initialTicketPrice - ($discount/100)*$initialTicketPrice;
            
            echo "<div class='ticket-calculator'><h3>Initial Ticket Price: €$initialTicketPrice</h3>";
            echo "<h3>Age: $age</h3>";
            echo "<h3>Member:";
            if ($isMember) echo "Yes"; 
            else echo "No";  
            echo "</h3>";
            echo "<h3>Final Ticket Price: €$finalTicketPrice</h3></div>";

            echo "<hr>";

        ?>

        <h2>Arrays</h2>

        <?php
        
            // simple arrays
            echo "<strong>Simple Array:</strong>";
            $products = array('t-shirt','cap','mug');
            echo "<h3>";
            print_r ($products);
            echo "</h3>";

            // overriding array element
            $products[1]='shirt';
            echo "<h3>";
            print_r ($products);
            echo "</h3>";

            // adding element to end of array
            array_push($products, 'skirt');
            echo "<h3>";
            print_r ($products);
            echo "</h3>";

            for($i=0;$i<sizeof($products);$i++){
                echo "<h3>The item at index[$i]: $products[$i]</h3>";
            }

            echo "<hr>";

            // associative arrays
            echo "<strong>Associative Array:</strong>";

            $customer = array("CustName"=>"Sarah","CustAge"=>23,"CustGender"=>"F");
            echo "<h3>";
            print_r ($customer);
            echo "</h3>";

            // modifying array
            $customer['CustAge']=30;
            $customer['CustEmail']='sarah@gmail.com';
            echo "<h3>";
            print_r ($customer);
            echo "</h3>";

            echo "<hr>";

            // Multidimensional arrays
            echo "<strong>Multidimensional Array:</strong>";
            $stock = array(
                "id1"=>array("description"=>"t-shirt", "price"=>9.99, "stock"=>100, "colour"=>array("blue", "green", "red")), 
                "id2"=>array("description"=>"cap", "price"=>4.99, "stock"=>50, "colour"=>array("blue", "black", "gray")), 
                "id3"=>array("description"=>"mug", "price"=>6.99, "stock"=>30, "colour"=>array("yellow", "green", "pink"))
            );

            echo "<h3>My Order:</h3>";
            echo "<div class='products'>";

            foreach($stock as $product=>$product_value){
                echo "<div class='product'>";
                echo "<h3>".$product_value["colour"][0]." ".$product_value["description"]."</h3>";
                echo "<h3>Price: €".$product_value["price"]."</h3>";
                echo "</div>";
            }

            echo "</div>";
            echo "<hr>";
        
        ?>

        <h2>Loops</h2>
        <?php
        
            // While Loops
            echo "<strong>While Loops:</strong>";
            $counter=1;
            while($counter<6){
                echo "<em>Counter = $counter</em><br>";
                $counter++;
            }

            $shirtPrice = 9.99;
            $counter=1;

            echo "<strong style='margin-top:20px;'>Shirt Prices:</strong>";
            echo "
                <table border='1' class='quantity-table'>
                <thead>
                    <tr>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead><tbody>";

            while($counter<=10){
                echo "<tr>";
                echo "<td>$counter</td>";
                echo "<td>€".$counter*$shirtPrice."</td>";
                echo "</tr>";
                $counter++;
            }
            echo "</tbody></table>";

            echo "<hr>";

            // for loop
            echo "<strong>For Loops:</strong>";
            $names = array('Peter','Kat','Laura','Ali','Popacatapetal');
            
            echo "<div class='for-loop'>";
            for ($i=0;$i<sizeof($names);$i++){
                echo "<h3>$names[$i]</h3>";
            }
            echo "</div>";

            echo "<hr>";

            // foreach loop
            echo "<strong>Foreach Loops:</strong>";
            $names = array(
                array("Name"=>"Peter", "ID"=>"C123456"),
                array("Name"=>"Kat", "ID"=>"C234567"),
                array("Name"=>"Laura", "ID"=>"C149181"),
                array("Name"=>"Ali", "ID"=>"C816501"),
                array("Name"=>"Popacatapetal", "ID"=>"C7195919")
            );

            echo "<div class='for-loop'>";
                foreach($names as $name){
                    echo "<div>";
                    echo "<h3>Name: ".$name["Name"]."</h3>";
                    echo "<h3>ID: ".$name["ID"]."</h3>";
                    echo "</div>";
                }
            echo "</div>";

            echo "<hr>";

            // foreach loop
            echo "<strong>Foreach (cities):</strong>";
            $cities = array("Peter"=>"LEEDS","Kat"=>"bradford","Laura"=>"wakeField");

            echo "<h3>";
            print_r ($cities);
            echo "</h3>";

            // modifying values
            foreach($cities as $key=>$value){
                $cities[$key] = ucfirst(strtolower($value));
            }

            echo "<h3>";
            print_r ($cities);
            echo "</h3>";
        
        ?>

        <hr>

        <h2>Extension Exercise</h2>
        <?php
        
            $password = 'password';
            $password = trim($password);
            $password = htmlentities($password);

            if(isset($password) && !empty($password)){
                echo "<h3>Password: $password</h3>";

                if(strlen($password)<6 || strlen($password)>8){
                    echo "<h3>Your password must be 6 to 8 characters long.</h3>";
                }
                elseif(is_numeric($password)){
                    echo "<h3>Your password cannot be a number.</h3>";
                }
                else{
                    echo "<h3>Password OK.</h3>";
                    $encryptedPassword = md5($password);
                    echo "<h3>Encrypted Password: $encryptedPassword</h3>";
                }

            }
            else{
                echo "</h3>Please set your password first.</h3>";
            }
        
        ?>
    
    </div>
    
</body>
</html>