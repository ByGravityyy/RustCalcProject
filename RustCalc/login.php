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
    
    if($_SESSION["LogInMessage"] == "error")
    {
        $message = "Incorrect Username or Password";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    elseif($_SESSION["LogInMessage"] == "alpha")
    {
        $message = "Make sure username and password are alphanumeric and exclude spaces";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else
    {
        
    }
    
    if($_SESSION["RegisterMessage"] == "error")
    {
        $message = "Username and Password Do Not Match";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    elseif($_SESSION["RegisterMessage"] == "taken")
    {
        $message = "Username Taken";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    elseif($_SESSION["RegisterMessage"] == "alpha")
    {
        $message = "Make sure username and password are alphanumeric and exclude spaces";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" type="image/png" href="./images/Rust_Favicon.png">
        <link rel="stylesheet" href="style.css">
        
        <script src="textboxCheck.js"></script>
        <script>
        function Redirect() {
          location.replace("./index.php")
        }
        </script>
        <title>Rust Calc App | Log In/Register </title>
    </head>
    <body id="main-page-body">
        <div id="first-wrap">
        <ul class="menu" id="top-right-menu">
                <li>
                    <from class="no-popup" method="post" action="./index.php">
                        <input type="submit" value="Home" id="home-button" onclick="Redirect()" />
                    </form>
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
                <div id="root">
                    <div class="container-log-reg">
                        <div class="card">
                            <div class="search-block" id="main">
                                <div class="login">
                                    <h1>Log In</h1>
                                    <form action="./scripts/signin.php" method="post" name="login">
                                        <div class="user">
                                            <input type="text" name="uname" class="search-input" id="user-input-log"  pattern=".{1,}" placeholder="Enter Username" required>
                                        </div>
                                        <div class="pass">
                                            <input type="password" placeholder="Enter Password" name="psw" class="search-input" id="pass-input-reg" pattern=".{1,}" required>
                                        </div>
                                        <button type="submit" name="submit" class="reg-log-button">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="search-block" id="main">
                                <div class="reginfo">
                                    <h1>Register</h1>
                                    <p>Alphanumeric Only <br> Spaces Arent Allowed</p>
                                </div>
                                <form action="./scripts/register.php" method="post" name="register">
                                    <div class="user">
                                        <input type="text" name="uname" class="search-input" id="user-input-reg"  pattern=".{1,}" placeholder="Enter Username" required>
                                    </div>
                                    <div class="pass">
                                        <input type="password" class="search-input" id="pass-input-reg" name="psw" pattern=".{1,}" placeholder="Enter Password" required>
                                        <input type="password" class="search-input" id="pass2-input-reg" name="psw2" pattern=".{1,}" placeholder="Re-enter Password" required>
                                    </div>
                                    <button type="submit" name="submit" value id="reg-button" class="reg-log-button">Submit</button>
                                </form>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>