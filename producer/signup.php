<?php
// Start the session
session_start();

// Database connection parameters
$host = "localhost"; // Update with your DB host
$username = "root"; // Update with your DB username
$password = ""; // Update with your DB password
$database = "admin"; // Update with your DB name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message and success message
$error_message = "";
$success_message = "";

// Handle form submission
if (isset($_POST['register'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if user_id already exists
    $sql_check = "SELECT * FROM user_login WHERE user_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $user_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        $error_message = "User ID already exists. Please choose a different ID.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user data into the database
        $sql_insert = "INSERT INTO user_login (user_id, password, role) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sss", $user_id, $hashed_password, $role);
        
        if ($stmt_insert->execute()) {
            $success_message = "Registration successful! You can now login.";
        } else {
            $error_message = "There was an error with your registration. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrimesh Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f8fa;
            margin: 0;
            padding: 0;
        }
        .register-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        .register-container img {
            width: 150px;
            margin-bottom: 20px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .error-message, .success-message {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .success-message {
            color: green;
        }
        .register-button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .register-button:hover {
            background-color: #ff7e00;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <!-- Logo Section -->
        <img src="AgriMesh.png" alt="Agrimesh Logo"> <!-- Replace with your logo path -->

        <h2>Join AgriMesh</h2>

        <!-- Registration Form -->
        <form method="POST" action="">
            <?php
            if ($error_message) {
                echo "<p class='error-message'>$error_message</p>";
            }

            if ($success_message) {
                echo "<p class='success-message'>$success_message</p>";
            }
            ?>
            
            <div class="input-group">
                <label for="user_id">User ID</label>
                <input type="text" id="user_id" name="user_id" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="input-group">
                <label for="role">Role</label>
                <select name="role" id="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <button type="submit" name="register" class="register-button">Register</button>
        </form>

        <div class="footer">
            <p>Already have an account? <a href="user_login.php">Login here</a></p>
        </div>
    </div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
