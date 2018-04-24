<?php

    function play() {
        for ($i = 1; $i < 4; $i++) {
            ${"randomValue" . $i} = rand(0,3);
            displaySymbol(${"randomValue" . $i}, $i);
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
    }
    
    function displaySymbol($randomValue, $pos) {
        
        switch ($randomValue) {
            case 0:
                $symbol = "seven";
                break;
            case 1:
                $symbol = "cherry";
                break;
            case 2:
                $symbol = "lemon";
                break;
            case 3:
                $symbol = "grapes";
                break;
        }
        echo "<img src='img/$symbol.png' id='reel$pos' width='70' alt=$symbol title=$symbol>";
    }
            
    function displayPoints($randomValue1, $randomValue2, $randomValue3) {
        
        echo "<div id='output'>";
        if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
            switch ($randomValue1) {
                case 0:
                    $totalPoints = 1000;
                    $jackpot = true;
                    break;
                case 1:
                    $totalPoints = 750;
                    break;
                case 2:
                    $totalPoints = 250;
                    break;
                case 3:
                    $totalPoints = 900;
                    break;
            }
            echo "<h2> You won $totalPoints points! </h2>";
            if ($jackpot) {
                echo "<audio autoplay> <source src='jackpot.mp3' type='audio/mpeg'> </audio>";
            }
        }
        else {
            echo "<h3> Try again! </h3>";
        }
        echo "</div>";
    }
    
?>