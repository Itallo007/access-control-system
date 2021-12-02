<?php
    require_once("dbconfig.php");

    // Criem o arquivo 'dbconfig.php' na pasta database.php
    /**
     * $servername = "";
     * $username = "";
     * $password = "";
     * $database = "aula_php";
     */


    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    return $conn;
    

?>