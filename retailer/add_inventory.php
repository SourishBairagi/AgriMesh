<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product to Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f8fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select, button {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success, .error {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }
        .success {
            color: #28a745;
        }
        .error {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add Product</h1>
        <?php
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $host = "localhost"; // Update with your DB host
            $username = "root"; // Update with your DB username
            $password = ""; // Update with your DB password
            $database = "admin"; // Update with your DB name

            // Connect to the database
            $conn = new mysqli($host, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get form data
            $name = $conn->real_escape_string($_POST["name"]);
            $type = $conn->real_escape_string($_POST["type"]);
            $qty = (int)$_POST["qty"];

            // Insert data into the database
            $sql = "INSERT INTO `inventory` (`name`, `type`, `qty`) VALUES ('$name', '$type', $qty)";
            if ($conn->query($sql) === TRUE) {
                echo "<p class='success'>Product added successfully!</p>";
            } else {
                echo "<p class='error'>Error: " . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
        <form method="POST" action="">
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" placeholder="Enter product name" required>
            
            <label for="type">Type</label>
            <input type="text" id="type" name="type" placeholder="Enter product type (e.g., Fruit, Vegetable)" required>
            
            <label for="qty">Quantity</label>
            <input type="number" id="qty" name="qty" placeholder="Enter quantity" min="1" required>
            
            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
</html>
