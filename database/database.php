<?php 

    $hostname="localhost";
    $username="root";
    $password="";
    $dbname="db_wat2021";

    $connection = mysqli_connect($hostname, $username, $password, $dbname);
    if($connection){
        // insert data here
        // $sql="INSERT INTO grocery(itemName, itemPrice) VALUES('Apple',10.5),('Peppers',5.25)";
        // mysqli_query($connection, $sql);

        // select data
        $selectQuery="SELECT * FROM grocery";
        $response = mysqli_query($connection, $selectQuery);

        // while($res=mysqli_fetch_assoc($response)){
        //     print_r($res);
        //     echo "</br>";
        // }

        foreach($response as $res){
            echo "Name: $res[itemName] Price: $res[itemPrice]";
            echo "</br>";
        }
    }
    else{
        echo "<h1>Connection Failed.</h1>";
    }

?>