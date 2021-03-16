<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <?php 
        include 'navbar.php';
    ?>

    <div class="container">
        <h2>Enter Customer Details</h2>
        <form action="insertRecord.php" method="POST">

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="firstName">
            <br>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="lastName">
            <br>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email">
            <br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <br>

            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option selected disabled>Please select a gender.</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Lgbtq+">Lgbtq+</option>
            </select>
            <br>

            <label for="age">Age</label>
            <input type="number" id="age" name="age" min="0" max="150">

            <input type="submit" value="Insert Record" name="submit">

        </form>

    </div>
    
</body>
</html>