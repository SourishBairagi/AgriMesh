<?php
// Database connection details
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'admin';

// Create a connection to the database
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $product_id = $_POST['product_id'];
    $type = $_POST['type'];
    $name = $_POST['name'];
    $variety = $_POST['variety'];
    $seasonality = $_POST['seasonality'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $date = $_POST['date'];

    // Prepare the SQL query to update the sales data
    $sql = "UPDATE `sales` 
            SET `type` = ?, `name` = ?, `variety` = ?, `seasonality` = ?, `quantity` = ?, `price` = ?, `date` = ?
            WHERE `product_id` = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("sssssdis", $type, $name, $variety, $seasonality, $quantity, $price, $date, $product_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p>Sales data updated successfully!</p>";
        } else {
            echo "<p>Error updating sales data: " . $stmt->error . "</p>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<p>Error preparing the query: " . $conn->error . "</p>";
    }
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Sales Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            width: 50%;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            color: #333;
            font-size: 1.8rem;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 1rem;
            color: #333;
        }
        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 1.2rem;
            border-radius: 5px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Update Sales Data</h2>
        <form action="update_sales.php" method="POST">
            <div class="form-group">
                <label for="product_id">Product ID</label>
                <input type="text" id="product_id" name="product_id" required>
            </div>
            <div class="form-group">
                <label for="type">Product Type</label>
                <input type="text" id="type" name="type" required>
            </div>
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="variety">Product Variety</label>
                <input type="text" id="variety" name="variety" required>
            </div>
            <div class="form-group">
                <label for="seasonality">Seasonality</label>
                <input type="text" id="seasonality" name="seasonality" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <input type="submit" value="Update Sales Data">
        </form>
    </div>

</body>
</html>
