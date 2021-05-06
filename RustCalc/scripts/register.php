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
    
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $password2 = $_POST['psw2'];
    $passwordHASH = password_hash($password, PASSWORD_DEFAULT);
    
    $search = "SELECT * FROM Login_Table Where Username = '" . $username . "'";
    $res_u = mysqli_query($conn, $search);
    
    
    if(mysqli_num_rows($res_u) > 0)
    {
        $_SESSION["LogInMessage"] = "";
        $_SESSION["RegisterMessage"] = "taken";
        header("location: ../login.php");
        die();
    }
    else
    {
        if($password == $password2)
        {
            $sql = "INSERT INTO Login_Table (Username, Password) VALUES ('$username', '$passwordHASH')";
        
            if($conn->query($sql) === TRUE)
            {
                $_SESSION['user'] = $_POST['username'];
            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
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
                }
            }
        }
        else
        {
            $_SESSION["LogInMessage"] = "";
            $_SESSION["RegisterMessage"] = "error";
            header("location: ../login.php");
            die();
        }
    }
?>