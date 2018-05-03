<?php
	include "inc/functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
    	<link href="style.css" rel="stylesheet" type="text/css">
    	<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    </head>
    
    <body>
    	<h1> SilverJack </h1>
        <?php
        
			displayHand(getHand())
			
        ?>
        
        <form>
        	<input type="submit" value="Play Again" id="playButton">
        </form>
        
        <div id="elapsedTime">
        	
        	<?php
        		echo "Elapsed Time: " . displayElapsedTime() . " secs";
        		if (!isset($_SESSION["gameCount"])) {
        			$_SESSION["gameCount"] = 1;
        		}
        		else if (isset($_SESSION["gameCount"])) {
        			$_SESSION["gameCount"]++;
        		}
        		echo "<br />";
        		// avg time is (total time)/(game count)
        		echo "Average Elapsed Time: " . $_SESSION["avgTime"]/$_SESSION["gameCount"] . " secs";
        		echo "<br />";
        		echo "Number of games played: " . $_SESSION["gameCount"];
        	?>
        </div>
        
        <hr>
        <footer>
            <a href="https://csumb.edu/"><img src="cards/csumb_logo.png" alt="CSUMB logo" id="csumbLogo"></a>
            <div id="footerText">
             CST336 Internet Programming. 2018&copy; Gieg <br />
             <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br /> 
             It is used for academic purposes only.
            </div>
        </footer>
    </body>
</html>