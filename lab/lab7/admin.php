<?php
    session_start();
    if (!isset($_SESSION["adminName"])) {
        header("Location:index.php");
    }
    include "../../dbConnection.php";
    
    $conn = getDatabaseConnection("ottermart");
    
    function displayAllProducts() {
        global $conn;
        $sql = "SELECT *
                FROM om_product";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // print_r($records);
        return $records;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            form {
                display: inline;
            }
        </style>
        
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete it?");
            }
        </script>
    </head>
    <body>
        <h1> Admin Main Page </h1>
        
        <h3> Welcome <?= $_SESSION["adminName"] ?>! </h3>
        
        <form action="addProduct.php">
            <input type="submit" name="addproduct" value="Add Product">
        </form>
        
        <form action="logout.php">
            <input type="submit" value="Logout">
        </form>
        
        <br> 
        <strong> Products: </strong> <br>
        <?php 
            $records = displayAllProducts();
            
            foreach ($records as $record) {
                echo "[<a href='updateProduct.php?productId=" . $record["productId"] . "'>Update</a>] ";
                //echo "[<a href='deleteProduct.php?productId=" . $record["productId"] . "'>Delete</a>]
                
                echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='productId' value='" . $record["productId"] . "'>";
                echo "<input type='submit' name='submit' value='Delete'> ";
                echo "<form>";
                
                echo $record["productName"] . "<br>";
                
            }
        ?>

    </body>
</html>