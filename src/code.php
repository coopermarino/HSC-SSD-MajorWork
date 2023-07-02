<?php
//include('checksession/security.php');
require "./database/dbconfig.php";
session_start();


error_reporting(E_ALL);
ini_set('display_errors', 1);

// Login
if(isset($_POST['login_btn']))
{
    $username_login = strtolower($_POST['username']);

    $pepper = 'pajhfakjdhflashdhf';
    $pwd = $_POST['password'];
    $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
    
    $query = "SELECT password FROM accounts WHERE username=?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $username_login);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $passwordHash = mysqli_fetch_row($result);

    if(password_verify($pwd_peppered, $passwordHash[0])){
        $query = "SELECT * FROM accounts WHERE username=?";
        $stmt = mysqli_prepare($connect, $query);
        mysqli_stmt_bind_param($stmt, "s", $username_login);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $usertype = mysqli_fetch_array($result);

        $dir = 'profiles/'.$_POST['username'];
        $_SESSION['user_dir'] = $dir;

        $_SESSION['username'] = $username_login;
        $_SESSION['acc_id'] = $usertype['id'];
        
        header('Location:../home/');
   }else{
       $_SESSION['status'] = "Password";
       header('Location:../login/');
   }
}

// Create New Account
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    $pepper = 'pajhfakjdhflashdhf';
    $pwd = $_POST['password'];
    $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
    
    $illegalSymbols = "[\'^£$%&*()}{@#~?><>,|=+¬-]";
    if (preg_match($illegalSymbols, $username)) {
        $_SESSION['status'] = "Special Charaters are not allowed";
        header('location: ./register');
    } else {
        $sql_u = "SELECT * FROM accounts WHERE username=?";
        $sql_e = "SELECT * FROM accounts WHERE email=?";
        $stmt_u = mysqli_prepare($connect, $sql_u);
        $stmt_e = mysqli_prepare($connect, $sql_e);
        if ($stmt_u && $stmt_e) { // Check if the statement preparations were successful
            mysqli_stmt_bind_param($stmt_u, "s", $username);
            mysqli_stmt_bind_param($stmt_e, "s", $email);
            mysqli_stmt_execute($stmt_u);
            mysqli_stmt_execute($stmt_e);
            $res_u = mysqli_stmt_get_result($stmt_u);
            $res_e = mysqli_stmt_get_result($stmt_e);

            if(mysqli_num_rows($res_u) > 0){
                $_SESSION['status'] = "Account Creation Failed, Username Already Taken"; 
                header('location: ./register');	
            } else if(mysqli_num_rows($res_e) > 0){
                $_SESSION['status'] = "Account Creation Failed, Email Already In Use, Please Sign-In"; 
                header('location: ./register');
            } else {
                $query = "INSERT INTO accounts (username, email, password) VALUES(?, ?, ?)";
                $stmt = mysqli_prepare($connect, $query);
                if ($stmt) { // Check if the statement preparation was successful
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $pwd_hashed);
                    $result = mysqli_stmt_execute($stmt);

                    if($result){
                        $newAccountId = mysqli_insert_id($connect);

                        // Insert the public key into the database
                        $publicKey = json_decode($_POST['publicKey'], true);
                        $publicKeyJwk = json_encode($publicKey);
                        $query = "UPDATE accounts SET public_key=? WHERE id=?";
                        $stmt = mysqli_prepare($connect, $query);
                        if ($stmt) { // Check if the statement preparation was successful
                            mysqli_stmt_bind_param($stmt, "si", $publicKeyJwk, $newAccountId);
                            mysqli_stmt_execute($stmt);
                        } else {
                            // Handle statement preparation error
                            echo "Error preparing statement: " . mysqli_error($connect);
                        }

                        // Insert information into ProfilePics Table
                        $mysqli = new mysqli("db", "root", "root", "SocialNetwork");

                        // Check for connection errors
                        if ($mysqli->connect_error) {
                            die("Connection failed: " . $mysqli->connect_error);
                        }

                        // Prepare the SQL statement
                        $stmt = $mysqli->prepare("INSERT INTO ProfilePics (id) VALUES (?)");

                        // Bind the parameter to the value
                        $stmt->bind_param("s", $newAccountId);

                        // Execute the SQL statement
                        if ($stmt->execute()) {
                            echo "Record inserted successfully";
                        } else {
                            echo "Error inserting record: " . $mysqli->error;
                        }

                        // Close the statement and connection
                        $stmt->close();
                        $mysqli->close();

                        $_SESSION['success'] = "Account Created ";
                        //header('location:../login');
                    }else{
                        $_SESSION['status'] = "Account Creation Failed ";
                        header('location: ./register');
                    }
                } else {
                    // Handle statement preparation error
                    echo "Error preparing statement: " . mysqli_error($connect);
                }
            }
        } else {
            // Handle statement preparation error
            echo "Error preparing statement: " . mysqli_error($connect);
        }
    }
}

?>