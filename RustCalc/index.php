<?php
    session_start();
    $servername = "jg1010.brighton.domains";
    $username = "jg1010_Pro";
    $password = "~cRY{5l-}z;v";
    $dbname = "jg1010_ProphecyDB";
    
    //Checking connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    //Checking connection
    if($conn->connect_error)
    {
        die("<br />Connection failed: " . $conn->connect_error);
    }
    
    $data = $conn->query("SELECT * FROM Login_Table WHERE UserID = '" . $_SESSION["user"] . "'")->fetch_assoc();
    
    $_SESSION["LogInMessage"] = "";
    $_SESSION["RegisterMessage"] = "";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" type="image/png" href="./images/Rust_Favicon.png">
        <link rel="stylesheet" href="style.css">
        
        <script src="textboxCheck.js"></script>
        
        <title>Rust Calc App | Main </title>
    </head>
    <body id="main-page-body">
        <div id="first-wrap">
            <ul class="menu" id="top-right-menu">
                <li>
                       <?php
                           if($data["Username"] == NULL)
                           {
                               echo '<form class="no-popup" method="post" action="./login.php">';
                               echo '<input type="submit" value="Sign In" id="login-button">';
                               echo '</form>';
                           }
                           
                           else
                           {
                               echo '<form class="no-popup" method="post" action="./account.php">';
                               echo '<input type="submit" value="Account" id="account-button">';
                               echo '</form>';
                           } 
                       ?>
                </li>
            </ul>
            <div id="second-wrap">
                <div id="header">
                    <span id="logo-wrap"><img id="logo" src="./images/Rust.png"></span>
                    <div id="main-logo-text">
                        <p> Rust Calc App </p>
                        <span title="James Gardiner">James Gardiner</span>
                    </div>
                    
                </div>
                <div class="search-block" id="main">
                    <form accept-charset="UTF-8" _lpchecked="1">
                        <input type="text" value class="search-input" id="search-input" name="sInput" pattern=".{1,}" placeholder="Search Bar" onfocusin="textFocusIn()" onfocusout="textFocusOut()">
                        <input type="button" value id="search-button" class="disabled">
                        <br><br>
                        <input type="text" value class="num-input" id="num-input" name="nInput" pattern=".{1,}" placeholder="Number Input" onkeypress="numInputCheck(event)">
                        <ul class="search-results" id="search-results" style=display: none;""></ul>
                    </form>
                    <div id="top-menu-wrap"></div>
                </div>
                <div id="root"></div>
                <script src="GetItems.js"></script>
            </div>
        </div>
    </body>
</html>