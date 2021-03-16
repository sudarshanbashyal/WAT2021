<?php

    echo "<form class='login-form' method='POST' action='login.php'>
            
            <label for='username'>Username</label>
            <input type='text' id='username' name='username'>

            <label for='password'>Password</label>
            <input type='password' id='password' name='password'>

            <input type='submit' value='Login' name='login'>

        </form>";

    if($_SESSION['error']){
        echo "<strong class='error-message'>".$_SESSION['error']."</strong>";
    }

?>