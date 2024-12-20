<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Seeds</title>
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
        <h1>Add Seeds</h1>
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
            $variety = $conn->real_escape_string($_POST["variety"]);
            $seasonality = $conn->real_escape_string($_POST["seasonality"]);
            $quantity = (int)$_POST["quantity"];

            // Insert data into the database
            $sql = "INSERT INTO `seeds` (`name`, `type`, `variety`, `seasonality`, `quantity`) 
                    VALUES ('$name', '$type', '$variety', '$seasonality', $quantity)";
            if ($conn->query($sql) === TRUE) {
                echo "<p class='success'>Seed added successfully!</p>";
            } else {
                echo "<p class='error'>Error: " . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
        <form method="POST" action="">
            <label for="name">Seed Name</label>
            <input type="text" id="name" name="name" placeholder="Enter seed name" required>
            
            <label for="type">Type</label>
            <input type="text" id="type" name="type" placeholder="Enter type (e.g., Grain, Vegetable)" required>
            
            <label for="variety">Variety</label>
            <input type="text" id="variety" name="variety" placeholder="Enter variety (e.g., Cherry, Sweet)" required>
            
            <label for="seasonality">Seasonality</label>
            <input type="text" id="seasonality" name="seasonality" placeholder="Enter seasonality (e.g., Summer, Winter)" required>
            
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" min="1" required>
            
            <button type="submit">Add Seed</button>
        </form>
    </div>
</body>
</html>
