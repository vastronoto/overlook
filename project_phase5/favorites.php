<?php 
session_start();

if ($_SESSION['userid'] == null) {
    header('Location: ./login.html');
    exit;
}

print <<<FAVES

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Overlook</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type= text/css href="./overlook.css">
    <link rel="stylesheet" href="./results.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
    <div class="header">
        <div class="register">
            <a href="./redirect.php">Login/Logout</a>
            <a href="./signup.html">Sign Up</a>
        </div>
    </div>

   <body>
        <div id="nav">
            <a href="./overlook.html"><img src="overlook_logo.png" alt="logo" class="logo" height="40px"></a>
            <div class="options">
                <a href = "./getResults.php">Go back</a><br><br>
            </div>
        </div>

        <div id="results">
        </div>
    </body>


</html>

FAVES;

?>
