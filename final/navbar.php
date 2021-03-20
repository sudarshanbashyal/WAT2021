<?php

    include 'init.php';

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">

        <a href="products.php" class="navbar-brand"><img src="https://img.icons8.com/nolan/64/fast-cart.png"/></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">

            <a class="nav-link active" aria-current="page" href="products.php">Home</a>
            <?php
            
                if(isset($_SESSION['user'])){
                    echo "<a class='nav-link' href='logout.php'>Logout</a>";
                }
                else{
                    echo "<a class='nav-link' href='registerForm.php'>Register</a>";
                    echo "<a class='nav-link' href='loginForm.php'>Login</a>";
                }
            
            ?>

        </div>
        </div>
    </div>

</nav>