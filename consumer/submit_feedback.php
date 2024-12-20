<?php
// Database configuration
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'admin';

// Connect to the database
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM product WHERE product_id = $delete_id";
    if ($conn->query($delete_sql)) {
        header("Location: demo_products.php"); // Redirect to refresh the page
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Handle Update Request
if (isset($_POST['update'])) {
    $product_id = intval($_POST['product_id']);
    $name = $conn->real_escape_string($_POST['name']);
    $type = $conn->real_escape_string($_POST['type']);
    $variety = $conn->real_escape_string($_POST['variety']);
    $seasonality = $conn->real_escape_string($_POST['seasonality']);

    $update_sql = "UPDATE product SET 
        name = '$name', 
        type = '$type', 
        variety = '$variety', 
        seasonality = '$seasonality' 
        WHERE product_id = $product_id";
    
    if ($conn->query($update_sql)) {
        header("Location: demo_products.php"); // Redirect to refresh the page
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch data from the 'products' table
$sql = "SELECT product_id, name, type, variety, seasonality FROM product";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
    <!-- Css Link -->
     <link rel="stylesheet" href="./main.css">
     <!-- Icons Library link -->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  
<body class="flex">

  <div class="main">
    <div class="sideMenu ">

      <div class="logoDiv flex">
        <div class="logoImage">
          <img src="./assets/images/logo.png" alt="Logo Image">
        </div>

      </div>
    
      <div class="menuList">
        <ul>
    
        <a href="product.php">
      <li class="list ">
        <i class="uil uil-pizza-slice icon"></i>
        <span class="listName">Products</span>
      </li>
     </a>

   

     <a href="feedback.php">
      <li class="list">
        <i class="uil uil-shopping-cart-alt icon"></i>
        <span class="listName">Feedback</span>
      </li>
     </a>





     <a href="submit_feedback.php">
      <li class="list">
        <i class="uil uil-swatchbook icon"></i>
        <span class="listName">Submit Feedback</span>
      </li>
     </a>
    
         
    
        </ul>
      </div>
    </div>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="seacrchBox flex">
            <i class="uil uil-search icon"></i>
            <input type="text" placeholder=" Search...">
            <i class="uil uil-microphone icon"></i>
          </div>

          <div class="userBox flex">
            <a href="index.html">
              <div class="adminImage">
                <img src="./assets/images/pp.jpg" alt="Admin Image">
              </div>
            </a>
          <div class="userName">
            <span>Admin</span>
          <small>AgriMesh</small>
          </div>
          <i class="uil uil-bell icon"></i>
          </div>
        </div>

        <div class="body">
        <div class="overViewDiv">
           <div class="intro flex" >
             <h3 class="title">Feedback</h3>
            <div class="addBtn">
              <a href="feedback.php">
                <span>Summary</span>
              </a>
            </div>
           </div>
        </div>
        <div class="mainItems">
        <style>
        .form-container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input[type="text"]:focus, textarea:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px 15px;
            background-color: #459a7d;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        button:hover {
            background-color: #0056b3;
        }
        button:active {
            background-color: #004080;
        }
    </style>
</head>
<body>
<div class="form-container">
        <h1>Submit Feedback</h1>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="">Select Rating</option>
                <option value="5">5 ★ - Excellent</option>
                <option value="4">4 ★ - Good</option>
                <option value="3">3 ★ - Average</option>
                <option value="2">2 ★ - Poor</option>
                <option value="1">1 ★ - Very Poor</option>
            </select>

            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" placeholder="Write your feedback here..." required></textarea>

            <button type="submit" name="submit_feedback">Submit Feedback</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_feedback"])) {
        // Database connection
        $host = "localhost"; // Update with your DB host
        $username = "root"; // Update with your DB username
        $password = ""; // Update with your DB password
        $database = "admin"; // Update with your DB name

        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sanitize user inputs
        $name = $conn->real_escape_string($_POST["name"]);
        $rating = (int) $_POST["rating"];
        $comment = $conn->real_escape_string($_POST["comment"]);

        // Insert data into feedback table
        $sql = "INSERT INTO feedback (`name`, `rating`, `comment`) VALUES ('$name', $rating, '$comment')";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='text-align:center; color:green;'>Feedback submitted successfully!</p>";
        } else {
            echo "<p style='text-align:center; color:red;'>Error: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>
        </tbody>
    </table>
        </div>



          
        

        </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script src="./chart.js"></script>
  
  </body>
  </html>