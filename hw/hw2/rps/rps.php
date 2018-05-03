<?php
    include "../inc/functions.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> RPS </title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <style>
            header {
                color: <?= getRandomColor() ?>;
            }
        </style>
    </head>
    
    <body>
        <header>
            <h1> RPS </h1>
        </header>
        <?php
            rpsGame();
        ?>
        <div id="info">
            <?php
                $i = 1;
                while ($i < 4) {
                    if ($i == 1) {
                        echo "<h4>$i. Green = Winner of each match</h4>";
                    }
                    else if ($i == 2) {
                        echo "<h4>$i. Red = Loser of each match</h4>";
                    }
                    else if ($i == 3) {
                        echo "<h4>$i. One player must win at least 2 out of 3 matches to win.</h4>";
                    }
                    $i++;
                }
            ?>
        </div>
        
        <div id="about"> 
            <a href="https://en.wikipedia.org/wiki/Rock%E2%80%93paper%E2%80%93scissors">About RPS</a>
        </div>
       
        <hr>
        <footer>
            <a href="https://csumb.edu/"><img src="im/csumb_logo.png" alt="Picture of Conner Gieg" id="csumbLogo"></a>
            <div id="footerText">
             CST336 Internet Programming. 2018&copy; Gieg <br />
             <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br /> 
             It is used for academic purposes only.
            </div>
        </footer>
    </body>
</html>