<?php
	session_start();
	$start = microtime(true);
	
	function getHand() {
		$deck = array();
		$suits = array("clubs", "spades", "hearts", "diamonds");

		for ($i = 0; $i < 4; $i++) {
			for ($j = 1; $j < 13; $j++) {
				array_push($deck, $suits[$i] . "_" . $j);
			}
		}
		shuffle($deck);
		return $deck;
	}
	
	function displayHand($origDeck) {
		$p0 = array(); 
		$p1 = array();
		$p2 = array();
		$p3 = array();
		$names = array();
		$names = array("profileA","profileB", "profileC", "profileD");
		shuffle($names);
		echo "<div id='main'>";
    	for ($i = 0; $i < 4; $i++) {
    		echo "<div id='row'>";
    		echo "<div id='profile'>";
    		echo "<img src='cards/$names[$i].png' id='profilePic'>";
    		switch($names[$i]) {
    			case "profileA";
    				${"name" . $i} = "nameA";
    				break;
    			case "profileB";
    				${"name" . $i} = "nameB";
    				break;
    			case "profileC";
    				${"name" . $i} = "nameC";
    				break;
    			case "profileD";
    				${"name" . $i} = "nameD";
    				break;
    		}
    		echo "<h2 id='profileName'> ${"name" . $i} </h2>";
    		echo "</div>";
    		
    		echo "<div id='cards'>";
    		${"points" . $i} = 0;
	        while (${"points" . $i} <= 35) {
	        	$card = array_shift($origDeck);
	        	array_push(${"p" . $i}, $card);
	        	${"points" . $i} = ${"points" . $i} + intval(substr($card, strpos($card, "_")+1));
	        	$cardSuit = strtok($card, "_");
	        	$cardNum = intval(substr($card, strpos($card, "_")+1));
	        	echo "<img src='cards/cards/$cardSuit/$cardNum.png'>";
	        }
	        echo "<h2 id='points'>" . ${'points' . $i} . "<h2>";
	        echo "</div>";
	        echo "</div>";
    	}
    	echo "<div>";
        $playerPoints = array($points0, $points1, $points2, $points3);
        $playerNames = array($name0,  $name1, $name2, $name3);
        displayWinners($playerPoints, $playerNames);
        // return $playerPoints;
	}
	
	function displayWinners($playerPoints, $playerNames) {
		$winner = array();
		$winners = array();
		for ($i = 0; $i < 4; $i++) {
			if ($playerPoints[$i] <= 42) {
				array_push($winner, $playerPoints[$i]);
			}
		}
		
		for ($i = 0; $i < count($playerPoints); $i++) {
			if (empty($winner)) {
				break;
			}
			if ($playerPoints[$i] == max($winner)) {
				array_push($winners, $playerNames[$i]);
			}
		}
		
		$winnerTotal = 0;
		for ($i = 0; $i < count($playerPoints); $i++) {
			if (empty($winner)) {
				break;
			}
			if ($playerPoints[$i] != max($winner)) {
				$winnerTotal = $winnerTotal + $playerPoints[$i];
			}
			
		}
		
		echo "<div id='winnerSection'>";
		echo "<h2 id='winnerMessage'>";
		if (count($winners) == 4 || empty($winners)) {
			echo "Tie Game";
		}
		else if (count($winners) > 1 && count($winners) != 4) {
			echo implode(" and ", $winners);
			echo " win " . $winnerTotal . " points!";
		}
		else if (count($winners) == 1) {
			echo $winners[0] . " wins " . $winnerTotal . " points!";;
		}
		echo "</h2>";
		echo "</div>";
	}
	
	function displayElapsedTime() {
		global $start;
		$elapsedSecs = microtime(true) - $start;
		if (!isset($_SESSION["avgTime"])) {
			$_SESSION["avgTime"] = $elapsedSecs;
		}
		else {
			$_SESSION["avgTime"] = $_SESSION["avgTime"] + $elapsedSecs;
		}
		return $elapsedSecs;
	}
	
	
?>