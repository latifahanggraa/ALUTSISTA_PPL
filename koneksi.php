<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_alutsista";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connectiom failed: " . $conn->error);
    }
?>