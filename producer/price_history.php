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






     <a href="seeds.php">
      <li class="list">
        <i class="uil uil-car-sideview icon"></i>
        <span class="listName">Seeds</span>
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
              <a href="historical.php">
                <span>Historical Data</span>
              </a>
            </div>
        </div>
        


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Product vs Price Line Chart</h1>
    <div class="chart-container">
        <canvas id="productPriceChart"></canvas>
    </div>

    <?php
    // Database configuration
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

    // Fetch product and price data
    $sql = "SELECT name, price FROM product";
    $result = $conn->query($sql);

    $products = [];
    $prices = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row['name'];
            $prices[] = $row['price'];
        }
    }

    $conn->close();
    ?>

    <script>
        const productNames = <?php echo json_encode($products); ?>;
        const productPrices = <?php echo json_encode($prices); ?>;

        const ctx = document.getElementById('productPriceChart').getContext('2d');
        const productPriceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: productNames,
                datasets: [{
                    label: 'Price of Products',
                    data: productPrices,
                    borderColor: '#007BFF',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderWidth: 2,
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Products',
                            color: '#333',
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Price',
                            color: '#333',
                            font: {
                                size: 14
                            }
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
<style>
   

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .chart-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>

<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'admin';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT product_name, price, date FROM historical_prices ORDER BY date";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['product_name']][] = [
        'price' => $row['price'],
        'date' => $row['date']
    ];
}

$conn->close();
?>

</html>

<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'admin';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT product_name, price, date FROM historical_prices ORDER BY date";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['product_name']][] = [
        'price' => $row['price'],
        'date' => $row['date']
    ];
}

$conn->close();
?>



</html>
