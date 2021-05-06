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
    
    if(isset($_POST['upload']))
    {
        $target = "./images/pfp/" . basename($_FILES['image']['name']);
        
        $image = $_FILES['image']['name'];
        $text = $_POST['text'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" type="image/png" href="./images/Rust_Favicon.png">
        <link rel="stylesheet" href="style.css">
        
        <title>Rust Calc App | Account </title>
    </head>
    <body id="main-page-body">
        <div id="first-wrap">
            <ul class="menu" id="top-right-menu">
                <li>
                    <form class="no-popup" method="post" action="./index.php">
                        <input type="submit" value="Home" id="home-button">
                    </form>
                </li>
                <li>
                   <?php
                    if($data["Username"] == NULL)
                    {
                        echo '<li><a href="login.php">Log in</a></li>';
                    }
                    else
                    {
                      echo '<form class="no-popup" method="post" action="./scripts/signout.php">';
                      echo '<input type="submit" value="Sign Out" id="log-out-button">';
                      echo '</form>';
                    } 
                ?> 
                </li>
            </ul>
            <div id="second-wrap">
                <div id="header">
                    <span id="logo-wrap"><img id="logo" src="./images/Rust.png"></span>
                    <div id="main-logo-text">
                        <p>Rust Calc App</p>
                        <span title="James Gardiner">James Gardiner</span>
                    </div>
                </div>
                <div id="root">
                    <div class="container-account">
                        <div class="card">
                            <h1><?php echo $data["Username"]; ?></h1>
                        </div>
                        <div class="card">
                            <h1>Saved Items</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>