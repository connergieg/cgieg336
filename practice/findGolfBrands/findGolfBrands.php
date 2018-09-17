<?php
	function displayLetters() {
		$letters = range("A", "Z");
		for ($i = 0; $i < count($letters); $i++) {
			echo "<a href='brandName.php?firstLetter=$letters[$i]'>$letters[$i]</a>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Find Golf Products</title>
		<style>
			h1 {
				margin: 10px auto;
				text-align: center;
				background-color: aqua;
				width: 700px;
			}
			#main {
				width: 700px;
				margin: 0px auto;
				text-align: center;
				background-color: lightgreen;
			}
			#main a {
				padding-right: 10px;
			}
			
			#main a:link, #main a:visited {
				color: red;
			}
		</style>
	</head>
	
	<body>
		<h1>First letter of golf brand</h1>
		<div id="main">
			<?= displayLetters() ?>
		</div>
	</body>
</html>