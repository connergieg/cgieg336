<?php
    include "../../dbConnection.php";
    
    $conn = getDatabaseConnection("ottermart");
    
    function chooseSelectedCategory($catId) {
        $product = getProductInfo();
        if ($product["catId"] == $catId) {
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
            echo "<option value='" . $record["catId"] . "'" . chooseSelectedCategory($record["catId"]) . ">" . $record["catName"] . "</option>";
        }
    }
    
    function getProductInfo() {
        global $conn;
        $sql = "SELECT * FROM om_product
                WHERE productId = " . $_GET["productId"];
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // print_r($record);
        return $record;
    }
    
    // print_r(getProductInfo());
    
    if (isset($_GET["submit"])) {
        $record = getProductInfo();
        $sql = "UPDATE om_product 
                SET productName = :productName,
                    productDescription = :productDescription,
                    productImage = :productImage,
                    price = :price,
                    catId = :catId
                WHERE productId = :productId";
                
        $np = array();
        $np[":productName"] = $_GET["productName"];
        $np[":productDescription"] = $_GET["description"];
        $np[":productImage"] = $_GET["productImage"];
        $np[":price"] = $_GET["price"];
        $np[":catId"] = $_GET["catId"];
        $np[":productId"] = $_GET["productId"];
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
    }
    if (isset($_GET["goBack"])) {
        header("Location:admin.php");
    }
    
    $record = getProductInfo();
    // print_r($record);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Product </title>
    </head>
    <body>
        <form>
            <input type="submit" name="goBack" value="Go Back">
        </form>
        <h1> Update Product </h1>
        
        <form method="GET">
            <input type="hidden" name="productId" value="<?= $record['productId'] ?>">
            Product Name: <input type="text" name="productName" value="<?= $record['productName'] ?>"> <br>
            Description: <textarea name="description" rows="4" cols="50"><?= $record['productDescription'] ?></textarea> <br>
            Price: $<input type="text" name="price" value="<?= $record['price'] ?>"> <br>
            Category:
            <select name="catId">
                <option value=""> - Select One - </option>
                <?= getCategories(); ?>
            </select>
            <br>
            Add Image URL: <input type="text" name="productImage" value="<?= $record['productImage'] ?>"> <br>
            <input type="submit" name="submit" value="Update Product">
        </form>
    </body>
</html>