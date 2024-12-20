<?php
// Database connection
$host = 'localhost';
$username = 'root'; // Change if different
$password = ''; // Change if different
$database = 'admin';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch feedback data
$sql = "SELECT name, rating, comment, created_at FROM feedback ORDER BY created_at DESC";
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
            <span>Manager</span>
          <small>IsraTech</small>
          </div>
          <i class="uil uil-bell icon"></i>
          </div>
        </div>

        <style>

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
        .feedback-table {
            display: flex;
            flex-direction: column;
            width: 80%;
            max-width: 900px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .feedback-header, .feedback-row {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .feedback-header {
            background-color: #459a7d;
            color: white;
            font-weight: bold;
        }
        .feedback-row:nth-child(even) {
            background-color: #f9f9f9;
        }
        .feedback-row:last-child {
            border-bottom: none;
        }
        .feedback-cell {
            flex: 1;
            text-align: center;
        }
        .feedback-cell:first-child {
            flex: 2; /* Name column wider */
        }
        .feedback-cell.comment {
            text-align: left;
            padding-left: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Feedback Table</h1>
        <div class="feedback-table">
            <div class="feedback-header">
                <div class="feedback-cell">Name</div>
                <div class="feedback-cell">Rating</div>
                <div class="feedback-cell comment">Comment</div>
                <div class="feedback-cell">Date</div>
            </div>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="feedback-row">
                        <div class="feedback-cell"><?= htmlspecialchars($row['name']) ?></div>
                        <div class="feedback-cell"><?= htmlspecialchars($row['rating']) ?></div>
                        <div class="feedback-cell comment"><?= htmlspecialchars($row['comment']) ?></div>
                        <div class="feedback-cell"><?= htmlspecialchars(date('Y-m-d', strtotime($row['created_at']))) ?></div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="feedback-row">
                    <div class="feedback-cell" colspan="4">No feedback available.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>
          

          
          <body>
    <h2>Feedback Summary</h2>
    <div class="chart-container">
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

        // Fetch rating distribution
        $sql = "SELECT `rating`, COUNT(*) as count FROM `feedback` GROUP BY `rating` ORDER BY `rating` DESC";
        $result = $conn->query($sql);

        $ratings = [];
        $total = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ratings[$row['rating']] = $row['count'];
                $total += $row['count'];
            }
        }

        $conn->close();

        // Display rating summary as bars
        for ($i = 5; $i >= 1; $i--) {
            $count = isset($ratings[$i]) ? $ratings[$i] : 0;
            $percentage = $total > 0 ? ($count / $total) * 100 : 0;
            echo "<div class='bar'>
                    <div class='label'>{$i}★</div>
                    <div class='progress'>
                        <div style='width: {$percentage}%;'>" . round($percentage, 1) . "%</div>
                    </div>
                </div>";
        }
        ?>
    </div>
</body>

<style>
    
        
        h2 {
            margin-top: 30px;
            color: #444;
        }
        .chart-container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .bar {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .label {
            width: 50px;
            text-align: right;
            margin-right: 10px;
            font-weight: bold;
        }
        .progress {
            flex-grow: 1;
            background-color: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
        }
        .progress div {
            height: 20px;
            background-color: #459a7d;
            text-align: center;
            color: white;
            line-height: 20px;
            font-size: 12px;
        }
    </style>

        </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script src="./chart.js"></script>
  
  </body>
  </html>