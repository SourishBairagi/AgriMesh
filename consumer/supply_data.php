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

// SQL query to fetch inventory data
$sql = "SELECT `name`, `qty` FROM `inventory` WHERE 1";
$result = $conn->query($sql);

// Arrays to store the inventory names and quantities
$names = [];
$quantities = [];

if ($result->num_rows > 0) {
    // Fetch the data and store it in arrays
    while ($row = $result->fetch_assoc()) {
        $names[] = $row['name'];
        $quantities[] = $row['qty'];
    }
}

// Close the connection
$conn->close();
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
         
         <a href="customers.php">
          <li class="list ">
            <i class="uil uil-user-check icon"></i>
            <span class="listName">Users</span>
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
            <i class="uil uil-folder-lock icon"></i>
            <span class="listName">Submit Feedback</span>
          </li>
         </a>
    
         <a href="seeds.php">
          <li class="list">
            <i class="uil uil-car-sideview icon"></i>
            <span class="listName">Seeds</span>
          </li>
         </a>
    
         <a href="inventory.php">
          <li class="list">
            <i class="uil uil-swatchbook icon"></i>
            <span class="listName">Inventory</span>
          </li>
         </a>
    
         <a href="add_product.php">
          <li class="list">
            <i class="uil uil-gift icon"></i>
            <span class="listName">Add Products</span>
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
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        canvas {
            width: 100%;
            height: 400px; /* Make the chart taller */
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="table-container">
            <h2>Inventory Table</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Type</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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

                    // Fetch inventory data
                    $sql = "SELECT `id`, `name`, `type`, `qty` FROM `inventory`";
                    $result = $conn->query($sql);

                    $labels = [];
                    $quantities = [];

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Populate table rows
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['type']}</td>
                                    <td>{$row['qty']}</td>
                                </tr>";
                            // Prepare data for the chart
                            $labels[] = $row["name"];
                            $quantities[] = $row["qty"];
                        }
                    } else {
                        echo "<tr><td colspan='4'>No data available</td></tr>";
                    }

                    $conn->close();

                    // Convert PHP arrays to JSON for JavaScript
                    $labelsJSON = json_encode($labels);
                    $quantitiesJSON = json_encode($quantities);
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="chart-container">
            <h2>Inventory Donut Chart</h2>
            <canvas id="inventoryChart"></canvas>
        </div>
    </div>

    <script>
        // Get data from PHP
        const labels = <?= $labelsJSON ?>;
        const data = <?= $quantitiesJSON ?>;

        // Chart configuration
        const ctx = document.getElementById('inventoryChart').getContext('2d');
        const inventoryChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Product Quantity',
                    data: data,
                    backgroundColor: [
                        '#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8',
                        '#6f42c1', '#fd7e14', '#20c997', '#e83e8c', '#6c757d'
                    ],
                    borderColor: '#fff',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });
    </script>

    
</body>
    </div>
    </div>
    </div>
    </div>
    </body>
    </html>