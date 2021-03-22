<!DOCTYPE html>
<?php
    error_reporting(0);
?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Form extension exercise</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="../navStyle.css">
    </head>

    <body>

        <?php
        
            include '../navbar/navbar.php';
        
        ?>

        <div class="container">

            <div class="content">

                <form method="POST" action="">
                    <h1>Order Form</h1>

                    <!-- login details -->

                    <h2>Enter your login details</h2>

                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"/>
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?php echo isset($_POST['username']) ? $_POST['password'] : '' ?>"/>

                    <hr>

                    <!-- pizza selection -->

                    <h2>Pizza Selection</h2>

                    <!-- size -->
                    <label>Size:</label>

                    <input
                        class="size-radio"
                        id="small-size"
                        type="radio"
                        name="pizza-size"
                        value="Small"
                        <?php if(isset($_POST['submit']) && $_POST['pizza-size']=='Small') echo "checked"; else echo ""; ?>
                    />
                    <label for="small-size" >Small</label>

                    <input
                        class="size-radio"
                        id="medium-size"
                        type="radio"
                        name="pizza-size"
                        value="Medium"
                        <?php if(isset($_POST['submit']) && $_POST['pizza-size']=='Medium') echo "checked"; else echo ""; ?>
                    /> 
                    <label class="size-radio" for="medium-size" >Medium</label>

                    <input
                        class="size-radio"
                        id="large-size"
                        type="radio"
                        name="pizza-size"
                        value="Large"
                        <?php if(isset($_POST['submit']) && $_POST['pizza-size']=='Large') echo "checked"; else echo ""; ?>
                    />
                    <label for="large-size" >Large</label>

                    <br />
                    <!-- toppings -->
                    <label for="topping">Topping:</label>
                    <select name="topping" id="topping">
                        <option value="" selected disabled>
                            Select an option
                        </option>
                        <option value="Mushroom" <?php if(isset($_POST['submit']) && $_POST['topping']=='Mushroom') echo "selected"; else echo ""; ?>>Mushroom</option>
                        <option value="Pepperoni" <?php if(isset($_POST['submit']) && $_POST['topping']=='Pepperoni') echo "selected"; else echo ""; ?>>Pepperoni</option>
                        <option value="Sausage" <?php if(isset($_POST['submit']) && $_POST['topping']=='Sausage') echo "selected"; else echo ""; ?>>Sausage</option>
                        <option value="Peppers" <?php if(isset($_POST['submit']) && $_POST['topping']=='Peppers') echo "selected"; else echo ""; ?>>Peppers</option>
                        <option value="Bacon" <?php if(isset($_POST['submit']) && $_POST['topping']=='Bacon') echo "selected"; else echo ""; ?>>Bacon</option>
                    </select>
                    <br />
                    <!-- extras -->
                    <label>Extras:</label>
                    <input
                        id="parmesan-extra"
                        type="checkbox"
                        value="Parmesan"
                        name="extras[]"
                        <?php if(isset($_POST['extras']) && in_array("Parmesan",$_POST['extras'])) echo 'checked'; else echo ""; ?>
                    />
                    <label for="parmesan-extra">Parmesan</label>

                    <input id="olives-extra" type="checkbox" value="Olives" name="extras[]" <?php if(isset($_POST['extras']) && in_array("Olives",$_POST['extras'])) echo 'checked'; else echo ""; ?>/>
                    <label for="olives-extra">Olives</label>

                    <input id="capers-extra" type="checkbox" value="Capers" name="extras[]" <?php if(isset($_POST['extras']) && in_array("Capers",$_POST['extras'])) echo 'checked'; else echo ""; ?>/>
                    <label for="capers-extra">Capers</label>

                    <input type="submit" value="Submit" name="submit"/>
                    <input type="reset" value="Reset" name="reset" />
                </form>

                <div class="order-details">
                    <?php
                        error_reporting(0);

                        if(isset($_POST['submit'])){

                            $username=$_POST['username'];
                            $username=trim($username);
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
                </div>
                
            </div>
            
        </div>
    </body>
</html>
