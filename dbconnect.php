<?php
    $servername = "localhost";
    $username = "f33ee";
    $password = "f33ee";
    $dbname = "f33ee";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("Connection failed: " . mysqli_connct_error());
    }
?>