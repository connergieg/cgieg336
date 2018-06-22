<?php
    include "inc/header.php";
    
    include "../../dbConnection.php";
    $conn = getDatabaseConnection("pets");
    
    $sql = "SELECT name, pictureURL FROM pets";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // print_r($records);
?>

        
<!-- Add Carousel here -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <!--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
    <!--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
    <!--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
    <?php
      for ($i = 0; $i < 3; $i++) {
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
    <!--<div class="carousel-item active">-->
    <!--  <img class="d-block w-100" src="..." alt="First slide">-->
    <!--</div>-->
    <!--<div class="carousel-item">-->
    <!--  <img class="d-block w-100" src="..." alt="Second slide">-->
    <!--</div>-->
    <!--<div class="carousel-item">-->
    <!--  <img class="d-block w-100" src="..." alt="Third slide">-->
    <!--</div>-->
    <?php
      for ($i = 0; $i < 3; $i++) {
            do {
                $randomIndex = array_rand($records);
            }
            while (!isset($records[$randomIndex]));
            if ($i==0) {
                echo "<div class='carousel-item active'>";
                echo "<img class='d-block w-100' src='img/" . $records[$randomIndex]["pictureURL"] . "' alt='Slide $i'>";
                echo "<div class='carousel-caption d-none d-md-block'>";
                echo "<h3>" . $records[$randomIndex]["name"] ."</h3>";
                echo "</div>";
                echo "</div>";
            }
            else {
                echo "<div class='carousel-item'>";
                echo "<img class='d-block w-100' src='img/" . $records[$randomIndex]["pictureURL"] . "' alt='Slide $i'>";
                echo "<div class='carousel-caption d-none d-md-block'>";
                echo "<h3>" . $records[$randomIndex]["name"] ."</h3>";
                echo "</div>";
                echo "</div>";
            }
            unset($records[$randomIndex]);
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

    <br>
    
    <a href="pets.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Adopt Now!</a>
    
    <br>

<?php
    include "inc/footer.php";
?>