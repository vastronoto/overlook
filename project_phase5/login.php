<?php 

session_start();
$_SESSION["userid"] = null;

include $_SERVER['DOCUMENT_ROOT'].'overlook.html';

/*$auth = $_COOKIE['auth']; 
if($auth != 'true') {
    header('Location: login.html');
    exit;
}*/

//called on when logging in, the user inputs are validated on the server side 
//STILL NEED TO FIGURE OUT: how to do both javascript validation AND php validation AND how to redirect automatically to search engine page upon login
extract($_POST); 
    $userName = trim($_POST['userName']); 
    
    $passWord = trim($_POST['password']); 

    $uNames = array(); 
    $pNames = array (); 

    $myfile = fopen('./passwd.txt', 'r') or die('Unable to open file'); 
    
    while(!feof($myfile)) {
    $line = fgets($myfile); 
    $str = explode(":", $line); 
    array_push($uNames, trim($str[0])); 
    array_push($pNames, trim($str[1])); 
}
fclose($myfile); 

if ((in_array(trim($userName), $uNames)) and $userName!="" and $password!="" and (in_array(trim($passWord), $pNames))){
    setcookie('auth', 'true', time() + 60 * 30); 
    print<<<SAVED
    <html>
    <head>
        <style>
            /* Color Schemes 
                #ea5c5c; #f4898e; #fede55; #e8bf42
            */

            html {
                max-height: 100%; 
                max-width: 100%; 
            }

            body {
                background: #fede55;
            }

            h1 {
                text-align: center;
                font-family: sans-serif;
                font-size: 30px;
                text-decoration: underline;
                text-decoration-color: #ea5c5c;
                color: black;
                padding-bottom: 10px;
            }

            p {
                font-family: sans-serif;
                color: #262730;
                letter-spacing: 1px;
                font-size: small;
            }

            a {
                font-family: sans-serif;
                color: #262730;
                letter-spacing: 1px;
                font-size: small;
            }

            a:hover {
                color: gray;
                text-decoration: none;
            }

            form {
                background: whitesmoke;
                border: none;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.10), 0 6px 20px 0 rgba(0, 0, 0, 0.10);
                border-radius: 20px;
                width: 500px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                margin-bottom: 50px;
            }

            label {
                font-family: sans-serif;
                color: #262730;
            }

            input[type="text"], input[type="password"] {
                width: 400px;
                background-color: whitesmoke;
                height: 50px;
                font-size: 12pt;
                border: none;
                border-bottom: 1px solid darkgray;
            }

            input:focus, input:active {
                outline: none;
            }

            table {
                padding-top: 20px;
                padding-left: 50px;
                padding-right: 50px;
            }

            td {
                padding-top: 10px;
                padding-bottom: 20px;
            }

            td.buttons {
                padding-left: 30px;
            }

            input[type="submit"], input[type="reset"]{
                width: 150px;
                height: 50px;
                background-color: #f4898e;
                font-size: 10pt;
                color: white;
                letter-spacing: 2px;
                border: none;
                border-radius: 20px;
                cursor: pointer;
                margin-top: 20px;
                margin-left: 10px;
                margin-right: 10px;
            }

            input[type="submit"]:hover, input[type="reset"]:hover{
                background-color: #ea5c5c;
            }

            .redirect {
                text-align: center;
                padding-bottom: 40px;
            }

            span {
                /*display: block;*/
                text-align: center;
            }
            
        </style>    
    </head>
    <body>
    <form>
    <h1> Login Successful </h1>
    <h1> <a href = "./overlook.html">If not redirected shortly, click this link </a> </h1>
    </form>
    </body>
    </html>
SAVED;
    $_SESSION['userid'] = 'HELANA'; 
    redirect(); 
}

else {
    print<<<NOTSAVED
    
    <html>
    <head> 
        <style>
            /* Color Schemes 
                #ea5c5c; #f4898e; #fede55; #e8bf42
            */

            html {
                max-height: 100%; 
                max-width: 100%; 
            }

            body {
                background: #fede55;
            }

            h1 {
                text-align: center;
                font-family: sans-serif;
                font-size: 30px;
                text-decoration: underline;
                text-decoration-color: #ea5c5c;
                color: black;
                padding-bottom: 10px;
            }

            p {
                font-family: sans-serif;
                color: #262730;
                letter-spacing: 1px;
                font-size: small;
            }

            a {
                font-family: sans-serif;
                color: #262730;
                letter-spacing: 1px;
                font-size: small;
            }

            a:hover {
                color: gray;
                text-decoration: none;
            }

            form {
                background: whitesmoke;
                border: none;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.10), 0 6px 20px 0 rgba(0, 0, 0, 0.10);
                border-radius: 20px;
                width: 500px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                margin-bottom: 50px;
            }

            label {
                font-family: sans-serif;
                color: #262730;
            }

            input[type="text"], input[type="password"] {
                width: 400px;
                background-color: whitesmoke;
                height: 50px;
                font-size: 12pt;
                border: none;
                border-bottom: 1px solid darkgray;
            }

            input:focus, input:active {
                outline: none;
            }

            table {
                padding-top: 20px;
                padding-left: 50px;
                padding-right: 50px;
            }

            td {
                padding-top: 10px;
                padding-bottom: 20px;
            }

            td.buttons {
                padding-left: 30px;
            }

            input[type="submit"], input[type="reset"]{
                width: 150px;
                height: 50px;
                background-color: #f4898e;
                font-size: 10pt;
                color: white;
                letter-spacing: 2px;
                border: none;
                border-radius: 20px;
                cursor: pointer;
                margin-top: 20px;
                margin-left: 10px;
                margin-right: 10px;
            }

            input[type="submit"]:hover, input[type="reset"]:hover{
                background-color: #ea5c5c;
            }

            .redirect {
                text-align: center;
                padding-bottom: 40px;
            }

            span {
                /*display: block;*/
                text-align: center;
            }
            
        </style>
    </head>
    <body>
    <form>
    <h1> Invalid Login. </h1>
    <h1> <a href = "./login.html">Back to Login </a> </h1>
    </form>
    </body>
    </html>
NOTSAVED;
}

function redirect () {
    header('Location: overlook.html');
    exit;
}
?>
