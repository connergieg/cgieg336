<?php

function displaySymbol($randomValue, $pos) 
{
    $fruits = array("cherry.png", "grape.png", "lemon.png", "orange.png", "seven.png");
    for ($i = 0; $i < count($fruits); $i++)
    {
        if ($randomValue == $i)
        {
            $symbol = $fruits[$randomValue];
        }
    }
    
    echo "<img id='reel$pos' src='img/$symbol' alt='$symbol' title='".ucfirst($symbol)."' width='70' />";
}

function findImageName()
{
    $cars = array("cadillac_eldorado.jpg", "camaro.jpg", "corvette-zr1.jpg", "blue_lam.jpg", "gray_lam.jpg", "orange_lam.jpg");
    $rand_num = rand(0, count($cars)-1);
    echo "Congrats! You won a " . substr($cars[$rand_num], 0, count($cars[$rand_num])-5) . "!";
    return $cars[$rand_num];
}
            
function displayImage($randomValue1, $randomValue2, $randomValue3)
{
    echo "<div id='output'>";
    if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3)
    {
        $image_name = findImageName();
        echo "<img src='img/$image_name' alt='$image_name' title='$image_name' />";
    }
    else 
    {
        echo "<h3>Spin again!</h3>";
    }
    echo "</div>";
}

function play() {
    for($i = 1; $i < 4; $i++)
    {
        ${"randomValue" . $i } = rand(0, 4);
        displaySymbol(${"randomValue" . $i}, $i );
    }
    displayImage($randomValue1, $randomValue2, $randomValue3);
}

?>