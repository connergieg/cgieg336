<?php
    include "../../dbConnection.php";
    $conn = getDatabaseConnection("golf");
    
    $firstLetter = $_GET["firstLetter"];
    
    $sql = "SELECT brandName
            FROM brands
            WHERE brandName LIKE '" . $firstLetter . "%'
            ORDER BY brandName";
            
    // echo $sql;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $record) {
        echo "<a href=#>" . $record['brandName'] . "</a> <br>";
    }
    
    if (empty($records)) {
        echo "No golf brands are available.";
    }
?>