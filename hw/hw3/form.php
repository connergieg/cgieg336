<?php
    $errorMessage = "<span class='errorMessage'> * Required </span>";
    function isRadioClicked($slice) {
        if ($slice == $_GET["numSlice"]) {
            return "checked";
        }
        else {
            return "";
        }
    }
    
    function isCheckClicked($topping) {
        for ($i = 1; $i < 5; $i++)
            if ($topping == $_GET["topping" . $i]) {
                return "checked";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Gieg's Pizzeria </title>
        <link href="css/styles.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
    </head>
    <body>
        <h1> Gieg's Pizzeria </h1>
        <div id="main">
        <form>
            <h2> Online Order </h2>
            <fieldset>
            <legend> Contact Info: </legend>
            First Name <br>
            <input type="text" name="fname" value=<?= $_GET["fname"] ?>>
            <?php
                    if (!isset($_GET["fname"])) {
                        
                    }
                    else if (empty($_GET["fname"])) {
                        echo $errorMessage;
                    }
            ?>
            <br> Last Name <br>
            <input type="text" name="lname" value=<?= $_GET["lname"] ?>>
            <?php
                    if (!isset($_GET["lname"])) {
                        
                    }
                    else if (empty($_GET["lname"])) {
                        echo $errorMessage;
                    }
            ?>
            <br> Phone Number <br>
            <input type="number" name="pnumber" value=<?= $_GET["pnumber"] ?>>
            <?php
                    if (!isset($_GET["pnumber"])) {
                        
                    }
                    else if (empty($_GET["pnumber"])) {
                        echo $errorMessage;
                    }
            ?>
            </fieldset> <br>
            <fieldset>
            <legend> Number of slices: </legend>
            <input type="radio" name="numSlice" id="oneslice" value="One" <?= isRadioClicked("One") ?>>
            <label for="oneslice"> One </label> <br>
            <input type="radio" name="numSlice" id="twoslice" value="Two" <?= isRadioClicked("Two") ?>>
            <label for="twoslice"> Two </label> <br>
            <input type="radio" name="numSlice" id="threeslice" value="Three" <?= isRadioClicked("Three") ?>> 
            <label for="threeslice"> Three </label> <br>
            <input type="radio" name="numSlice" id="fourslice" value="Four" <?= isRadioClicked("Four") ?>>
            <label for="fourslice"> Four </label> 
                <?php
                    if (isset($_GET["submit"]) && !isset($_GET["numSlice"])) {
                        echo $errorMessage;
                    }
                ?>
            </fieldset> <br>
            <fieldset>
                <legend> Choose your pizza topping(s): </legend>
                <input type="checkbox" name="topping1" value="pepperoni" id="pepperoni" <?= isCheckClicked("pepperoni") ?>>
                <label for="pepperoni"> Pepperoni </label> <br>
                <input type="checkbox" name="topping2" value="sausage" id="sausage" <?= isCheckClicked("sausage") ?>>
                <label for="sausage"> Sausage </label> <br>
                <input type="checkbox" name="topping3" value="ham" id="ham" <?= isCheckClicked("ham") ?>>
                <label for="ham"> Ham </label> <br>
                <input type="checkbox" name="topping4" value="olive" id="olive" <?= isCheckClicked("olive") ?>>
                <label for="olive"> Olive </label>
                <?php
                    if (isset($_GET["submit"]) && !isset($_GET["topping1"]) && !isset($_GET["topping2"]) &&
                    !isset($_GET["topping2"]) && !isset($_GET["topping3"]) && !isset($_GET["topping4"])) {
                        echo $errorMessage;
                    }
                ?>
            </fieldset>
            
            <div>
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
        
        <div id="results">
            <?php
                switch($_GET["numSlice"]) {
                    case "One":
                        $num = 1;
                        break;
                    case "Two":
                        $num = 2;
                        break;
                    case "Three":
                        $num = 3;
                        break;
                    case "Four":
                        $num = 4;
                        break;
                }
                if (!isset($_GET["submit"])) {
                    
                }
                else if (!empty($_GET["fname"]) && !empty($_GET["lname"]) && !empty($_GET["pnumber"]) &&
                    isset($_GET["numSlice"]) && (isset($_GET["topping1"]) || isset($_GET["topping2"]) ||
                    isset($_GET["topping3"]) || isset($_GET["topping4"])) ) {
                        echo "<h2 id='orderHeader'>" . ucfirst($_GET['fname']) . " " . ucfirst($_GET['lname']) . "'s order";
                        echo " includes: <br>";
                        $toppings = array();
                        for ($i = 1; $i < 5; $i++) {
                            if (isset($_GET["topping" . $i])) {
                                $toppings[] = $_GET["topping" . $i];
                            }
                        }
                        echo implode(", ", $toppings);
                        echo "</h2>";
                        for ($i = 0; $i < $num; $i++) {
                            echo "<div id='pizza'>";
                            echo "<img src='img/pizza.png' width='300' alt='Picture of plain pizza' class='img'>";
                            if (isset($_GET["topping1"])) {
                                echo "<img src='img/pepperoni.png' width='100' class='img1'>";
                            }
                            if (isset($_GET["topping2"])) {
                                echo "<img src='img/sausage.png' width='100' class='img2'>";
                            }
                            if (isset($_GET["topping3"])) {
                                echo "<img src='img/ham.png' width='100' class='img3'>";
                            }
                            if (isset($_GET["topping4"])) {
                                echo "<img src='img/olive.png' width='100' class='img4'>";
                            }
                            echo "</div>";
                        }
                }
                else {
                    echo "<h3>Please fill out the required field(s): <br>";
                    if (empty($_GET["fname"])) {
                        echo "First Name <br>";
                    }
                    if (empty($_GET["lname"])) {
                        echo "Last Name <br>";
                    }
                    if (empty($_GET["pnumber"])) {
                        echo "Phone Number <br>";
                    }
                    if (isset($_GET["submit"]) && !isset($_GET["numSlice"])) {
                        echo "Number of slices <br>";
                    }
                    if (isset($_GET["submit"]) && !isset($_GET["topping1"]) && !isset($_GET["topping2"]) &&
                        !isset($_GET["topping2"]) && !isset($_GET["topping3"]) && !isset($_GET["topping4"])) {
                        echo "Choose your pizza topping(s) <br>";
                    }
                    echo "</h3>";
                }
            ?>
        </div>
        
        </div>
        
        <hr id="bottomLine">
        
        <footer>
            <a href="https://csumb.edu/"><img src="img/csumb_logo.png" alt="CSUMB logo" id="csumbLogo"></a>
            <div id="footerText">
             CST336 Internet Programming. 2018&copy; Gieg <br />
             <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br /> 
             It is used for academic purposes only.
            </div>
        </footer>
    </body>
</html>