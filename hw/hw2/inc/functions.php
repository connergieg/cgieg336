<?php
    function playerChoice()
    {
        $choice = array("rock", "paper", "scissors");
        shuffle($choice);
        return $choice[array_rand($choice)];
    }
    function getRandomColor() {
        $colors = array("red", "green", "blue", "orange", "purple");
        return $colors[rand(0,count($colors)-1)];
    }
    function rpsGame()
    {
        $p1_count = 0;
        $p2_count = 0;
        for ($i = 0; $i < 3; $i++)
        {
            $p1 = playerChoice();
            $p2 = playerChoice();
            if ($p1 == $p2)
            {
                echo "<figure>";
                echo "<img style='border:1px solid red' src='im/$p1.png' hspace='20'/>";
                echo "<img style='border:1px solid red' src='im/$p2.png' /> <br>";
                echo "</figure>";
                $p1_count = $p1_count + 0;
                $p2_count = $p2_count + 0;
            }
            else
            {
                if ($p1 == "rock" && $p2 == "paper")
                {
                    $color1 = "solid red";
                    $color2 = "solid green";
                    $p2_count++;
                }
                if ($p1 == "rock" && $p2 == "scissors")
                {
                    $color1 = "solid green";
                    $color2 = "solid red";
                    $p1_count++;
                }
                if ($p1 == "paper" && $p2 == "rock")
                {
                    $color1 = "solid green";
                    $color2 = "solid red";
                    $p1_count++;
                }
                if ($p1 == "paper" && $p2 == "scissors")
                {
                    $color1 = "solid red";
                    $color2 = "solid green";
                    $p2_count++;
                }
                if ($p1 == "scissors" && $p2 == "rock")
                {
                    $color1 = "solid red";
                    $color2 = "solid green";
                    $p2_count++;
                }
                if ($p1 == "scissors" && $p2 == "paper")
                {
                    $color1 = "solid green";
                    $color2 = "solid red";
                    $p1_count++;
                }
                echo "<figure>";
                echo "<img style='border: 1px $color1' src='im/$p1.png' hspace='20'/>";
                echo "<img style='border: 1px $color2' src='im/$p2.png' /> <br>";
                echo "</figure>";
            }
        }   
            if ($p1_count >= 2)
            {
                echo "<h2 class='rightside winner'>Player 1 wins</h2>";
            }
            else if ($p2_count >= 2)
            {
                echo "<h2 class='rightside winner'>Player 2 wins</h2>";
            }
            else 
            {
                echo "<h2 class='rightside nowinner'>None of the players won at least 2 out of 3 matches.</h2>";
            }
    }
?>