<?php
    function play() {
        for ($i = 0; $i < 2; $i++) {
        
        }
    }
    function displayCard($randomSuitValue) {
        $randomCardValue = rand(0,3);
        // $randomValue2 = rand(0,4);
        
        switch($randomCardValue) {
            case 0:
                $suit = "clubs";
                break;
            case 1:
                $suit = "diamonds";
                break;
            case 2:
                $suit = "hearts";
                break;
            case 3:
                $suit = "spades";
                break;
        }
        switch($randomSuitValue) {
            case 0:
                $card = "ten";
                break;
            case 1:
                $card = "jack";
                break;
            case 2:
                $card = "queen";
                break;
            case 3:
                $card = "king";
                break;
            case 4:
                $card = "ace";
                break;
        }
        return "<img src='randomCard/img/cards/$suit/$card.png'>";
    }
?>