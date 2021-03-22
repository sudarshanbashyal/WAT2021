<?php
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Calculator</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../navStyle.css">
</head>
<body>

    <?php
        
        include '../navbar/navbar.php';
    
    ?>
    
    <div class="container">

        <div class="form-container">
            <h2>Tax Calculator</h2>

            <form method="POST">
                <label for="after-price">After Tax Price: </label>
                <input id="after-price" type="text" name="after-tax" value="<?php echo isset($_POST['after-tax']) ? $_POST['after-tax'] : '' ?>">

                <br>

                <label for="tax-rate">Tax Rate: </label>
                <input id="tax-rate" type="text" name="tax-rate" value="<?php echo isset($_POST['tax-rate']) ? $_POST['tax-rate'] : '' ?>">

                <br>
                <input type="submit" value="Submit" name="submit-btn">
                <input type="reset" value="Clear" name="clear-btn">
            </form>
            
        </div>

        <?php 

            $pattern = "/^\d+(:?[.]\d{2})$/";
        
            if (isset($_POST['submit-btn'])){
                
                $afterTaxPrice = $_POST['after-tax'];
                $taxRate = $_POST['tax-rate'];

                if(empty($afterTaxPrice) || empty($taxRate)){
                    echo '<div class="error-container">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>';
                    echo '<span>Both fields must have a value.</span></div>';
                }
                elseif(!(int)$afterTaxPrice || !(int)$taxRate){
                    echo '<div class="error-container">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>';
                    echo '<span>Both fields must be a number.</span></div>';
                }
                elseif(!preg_match($pattern, $afterTaxPrice)){
                    echo '<div class="error-container">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>';
                    echo '<span>After-tax Rate must be in the format: XX.XX</span></div>';
                }
                elseif(preg_match($pattern, $taxRate)){
                    echo '<div class="error-container">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>';
                    echo '<span>Tax rate must be a whole number.</span></div>';
                }
                else{

                    $afterTaxPrice=(float)$afterTaxPrice;
                    $taxRate=(int)$taxRate;

                    $beforeTaxPrice=(float)(100*$afterTaxPrice)/(100+$taxRate);

                    echo '<div class="info-container">';
                    echo "<p>After-tax Price: $ $afterTaxPrice</p>";
                    echo "<p>Tax Rate: $taxRate</p>";
                    echo "<h2>Before tax Price: $".number_format($beforeTaxPrice, 2)."</h2>";

                }
                

            }

        ?>

    </div>


</body>
</html>