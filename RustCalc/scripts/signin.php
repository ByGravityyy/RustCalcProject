<?php
    session_start();
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

    $username = $_POST['uname'];
    $password = $_POST['psw'];

    $UserCheck = $conn->query("SELECT * FROM Login_Table WHERE Username = '" . $username . "'");
    
    $CheckPass = $UserCheck->fetch_assoc() ["Password"];
    $hash = $CheckPass;

   if(isset($username) && isset($password))
    {
        if(isset($CheckPass))
        {
            if(password_verify($password, $CheckPass))
            {
                $data = $conn->query("SELECT * FROM Login_Table WHERE Username = '" . $username . "'")->fetch_assoc();
                $_SESSION["user"] = $data["UserID"];
                $_SESSION["LogInMessage"] = "";
                $_SESSION["RegisterMessage"] = "";
                header("location: ../index.php");
                die();
            }
            else
            {
               $_SESSION["LogInMessage"] = "error";
               $_SESSION["RegisterMessage"] = "";
               header("location: ../login.php");
               die();
            }
        }
        else
        {
            $_SESSION["LogInMessage"] = "error";
            $_SESSION["RegisterMessage"] = "";
            header("location: ../login.php");
            die();
        }
    } 
?>