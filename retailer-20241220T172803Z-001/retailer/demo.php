<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    echo"not connected";
}
//start

if(isset($_POST["register"])) {
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = md5($password);
     $checkEmail = "SELECT * From users where email = '$email'";
     $result = $conn->query($checkEmail);
     if($result->num_rows > 0) {
        echo"Email Address Alredy Exists!";
     } else {
     
        $insertQuery = "INSERT INTO `users`(`fname`, `name`, `email`, `password`) 
                        VALUES ('$first_name','$$last_name','$email','$password')";
            
            if($conn->query($insertQuery)==TRUE) {
                header("location: dashboard.html");
                

            }
            else{
                echo "Error".$conn->erroe;
            }

}
}

if(isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $sql = "SELECT * FROM users WHERE email='$email' and password='$password'"t
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("Location:dashboard.html");
        exit();

    }
    else {
        echo "Invalid Email or Password"
    }
}


?>