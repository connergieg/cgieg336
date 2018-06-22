<?php

    include "../../dbConnection.php";
    $conn = getDatabaseConnection("c9");
    
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $zipCode = $_POST["zipCode"];
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    
    $sql = "INSERT INTO lab9_user
            (firstName, lastName, zipCode, username, password)
            VALUES (:firstName, :lastName, :zipCode, :username, :password)";
    
    $np = array();
    $np[":firstName"] = $firstName;
    $np[":lastName"] = $lastName;
    $np[":zipCode"] = $zipCode;
    $np[":username"] = $username;
    $np[":password"] = $password;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    
?>