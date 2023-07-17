<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "we-talk";

   $conn = mysqli_connect($server,$username,$password,$db_name);

    if(!$conn){
        die("Sorry failed to connect");
    }
