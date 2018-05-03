<?php
    session_start();
    if (isset($_SESSION["error"])) {
        $loginError = "<br><span id='error'>" . $_SESSION["error"] . "</span>";
    }
    unset($_SESSION["error"]);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <style>
            #error {
                color: red;
            }
        </style>
    </head>
    <body>

        <h1> OtterMart - Admin Login </h1>
        
        <form method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="username"> <br>
            Password: <input type="password" name="password"> <br>
            
            <input type="submit" name="submitForm" value="Login">
            
            <?= $loginError ?>
        </form>

    </body>
</html>