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
           
        </div>
        


    <style>
       
        
        .chart-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        canvas {
            width: 100%;
            height: 400px;
        }
        h2{
            margin: 20px;
            text-align: center;
        }
        h2{
            font-family: 'Poppins';
            text-align: center;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Market Demand Data</h2>
    <div class="chart-container">
        <canvas id="lineChart"></canvas>
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

    // Fetch data from the database
    $sql = "SELECT crop_name, demand FROM crop_demand";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();
    ?>

    <script>
        // Data from PHP
        const data = <?php echo json_encode($data); ?>;

        // Extract labels and values
        const labels = data.map(item => item.crop_name);
        const values = data.map(item => item.demand);

        // Render chart
        const ctx = document.getElementById('lineChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Crop Demand',
                    data: values,
                    borderColor: '#4CAF50',
                    backgroundColor: 'rgba(76, 175, 80, 0.2)',
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Crops'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Demand'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
