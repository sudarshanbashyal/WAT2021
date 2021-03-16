<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php 
        include 'navbar.php';
    ?>

    <div class="table-container">

        <h2>Select All Customers</h2>
        <?php

            $allQuery = "SELECT * FROM users";
            $allUsers = mysqli_query($connection, $allQuery);
            
            echo "<table><thead><tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Age</th>
            </tr></thead><tbody>";

            foreach($allUsers as $user){
                echo "<td>$user[firstName] $user[surname]</td>
                <td>$user[email]</td>
                <td>$user[gender]</td>
                <td>$user[age]</td>
                </tr>";
            }

            echo "</tbody></table>";

        ?>

        <hr>

        <h2>Customers with Age>22</h2>
        <?php

            $selectQuery = "SELECT * FROM users where age>22;";
            $allUsers = mysqli_query($connection, $selectQuery);
            
            echo "<table><thead><tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Age</th>
            </tr></thead><tbody>";

            foreach($allUsers as $user){
                echo "<td>$user[firstName] $user[surname]</td>
                <td>$user[email]</td>
                <td>$user[gender]</td>
                <td>$user[age]</td>
                </tr>";
            }

            echo "</tbody></table>";

        ?>

        <hr>

        <h2>Females with Age>=22</h2>
        <?php

            $selectQuery = "SELECT * FROM users where age>=22 AND gender='Female';";
            $allUsers = mysqli_query($connection, $selectQuery);
            
            echo "<table><thead><tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Age</th>
            </tr></thead><tbody>";

            foreach($allUsers as $user){
                echo "<td>$user[firstName] $user[surname]</td>
                <td>$user[email]</td>
                <td>$user[gender]</td>
                <td>$user[age]</td>
                </tr>";
            }

            echo "</tbody></table>";

        ?>

        <hr>

        <h2>Males with decending ages</h2>
        <?php

            $selectQuery = "SELECT * FROM users WHERE gender='Male' ORDER BY age desc;";
            $allUsers = mysqli_query($connection, $selectQuery);
            
            echo "<table><thead><tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Age</th>
            </tr></thead><tbody>";

            foreach($allUsers as $user){
                echo "<td>$user[firstName] $user[surname]</td>
                <td>$user[email]</td>
                <td>$user[gender]</td>
                <td>$user[age]</td>
                </tr>";
            }

            echo "</tbody></table>";

        ?>

        <hr>

        <h2>Customers with "a" in their first name</h2>
        <?php

            $selectQuery = "SELECT * FROM users WHERE firstName like '%a%';";
            $allUsers = mysqli_query($connection, $selectQuery);
            
            echo "<table><thead><tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Age</th>
            </tr></thead><tbody>";

            foreach($allUsers as $user){
                echo "<td>$user[firstName] $user[surname]</td>
                <td>$user[email]</td>
                <td>$user[gender]</td>
                <td>$user[age]</td>
                </tr>";
            }

            echo "</tbody></table>";

        ?>

    </div>
    
</body>
</html>