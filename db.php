<?php
    $host="localhost";
    $user="root";
    $pass="";
    $name="atma_jogja_rental_0075";

    $con=mysqli_connect($host,$user,$pass,$name);

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL : " . mysqli_connect_error();
    }
?>