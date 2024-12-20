<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productID = $_POST['product_id'];
    $type = $_POST['type'];
    $name = $_POST['name'];
    $variety = $_POST['variety'];
    $seasonality = $_POST['Seasonality'];
    
    

    // Move the uploaded file to the target directory
    
        $sql = "INSERT INTO product (product_id, type, name, variety, seasonality)
                VALUES ('$productID', '$type', '$name', '$variety', '$seasonality')";

        if ($conn->query($sql) === TRUE) {
            echo "New product added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    }


$conn->close();
?>
