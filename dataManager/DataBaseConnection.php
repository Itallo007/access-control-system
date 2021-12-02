<?php
    $servername = "db";
    $username = "devphp";
    $password = "devphp";
    $database = "aula_php";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    return $conn;
    

?>