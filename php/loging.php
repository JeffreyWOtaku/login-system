<?php 

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST") {      // for collecting data from the form

    $conn = require __DIR__ ."/data.php";

    $sql = sprintf("SELECT * FROM users 
                    WHERE email = '%s'", mysqli_real_escape_string($conn, $_POST["email"])); 
    
    $result = mysqli_query($conn, $sql);   // query to the database

    $user = mysqli_fetch_assoc($result);   // Fetching the result from the database


    if($user){ 

        if (password_verify($_POST["password_1"], $user["password"])){   // $user["password] is the name of the column in database
            
            session_start(); 

            session_regenerate_id();
        

            $_SESSION["user_ID"] = $user["user_ID"];

            header("Location: ../public/profile.html"); 
            exit;
        }
    }
    $is_invalid = true;

}


?>

