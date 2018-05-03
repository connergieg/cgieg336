<?php
    session_start();
    
    if (isset($_GET["playAgain"])) {
        session_unset();
        $_SESSION["randNum"] = rand(1,10);
    }
    
    if (!isset($_SESSION["randNum"])) {
        $_SESSION["randNum"] = rand(1,10);
    }
    
    if (!isset($_SESSION["numbersGuessed"])) {
        $_SESSION["numbersGuessed"] = array();
    }
    
    if (!isset($_SESSION["numTries"])) {
        $_SESSION["numTry"] = array();
    }
    
    if (!isset($_SESSION["tries"]) && isset($_GET["guess"])) {
        $_SESSION["tries"] = 1;
    }
    
    // echo $_SESSION["randNum"];
    
    function displayComparison() {
        if (isset($_GET["guess"])) {
            if (isset($_SESSION["randNum"])) {
                echo "<br>Number of tries: " . $_SESSION["tries"];
            }
            if ($_SESSION["randNum"] == $_GET["guess"]) {
                echo "<br> <span class='correct'> <strong>You've guessed the number!</strong> </span> <br><br>";
                $_SESSION["numbersGuessed"][] = $_SESSION["randNum"];
                $_SESSION["numTries"][] = $_SESSION["tries"];
                echo "<div id='guessHistory'>";
                echo "<span> Guesses History </span> <br>";
                for ($i = 0; $i < count($_SESSION["numbersGuessed"]); $i++) {
                    echo "You guessed the numbers " . $_SESSION["numbersGuessed"][$i];
                    echo " in " . $_SESSION["numTries"][$i] . " attempts <br>";
                }
                echo "<div>";
                unset($_SESSION["randNum"]);
                unset($_SESSION["tries"]);
                $_SESSION["randNum"] = rand(1,10);
            }
            else if ($_GET["guess"] > $_SESSION["randNum"]) {
                echo "<br> <span class='incorrect'> <strong>The number should be lower</strong> </span> <br>";
                $_SESSION["tries"]++;
            }
            else {
                echo "<br> <span class='incorrect'> <strong>The number should be higher</strong> </span> <br>";
                $_SESSION["tries"]++;
            }
        }
    }
    
    if (isset($_GET["giveUp"])) {
        echo "<br> The number was " . $_SESSION["randNum"];
        session_destroy();
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
            .sameLine {
                display: inline;
            }
            .correct {
                color: green;
            }
            .incorrect {
                color: red;
            }
            #guessHistory span {
                font-size: 1.5em;
            }
        </style>
    </head>
    <body>
        <h1> Guess a number between 1 and 10! </h1>
        <form>
            Guess: <input type="number" name="guess" size="4"> <br> <br>
                <input type="submit" value="Guess Number">
        </form>
        <br>
        <form class="sameLine">
            <input type="submit" name="giveUp" value="Give Up">
        </form>
        
        <form class="sameLine">
            <input type="submit" name="playAgain" value="Play Again"> <br>
        </form>
        <br>
        
        <?php
            displayComparison();
        ?>
    </body>
</html>