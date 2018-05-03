<?php
    
    function passwordGenerator()
    {
        $digits = range(1, 9);
        $letters = range("A", "Z");
        $passwords = array();
        
        echo "<table>";
        echo "<tr>";
        echo "<th>";
        echo "Password";
        echo "</th>";
        echo "<th>";
        echo "Value";
        echo "</th>";
        echo "</tr>";
        for ($i = 0; $i < 25; $i++)
        {
            $character = "";
            echo "<tr>";
            $pass_len = rand(5, 10);
            $digit_count = 0;
            for ($j = 0; $j < $pass_len; $j++)
            {
                $pick_set = rand(0, 1);
                if ($pick_set == 0 && $digit_count >= 0 && $digit_count <= 2)
                {
                    $passwords[$j] = $digits[rand(0, 8)];
                    $character = $character . $passwords[$j];
                    $digit_count++;
                }
                else
                {
                    $passwords[$j] = $letters[rand(0, 25)];
                    $character = $character . $passwords[$j];
                }
            }
            $j = $i + 1;
            echo "<td> $j </td>";
            echo "<td> $character </td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Password Generator </title>
        <style>
            table {
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h2> Password Generator </h2>
        <?php
            passwordGenerator();
        ?>
    </body>
</html>