<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="basics.css">
    <title>Basics</title>
</head>
<body>

    <div class="container">

        <?php
            echo "<strong>Variables</strong>";
            echo "<h3>Name: Sudarshan Bashyal</h3>";
            echo "<h3>ID: C7227154</h3>";
            echo "<br>";

            $name = 'Sudarshan';
            $age = 20;

            echo "<h3>Hi, my name is ".$name." and I am".$age." years old.</h3>";
            echo "<h3>Me nombre es $name y tengo $age anos de edad.</h3>";

            echo "<hr>";

            echo "<strong>Functions</strong>";

            echo "<h3>Get type: ".gettype($name)."</h3>";
            echo "<h3>Get Length: ".strlen($name)."</h3>";
            echo "<h3>Uppercase: ".strtoupper($name)."</h3>";

            echo "<hr>";

            echo "<strong>Arithmetic</strong>";

            $num1=9;
            $num2=12;
            
            echo "<h3>num1 = $num1</h3>";
            echo "<h3>num2 = $num2</h3>";
            echo "<h3>num1 x num2 = ".($num1*$num2)."</h3>";
            echo "<h3>num1 as a percentage of num2= ".($num1/$num2*100)."%</h3>";
            echo "<h3>num2 divided by num1= ".(int)($num2/$num1)." remainder ".($num2%$num1)."</h3>";

            echo "<hr>";

            $height = 1.7;
            $heightInInches = 1.7*100/2.54;

            echo "<h3>Name: $name</h3>";
            echo "<h3>Age: $age</h3>";
            echo "<h3>Height in meters: $height</h3>";
            echo "<h3>Height in feet and inches: ".(int)($heightInInches/12)."feet ".($heightInInches%12)."inches</h3>";
        
        ?>
    
    </div>
    
</body>
</html>