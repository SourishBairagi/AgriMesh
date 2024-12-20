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
    
        <a href="dashboard.php">
        <li class="list">
          <i class="uil uil-analytics icon"></i>
          <span class="listName">Dashboard</span>
        </li>
       </a>

     <a href="product.php">
      <li class="list ">
        <i class="uil uil-pizza-slice icon"></i>
        <span class="listName">Products</span>
      </li>
     </a>

     <a href="sales_data.php">
      <li class="list ">
        <i class="uil uil-pizza-slice icon"></i>
        <span class="listName">Sales</span>
      </li>
     </a>

     <a href="demand_data.php">
          <li class="list ">
            <i class="uil uil-user-check icon"></i>
            <span class="listName">Demand</span>
          </li>
         </a>
         
         <a href="market_trend.php">
          <li class="list ">
            <i class="uil uil-user-check icon"></i>
            <span class="listName">Market Trend</span>
          </li>
         </a>

         <a href="price_history.php">
          <li class="list ">
            <i class="uil uil-user-check icon"></i>
            <span class="listName">Pricing</span>
          </li>
         </a>

   

     <a href="feedback.php">
      <li class="list">
        <i class="uil uil-shopping-cart-alt icon"></i>
        <span class="listName">Feedback</span>
      </li>
     </a>





     <a href="inventory.php">
      <li class="list">
        <i class="uil uil-swatchbook icon"></i>
        <span class="listName">Inventory</span>
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
             <h3 class="title">Sales</h3>
            
           </div>
           <div class="addBtn">
              <a href="update_sales.php">
                <span>Update Sales</span>
              </a>
            </div>
        </div>
        <div class="mainItems">
        <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 3px;
            margin: 2px;
            display: inline-block;
            color: #333;
        }
        .btn-edit {
            background-color: #f0ad4e;
            color: white;
        }
        .btn-delete {
            background-color: #d9534f;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Sales Data</h2>

        <?php
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

        // Query to fetch sales data
        $sql = "SELECT id, product_id, type, name, variety, seasonality, quantity, price, date, (quantity * price) AS total_price 
                FROM sales";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<thead>
                    <tr>
                        <th>Sale ID</th>
                        <th>Product ID</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Variety</th>
                        <th>Seasonality</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                  </thead>";
            echo "<tbody>";

            $total_sales = 0; // Initialize total sales

            while ($row = $result->fetch_assoc()) {
                $total_sales += $row['total_price']; // Calculate total sales
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['product_id'] . "</td>
                        <td>" . $row['type'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['variety'] . "</td>
                        <td>" . $row['seasonality'] . "</td>
                        <td>" . $row['quantity'] . "</td>
                        <td>" . number_format($row['price'], 2) . "</td>
                        <td>" . number_format($row['total_price'], 2) . "</td>
                        <td>" . $row['date'] . "</td>
                      </tr>";
            }
            echo "</tbody>";
            echo "</table>";

            // Display total sales
            echo "<p class='total'>Total Sales: <span class='total-price'>" . number_format($total_sales, 2) . "</span></p>";

        } else {
            echo "<p>No sales data available.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>

    </div>



          
        

        </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script src="./chart.js"></script>
  
  </body>
  </html>