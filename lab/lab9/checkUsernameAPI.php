<?php

    include "../../dbConnection.php";
    
    $conn = getDatabaseConnection("c9");
    
    $username = $_GET["username"];
    
    // query allows for SQL Injection because of the single quotes
    // $sql = "SELECT *
    //         FROM lab9_user
    //         WHERE username = '$username' ";
    $sql = "SELECT *
            FROM lab9_user
            WHERE username = :username";
    
    $np = array();
    $np[":username"] = $username;
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // print_r($record);
    
    echo json_encode($record);

?>