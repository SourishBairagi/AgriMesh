<?php
// Database connection
$host = "localhost"; // Update with your database host
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$database = "admin"; // Update with your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product demand data
$sql = "SELECT name, SUM(quantity) AS demand FROM sales GROUP BY name ORDER BY name ASC";
$result = $conn->query($sql);

$products = [];
$demand = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row['name'];
        $demand[] = $row['demand'];
    }
}

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
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  
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

         

     
     <a href="feedback.php">
      <li class="list">
        <i class="uil uil-shopping-cart-alt icon"></i>
        <span class="listName">Feedback</span>
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
             <h3 class="title">Demand Overview</h3>
            <div class="addBtn">
              <a href="sales_data.php">
                <span>Sales</span>
              </a>
            </div>
           </div>
        </div>
        <style>
    
        .chart-container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        canvas {
            display: block;
            max-width: 100%;
            height: auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <h2>Products vs. Demand</h2>
        <canvas id="lineChart"></canvas>
    </div>

    <script>
        // Get data from PHP
        const products = <?php echo json_encode($products); ?>;
        const demand = <?php echo json_encode($demand); ?>;

        // Render the line chart
        const ctx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: products,
                datasets: [{
                    label: 'Demand',
                    data: demand,
                    borderColor: '#4CAF50',
                    backgroundColor: 'rgba(76, 175, 80, 0.2)',
                    borderWidth: 2,
                    tension: 0.2,
                    pointBackgroundColor: '#4CAF50',
                    pointBorderColor: '#4CAF50',
                    pointRadius: 5,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Products',
                            color: '#666',
                            font: {
                                size: 14,
                                weight: 'bold',
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Demand (Quantity)',
                            color: '#666',
                            font: {
                                size: 14,
                                weight: 'bold',
                            }
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

        </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script src="./chart.js"></script>
  
  </body>
  </html>