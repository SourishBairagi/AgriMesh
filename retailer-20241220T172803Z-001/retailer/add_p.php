<?php
// add_product.php

// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "";    // Replace with your database password
$dbname = "admin"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $product_id = $conn->real_escape_string($_POST['product_id']);
    $type = $conn->real_escape_string($_POST['type']);
    $name = $conn->real_escape_string($_POST['name']);
    $variety = $conn->real_escape_string($_POST['variety']);
    $seasonality = $conn->real_escape_string($_POST['seasonality']);

    // Insert data into the product table
    $sql = "INSERT INTO product (product_id, type, name, variety, seasonality) VALUES ('$product_id', $type '$name', '$variety', '$seasonality')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product added successfully!'); window.location.href = 'add_product.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
