<?php
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navStyle.css">
</head>
<body>

    <nav>
        <ul>
            <li><a href="./forms.php">Form Home</a></li>
            <li><a href="./url/urls.php">URLs Get Request</a></li>
            <li><a href="./tax-calculator/taxCalculator.php">Tax Calculator</a></li>
            <li><a href="./form-extension/index.php">Form Extension</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="form-container">
            <form method="POST" action="">
                <label for="">Email:</label>
                <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">

                <br>
                
                <label for="">Comment:</label>
                <textarea name="" id="" cols="0" rows="5" name="comments" value="<?php echo isset($_POST['comments']) ? $_POST['comments'] : '' ?>">
                    
                </textarea>

                <br>

                <input type="checkbox" name="confirm">
                <label for="">Click to Confirm</label>

                <br>

                <input type="submit" value="Submit" name="submit-btn">
                <input type="reset" value="Clear" name="clear-btn">
            </form>
        </div>

        <?php 

        if(isset($_POST['submit-btn'])){

            $email=trim($_POST['email']);
            $email=filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);

            $comment=trim($_POST['comments']);
            $comment=filter_var($comment, FILTER_SANITIZE_SPECIAL_CHARS);

            $confirm='';
            $_POST['confirm']?$confirm='Agreed':$confirm='Not agreed.';

            if(empty($email) || empty($comment)){
                echo '<div class="error-container">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>';
                echo '<span>Email and Comment fields must not be empty.</span></div>';
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo '<div class="error-container">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>';
                echo '<span>Please make sure you email is correct.</span></div>';
            }
            else{
                echo '<div class="info-container">';
                echo "<p>Email: $email</p>";
                echo "<p>Comment: $comment</p>";
                echo "<p>Confirm: $confirm</p>";
            }

        }

    ?>

    </div>
    
    
</body>
</html>