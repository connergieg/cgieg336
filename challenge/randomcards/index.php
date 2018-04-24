<?php
    include "inc/functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Card Game </title>
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <style>
            body {
                font-family: 'Oxygen', sans-serif;
            }
            h1, h2 {
                text-align: center;
            }
            #left {
                margin-right: 75px;
            }
            #left, #right {
                text-align: center;
            }
            #main {
                display: flex;
                justify-content: center;
            }
            form {
                text-align: center;
            }
            .winner {
                color: green;
            }
            #tie {
                color: orange;
            }
        </style>
    </head>
    <body>
        <?php
            echo "<h1> Random Card Game </h1>";
            
            echo "<div id='main'>";
                echo "<div id='left'>";
                echo "<h2> Human </h2>";
                $randomSuitValue1 = rand(0,4);
                echo displayCard($randomSuitValue1);
                echo "</div>";
                
                echo "<div id='right'>";
                echo "<h2> Computer </h2>";
                $randomSuitValue2 = rand(0,4);
                echo displayCard($randomSuitValue2);
                echo "</div>";
            echo "</div>";
            
            if ($randomSuitValue1 > $randomSuitValue2) {
                echo "<h2 class='winner'> Human Wins </h2>";
            }
            else if ($randomSuitValue2 > $randomSuitValue1) {
                echo "<h2 class='winner'> Computer Wins </h2>";
            }
            else {
                echo "<h2 id='tie'> Tie Game </h2>";
            }
        ?>
    </body>
</html>