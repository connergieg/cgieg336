<?php
    session_start();
    if (!isset($_SESSION["adminName"])) {
        header("Location:index.php");
    }
    include "../../dbConnection.php";
    $conn = getDatabaseConnection("ottermart");
    
    function checkSelectedCategory($catId) {
        if ($_GET["catId"] == $catId) {
            return " selected";
        }
    }
    
    function getCategories() {
        global $conn;
        
        $sql = "SELECT catId, catName
                FROM om_category
                ORDER BY catName";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option value='" . $record["catId"] . "'" . checkSelectedCategory($record["catId"]) . ">" . $record["catName"] . "</option>";
        }
    }
    
    if (isset($_GET["submit"])) {
        $productName = $_GET["productName"];
        $productDescription = $_GET["description"];
        $productPrice = $_GET["price"];
        $catId = $_GET["catId"];
        $productImage = $_GET["productImage"];
        
        $sql = "INSERT INTO om_product
                (productName, productDescription, productImage, price, catId)
                VALUES (:productName, :productDescription, :productImage, :productPrice, :catId) ";
        
        $namedParameters = array();
        $namedParameters[":productName"] = $productName;
        $namedParameters[":productDescription"] = $productDescription;
        $namedParameters[":productImage"] = $productImage;
        $namedParameters[":productPrice"] = $productPrice;
        $namedParameters[":catId"] = $catId;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
    }
    
    if (isset($_GET["goBack"])) {
        header("Location:admin.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Add a product </title>
    </head>
    <body>
        <form>
            <input type="submit" name="goBack" value="Go Back">
        </form>
        <h1> Add a product </h1>
        
        <form method="GET">
            Product Name: <input type="text" name="productName"> <br>
            Description: <textarea name="description" rows="4" cols="50"> </textarea> <br>
            Price: $<input type="text" name="price"> <br>
            Category:
            <select name="catId">
                <option value=""> - Select One - </option>
                <?= getCategories(); ?>
            </select>
            <br>
            Add Image URL: <input type="text" name="productImage"> <br>
            <input type="submit" name="submit" value="Add Product">
        </form>
    </body>
</html>