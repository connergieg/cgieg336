<?php
    include "inc/functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Lab 2: 777 Slot Machine </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="main">
            <?php
            
                play();
                
            ?>
            
            <form>
                <input type="submit" value="Spin!">
            </form>
        </div>
        
        
    </body>
</html>