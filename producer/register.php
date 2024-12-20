<?php
// Database connection
$servername = "localhost"; // Change if not using localhost
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "admin"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['register'])) {
    // Retrieve and sanitize inputs
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Encrypt password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // SQL query to insert data into the users table
    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$fname', '$lname', '$email', '$hashed_password')"
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
