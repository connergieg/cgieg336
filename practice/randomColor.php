<?php

	function getRandomColor() {
		return "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title> Random Color </title>

		<style>
			body {
				<?php
					echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
				?>
			}
			h1 {
				<?php
					echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
					echo "color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
				?>
			}
			h2 {
				color: <?php echo getRandomColor() ?>;
				background-color: <?= getRandomColor() ?>;
			}
			h2 {
				border-size: 3px;
				border-style: dashed;
				border-color: <?= getRandomColor() ?>;
				background-color: <?= getRandomColor() ?>;
			}
		</style>
	</head>

	<body>

		<h1> Welcome! </h1>

		<h2> Random Background Color! </h2>

	</body>
</html>