<?php
    include "../../dbConnection.php";
    $conn = getDatabaseConnection("ottermart");
    
    $productId = $_GET["productId"];
    
    $sql = "SELECT * FROM om_product
            NATURAL JOIN om_purchase
            WHERE productId = :pId";
            
    $namedParameters = array();
    $namedParameters[":pId"] = $productId;
            
    // echo $sql; //for debugging purposes
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // print_r($records);
    
    if (!empty($records)) {
        echo $records[0]["productName"] . "<br>";
        echo "<img src='" . $records[0]["productImage"] . "' width='200'> <br>";
    }
    else {
        echo "There is no purchase history for this product.";
    }
    
    foreach ($records as $record) {
        echo "Purchase Date: " . $record["purchaseDate"] . "<br>";
        echo "Unit Price: " . $record["unitPrice"] . "<br>";
        echo "Quantity: " . $record["quantity"];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>