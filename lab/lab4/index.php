<?php
    //print_r($_GET); //displaying all content submitted in the form using the GET method
    
    $backgroundImage = "img/sea.jpg";
    
    if (isset($_GET["keyword"])) { //if form was submitted
        include "api/pixabayAPI.php";
        // echo "<h3>You searched for " . $_GET["keyword"] . "</h3>";
        $orientation = "horizontal";
        $keyword = $_GET["keyword"];
        if (isset($_GET["layout"])) { //user checked a layout
            $orientation = $_GET["layout"];
        }
        if (!empty($_GET["category"])) { //user selected a category
            $keyword = $_GET["category"];
        }
        if (!empty($keyword)) {
            // echo "<h3>You searched for " . $keyword . "</h3>";
            $imageURLs = getImageURLs($keyword, $orientation);
            // print_r($imageURLs);
            //$backgroundImage = $imageURLs[rand(0, count($imageURLs)-1)]; //gets random element from array
            $backgroundImage = $imageURLs[array_rand($imageURLs)]; // gets random element from array too
        }
        else {
            // echo "<h2> You didn't enter a keyword and a category. Try again </h2>";
            $backgroundImage = "img/sea.jpg";
        }
    }
    
    function checkCategory($category) {
        if ($category ==  $_GET["category"]) {
            echo " selected";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Lab 4: Pixabay Carousel </title>
        <style>
            @import url("https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
            @import url("css/styles.css");
            body {
                background-image: url("<?= $backgroundImage ?>")
            }
            #carouselExampleIndicators {
                width: 500px;
                margin: 0 auto; /*centers a div container*/
            }
        </style>
    </head>
    <body>
        <?php
            
            // if (!isset($_GET["keyword"])) {
            //     echo "<h2> You must type a keyword or select a category </h2>";
            // }
            
        ?>
        
        <form method="GET">
            
            <input type="text" size="20" name="keyword" placeholder="Keyword" value="<?= $_GET['keyword'] ?>">
            <div id="section">
            <input type="radio" name="layout" value="horizontal" id="hlayout"
                
            <?php
                if ($_GET["layout"] == "horizontal") {
                    echo "checked";
                }
            ?>
            
            >
            <label for="hlayout"> Horizontal </label>
            <br>
            <input type="radio" name="layout" value="vertical" id="vlayout" <?= ($_GET["layout"]=="vertical")?"checked":"" ?>>
            <label for="vlayout"> Vertical </label>
            </div>
            
            <br>
            
            <select name="category">
                <option value=""> - Select One - </option>
                <option <?= checkCategory('Ocean') ?>> Ocean </option>
                <option <?= checkCategory('Forest') ?>> Forest </option>
                <option <?= checkCategory('Sky') ?>> Sky </option>
            </select>
            <br>
            
            <input type="submit" value="Submit">
            
        </form>
        
        <?php
            if (!isset($_GET["keyword"]) || isset($_GET["keyword"]) || empty($_GET["keyword"]) || empty($_GET["category"])) {
                if ( empty($_GET["keyword"]) && empty($_GET["category"]) ) {
                    echo "<h2> You must type a keyword or select a category </h2>";
                }
                else {
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <!--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
    <!--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
    <!--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
    <?php
        for ($i = 0; $i < 7; $i++) {
            if ($i==0) {
                echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i' class='active'></li>";
            }
            else {
                echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'> </li>";
            }
        }
    ?>
  </ol>
  <div class="carousel-inner">
    <?php
        for ($i = 0; $i < 7; $i++) {
            do {
                $randomIndex = array_rand($imageURLs);
            }
            while (!isset($imageURLs[$randomIndex]));
            if ($i==0) {
                echo "<div class='carousel-item active'>";
                echo "<img class='d-block w-100' src='$imageURLs[$randomIndex]' alt='Slide $i'>";
                echo "</div>";
            }
            else {
                echo "<div class='carousel-item'>";
                echo "<img class='d-block w-100' src='$imageURLs[$randomIndex]' alt='Slide $i'>";
                echo "</div>";
            }
            unset($imageURLs[$randomIndex]);
        }
    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <?php
            }
            }//endIf
        ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>